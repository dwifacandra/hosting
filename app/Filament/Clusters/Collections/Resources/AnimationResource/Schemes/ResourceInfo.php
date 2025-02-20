<?php

namespace App\Filament\Clusters\Collections\Resources\AnimationResource\Schemes;

use App\Models\Animation;
use App\Filament\Clusters\Collections;
use Illuminate\Database\Eloquent\{Model, Builder, SoftDeletingScope};

trait ResourceInfo
{
    public static function getGlobalSearchResultTitle(Model $record): string
    {
        return $record->title;
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['title', 'description'];
    }

    public static function getGlobalSearchResultsLimit(): int
    {
        return 10;
    }

    public static function getCluster(): ?string
    {
        return Collections::class;
    }

    public static function getModel(): string
    {
        return Animation::class;
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
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
        return __('core.collection.animation.label');
    }

    public static function getNavigationIcon(): string
    {
        return __('core.collection.animation.icon');
    }

    public static function getActiveNavigationIcon(): string
    {
        return __('core.collection.animation.icon_active');
    }
}
