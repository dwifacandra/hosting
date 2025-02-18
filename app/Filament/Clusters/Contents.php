<?php

namespace App\Filament\Clusters;

use Filament\Clusters\Cluster;

class Contents extends Cluster
{
    public static function getClusterBreadcrumb(): string
    {
        return __('core.content.label');
    }
}
