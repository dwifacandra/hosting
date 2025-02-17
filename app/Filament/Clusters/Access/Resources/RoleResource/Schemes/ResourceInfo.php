<?php

namespace App\Filament\Clusters\Access\Resources\RoleResource\Schemes;

use BezhanSalleh\FilamentShield\Support\Utils;

trait ResourceInfo
{
    public static function getCluster(): ?string
    {
        return Utils::getResourceCluster() ?? 'Access';
    }

    public static function getModel(): string
    {
        return Utils::getRoleModel();
    }

    public static function getModelLabel(): string
    {
        return __('core.access.roles.label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('core.access.roles.label');
    }

    public static function shouldRegisterNavigation(): bool
    {
        return Utils::isResourceNavigationRegistered();
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
        return __('core.access.roles.label');
    }

    public static function getNavigationIcon(): string
    {
        return __('core.access.roles.icon');
    }

    public static function getActiveNavigationIcon(): string
    {
        return __('core.access.roles.icon_active');
    }

    public static function getNavigationSort(): ?int
    {
        return Utils::getResourceNavigationSort();
    }

    public static function getSlug(): string
    {
        return Utils::getResourceSlug();
    }

    public static function getNavigationBadge(): ?string
    {
        return Utils::isResourceNavigationBadgeEnabled()
            ? strval(static::getEloquentQuery()->count())
            : null;
    }
}
