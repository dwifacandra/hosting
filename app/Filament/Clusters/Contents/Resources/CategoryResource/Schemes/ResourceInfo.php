<?php

namespace App\Filament\Clusters\Contents\Resources\CategoryResource\Schemes;

use App\Models\Category;
use App\Filament\Clusters\Contents;
use Illuminate\Database\Eloquent\Model;

trait ResourceInfo
{
    public static function getGlobalSearchResultTitle(Model $record): string
    {
        return $record->name;
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'scope'];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'Scope' => $record->scope,
        ];
    }

    public static function getCluster(): ?string
    {
        return Contents::class;
    }

    public static function getModel(): string
    {
        return Category::class;
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
        return __('core.content.category.label');
    }

    public static function getNavigationIcon(): string
    {
        return __('core.content.category.icon');
    }

    public static function getActiveNavigationIcon(): string
    {
        return __('core.content.category.icon_active');
    }
}
