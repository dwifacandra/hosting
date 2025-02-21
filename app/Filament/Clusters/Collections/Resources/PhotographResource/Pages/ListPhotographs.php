<?php

namespace App\Filament\Clusters\Collections\Resources\PhotographResource\Pages;

use App\Enums\PostScope;
use Filament\Actions;
use App\Models\Post;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Clusters\Collections\Resources\PhotographResource;
use JoseEspinal\RecordNavigation\Traits\HasRecordsList;

class ListPhotographs extends ListRecords
{
    use HasRecordsList;

    protected static string $resource = PhotographResource::class;

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
        $scopes = Post::inScope(PostScope::PHOTOGRAPH)->get();

        $tabs = [
            null => Tab::make('All')->badge($scopes->count()),
        ];

        foreach ($scopes as $scope) {
            $tabs[$scope->status->getLabel()] =
                Tab::make()
                ->icon($scope->status->getIcon())
                ->badge(Post::inScope(PostScope::PHOTOGRAPH)->countByStatus($scope->status))
                ->modifyQueryUsing(fn(Builder  $query) => $query->where('status', $scope->status));
        }

        foreach ($scopes as $scope) {
            $tabs[$scope->source] =
                Tab::make()
                ->badgeColor('secondary')
                ->badge(Post::inScope(PostScope::PHOTOGRAPH)->countBySource($scope->source))
                ->modifyQueryUsing(fn(Builder  $query) => $query->where('source', $scope->source));
        }

        foreach ($scopes as $scope) {
            $tabs[$scope->category->name] = Tab::make()
                ->badgeColor('secondary')
                ->badge(Post::inScope(PostScope::PHOTOGRAPH)->countByCategory($scope->category->name))
                ->modifyQueryUsing(fn(Builder $query) => $query->whereHas('category', function ($query) use ($scope) {
                    $query->where('name', $scope->category->name);
                }));
        }

        return $tabs;
    }
}
