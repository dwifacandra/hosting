<?php

namespace App\Filament\Clusters\Access\Resources\UserResource\Schemes;

trait ResourceInfo
{
    public static function getSubNavigationPosition(): \Filament\Pages\SubNavigationPosition
    {
        return \Filament\Pages\SubNavigationPosition::Top;
    }

    public static function getNavigationLabel(): string
    {
        return __('core.access.users.label');
    }

    public static function getNavigationIcon(): ?string
    {
        return __('core.access.users.icon');
    }

    public static function getActiveNavigationIcon(): string
    {
        return __('core.access.users.icon_active');
    }
}
