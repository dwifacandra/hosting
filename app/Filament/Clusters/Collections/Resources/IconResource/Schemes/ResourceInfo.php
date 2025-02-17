<?php

namespace App\Filament\Clusters\Collections\Resources\IconResource\Schemes;

use App\Models\Icon;
use App\Filament\Clusters\Collections;

trait ResourceInfo
{
    public static function getCluster(): ?string
    {
        return Collections::class;
    }

    public static function getModel(): string
    {
        return Icon::class;
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
        return __('core.collection.core_icon.label');
    }

    public static function getNavigationIcon(): string
    {
        return __('core.collection.core_icon.icon');
    }

    public static function getActiveNavigationIcon(): string
    {
        return __('core.collection.core_icon.icon_active');
    }
}
