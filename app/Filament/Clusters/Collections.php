<?php

namespace App\Filament\Clusters;

use Filament\Clusters\Cluster;

class Collections extends Cluster
{
    public static function getClusterBreadcrumb(): string
    {
        return __('core.collection.label');
    }
}
