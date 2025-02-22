<?php

namespace App\Filament\Clusters\Statistic\Resources\VisitorResource\Schemes;

use App\Models\Visitor;
use App\Filament\Clusters\Statistic;
use Illuminate\Database\Eloquent\{Builder, SoftDeletingScope};

trait ResourceInfo
{
    public static function getCluster(): ?string
    {
        return Statistic::class;
    }

    public static function getModel(): string
    {
        return Visitor::class;
    }

    public static function getModelLabel(): string
    {
        return __('core.stats.visitor.label');
    }

    public static function shouldRegisterNavigation(): bool
    {
        return true;
    }

    public static function getSubNavigationPosition(): \Filament\Pages\SubNavigationPosition
    {
        return \Filament\Pages\SubNavigationPosition::Top;
    }

    public static function getNavigationGroup(): ?string
    {
        return '';
    }

    public static function getNavigationLabel(): string
    {
        return __('core.stats.visitor.label');
    }

    public static function getNavigationIcon(): string
    {
        return __('core.stats.visitor.icon');
    }

    public static function getActiveNavigationIcon(): string
    {
        return __('core.stats.visitor.icon_active');
    }
}
