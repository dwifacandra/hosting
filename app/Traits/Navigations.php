<?php

namespace App\Traits;

use Filament\Pages\Dashboard;
use Filament\Navigation\{NavigationBuilder, NavigationGroup, NavigationItem};
use App\Filament\Clusters\{Access, Collections, Statistic, Contents,};
use TomatoPHP\FilamentMediaManager;

trait Navigations
{
    public static function getAll()
    {
        return function (NavigationBuilder $builder): NavigationBuilder {
            $builder->groups(self::getGroups());
            $builder->items(self::getItems());
            return $builder;
        };
    }

    public static function getGroups(): array
    {
        return [
            NavigationGroup::make()
                ->label(__('core.blog.label'))
                ->icon(__('core.blog.icon'))
                ->items([]),
            NavigationGroup::make()
                ->label(__('core.collection.label'))
                ->icon(__('core.collection.icon'))
                ->items([
                    ...self::canAccess(Collections\Resources\AnimationResource::getNavigationItems(), 'animation'),
                    ...self::canAccess(Collections\Resources\IconResource::getNavigationItems(), 'icon'),
                ]),
            NavigationGroup::make()
                ->label(__('core.content.label'))
                ->icon(__('core.content.icon'))
                ->items([
                    ...self::canAccess(Contents\Resources\CategoryResource::getNavigationItems(), 'category'),
                    ...self::canAccess(FilamentMediaManager\Resources\FolderResource::getNavigationItems(), 'folder'),
                ]),
            NavigationGroup::make()
                ->label(__('core.access.label'))
                ->icon(__('core.access.icon'))
                ->items([
                    ...self::canAccess(Access\Resources\UserResource::getNavigationItems(), 'user'),
                    ...self::canAccess(Access\Resources\RoleResource::getNavigationItems(), 'role'),
                ]),
            NavigationGroup::make()
                ->label(__('core.stats.label'))
                ->icon(__('core.stats.icon'))
                ->items([]),
        ];
    }

    public static function getItems(): array
    {
        return [
            NavigationItem::make()
                ->label(__('core.dashboard.label'))
                ->icon(__('core.dashboard.icon'))
                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.pages.dashboard'))
                ->url(fn(): string => Dashboard::getUrl()),
        ];
    }

    private static function canAccess(array $items, string $permission): array
    {
        return array_filter($items, fn($item) => auth()->user()->can('view_any_' . $permission));
    }
}
