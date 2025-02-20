<?php

namespace App\Filament\Clusters;

use Filament\Clusters\Cluster;

class Resumes extends Cluster
{
    public static function getClusterBreadcrumb(): string
    {
        return __('core.resume.label');
    }
}
