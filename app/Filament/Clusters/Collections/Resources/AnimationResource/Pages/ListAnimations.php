<?php

namespace App\Filament\Clusters\Collections\Resources\AnimationResource\Pages;

use Filament\Actions;
use App\Enums\PostScope;
use App\Models\Post;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use JoseEspinal\RecordNavigation\Traits\HasRecordsList;
use App\Filament\Clusters\Collections\Resources\AnimationResource;

class ListAnimations extends ListRecords
{
    use HasRecordsList;

    protected static string $resource = AnimationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->icon('fill.add_circle')
                ->color('success')
                ->keyBindings(['ctrl+alt+n']),
        ];
    }

    public function getTabs(): array
    {
        $scopes = Post::inScope(PostScope::ANIMATION)->get();

        $tabs = [
            null => Tab::make('All')->badge($scopes->count()),
        ];

        foreach ($scopes as $scope) {
            $tabs[$scope->status->getLabel()] =
                Tab::make()
                ->icon($scope->status->getIcon())
                ->badge(Post::countByStatus($scope->status))
                ->modifyQueryUsing(fn(Builder  $query) => $query->where('status', $scope->status));
        }

        foreach ($scopes as $scope) {
            $tabs[$scope->source] =
                Tab::make()
                ->badgeColor('secondary')
                ->badge(Post::countBySource($scope->source))
                ->modifyQueryUsing(fn(Builder  $query) => $query->where('source', $scope->source));
        }

        foreach ($scopes as $scope) {
            $tabs[$scope->category->name] = Tab::make()
                ->badgeColor('secondary')
                ->badge(Post::countByCategory($scope->category->name))
                ->modifyQueryUsing(fn(Builder $query) => $query->whereHas('category', function ($query) use ($scope) {
                    $query->where('name', $scope->category->name);
                }));
        }

        return $tabs;
    }
}
