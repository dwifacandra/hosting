<?php

namespace App\Filament\Clusters\Access\Resources\UserResource\Schemes;

use App\Filament\Clusters\Access;
use App\Models\User;
use Illuminate\Database\Eloquent\{Model, Builder, SoftDeletingScope};

trait ResourceInfo
{
    public static function getGlobalSearchResultTitle(Model $record): string
    {
        return $record->email;
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['email', 'firstname', 'lastname'];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'name' => $record->firstname . ' ' . $record->lastname,
        ];
    }

    public static function getCluster(): ?string
    {
        return Access::class;
    }

    public static function getModel(): string
    {
        return User::class;
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

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

    public static function getNavigationBadge(): ?string
    {
        return parent::getEloquentQuery()->count();
    }
}
