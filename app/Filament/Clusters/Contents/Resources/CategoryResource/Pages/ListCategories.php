<?php

namespace App\Filament\Clusters\Contents\Resources\CategoryResource\Pages;

use Filament\Actions;
use App\Models\Category;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Clusters\Contents\Resources\CategoryResource;
use JoseEspinal\RecordNavigation\Traits\HasRecordsList;

class ListCategories extends ListRecords
{
    use HasRecordsList;

    protected static string $resource = CategoryResource::class;

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
        $scopes = Category::get();

        $tabs = [
            null => Tab::make('All')->badge(Category::count()),
        ];

        foreach ($scopes as $scope) {
            $tabs[$scope->scope] =
                Tab::make()
                ->badge(
                    Category::where('scope', $scope->scope)
                        ->count()
                )
                ->modifyQueryUsing(fn(Builder $query) => $query->where('scope', $scope->scope));
        }

        return $tabs;
    }
}
