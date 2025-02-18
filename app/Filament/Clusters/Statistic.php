<?php

namespace App\Filament\Clusters;

use Filament\Clusters\Cluster;

class Statistic extends Cluster
{
    public static function getClusterBreadcrumb(): string
    {
        return __('core.stats.label');
    }
}
