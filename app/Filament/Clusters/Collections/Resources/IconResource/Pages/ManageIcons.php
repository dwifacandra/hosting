<?php

namespace App\Filament\Clusters\Collections\Resources\IconResource\Pages;

use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ManageRecords;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Clusters\Collections\Resources\{IconResource,};
use App\Models\Icon;

class ManageIcons extends ManageRecords
{
    protected static string $resource = IconResource::class;

    public function getBreadcrumbs(): array
    {
        if (filled($cluster = static::getCluster())) {
            return $cluster::unshiftClusterBreadcrumbs([
                static::getResource()::getNavigationLabel(),
            ]);
        }
        return [];
    }

    public function getTabs(): array
    {
        $folders = Icon::get();

        $tabs = [
            null => Tab::make('All')->badge(Icon::count()),
        ];

        foreach ($folders as $folder) {
            $tabs[$folder->folder] =
                Tab::make()
                ->badge(
                    Icon::where('folder', $folder->folder)
                        ->count()
                )
                ->modifyQueryUsing(fn(Builder $query) => $query->where('folder', $folder->folder));
        }

        return $tabs;
    }
}
