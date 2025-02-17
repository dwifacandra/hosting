<?php

namespace App\Filament\Clusters\Collections\Resources\IconResource\Pages;

use Filament\Resources\Pages\ManageRecords;
use App\Filament\Clusters\Collections\Resources\{IconResource, IconResource\Widgets\IconProvider};

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
}
