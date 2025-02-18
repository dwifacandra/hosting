<?php

namespace App\Filament\Clusters\Collections\Resources\AnimationResource\Pages;

use Filament\Actions;
use App\Models\Animation;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Clusters\Collections\Resources\AnimationResource;
use JoseEspinal\RecordNavigation\Traits\HasRecordsList;

class ListAnimations extends ListRecords
{
    use HasRecordsList;

    protected static string $resource = AnimationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        $scopes = Animation::get();

        $tabs = [
            null => Tab::make('All')->badge(Animation::count()),
        ];

        foreach ($scopes as $scope) {
            $tabs[$scope->status->getLabel()] =
                Tab::make()
                ->icon($scope->status->getIcon())
                ->badge(
                    Animation::where('status', $scope->status)
                        ->count()
                )
                ->modifyQueryUsing(fn(Builder  $query) => $query->where('status', $scope->status));
        }

        foreach ($scopes as $scope) {
            $tabs[$scope->source] =
                Tab::make()
                ->badgeColor('secondary')
                ->badge(
                    Animation::where('source', $scope->source)
                        ->count()
                )
                ->modifyQueryUsing(fn(Builder  $query) => $query->where('source', $scope->source));
        }

        foreach ($scopes as $scope) {
            $tabs[$scope->category->name] = Tab::make()
                ->badgeColor('secondary')
                ->badge(
                    Animation::whereHas('category', function ($query) use ($scope) {
                        $query->where('name', $scope->category->name);
                    })->count()
                )
                ->modifyQueryUsing(fn(Builder $query) => $query->whereHas('category', function ($query) use ($scope) {
                    $query->where('name', $scope->category->name);
                }));
        }

        return $tabs;
    }
}
