<?php

namespace App\Filament\Clusters;

use Filament\Clusters\Cluster;

class Access extends Cluster
{
    public static function getClusterBreadcrumb(): string
    {
        return __('core.access.label');
    }
}
