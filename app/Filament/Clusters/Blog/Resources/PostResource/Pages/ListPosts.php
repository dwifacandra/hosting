<?php

namespace App\Filament\Clusters\Blog\Resources\PostResource\Pages;

use Filament\Actions;
use App\Enums\PostScope;
use App\Models\Post;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use JoseEspinal\RecordNavigation\Traits\HasRecordsList;
use App\Filament\Clusters\Blog\Resources\PostResource;

class ListPosts extends ListRecords
{
    use HasRecordsList;

    protected static string $resource = PostResource::class;

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
        $scopes = Post::inScope(PostScope::POST)->get();

        $tabs = [
            null => Tab::make('All')->badge($scopes->count()),
        ];

        foreach ($scopes as $scope) {
            $tabs[$scope->status->getLabel()] =
                Tab::make()
                ->icon($scope->status->getIcon())
                ->badge(Post::inScope(PostScope::POST)->countByStatus($scope->status))
                ->modifyQueryUsing(fn(Builder  $query) => $query->where('status', $scope->status));
        }

        foreach ($scopes as $scope) {
            $tabs[$scope->category->name] = Tab::make()
                ->badgeColor('secondary')
                ->badge(Post::inScope(PostScope::POST)->countByCategory($scope->category->name))
                ->modifyQueryUsing(fn(Builder $query) => $query->whereHas('category', function ($query) use ($scope) {
                    $query->where('name', $scope->category->name);
                }));
        }

        return $tabs;
    }
}
