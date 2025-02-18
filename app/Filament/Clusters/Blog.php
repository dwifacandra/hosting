<?php

namespace App\Filament\Clusters;

use Filament\Clusters\Cluster;

class Blog extends Cluster
{
    public static function getClusterBreadcrumb(): string
    {
        return __('core.blog.label');
    }
}
