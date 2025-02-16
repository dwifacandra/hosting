<?php

namespace App\Traits;

use Filament\Pages\Dashboard;
use Firefly\FilamentBlog\Resources as FilamentBlog;
use Filament\Navigation\{NavigationBuilder, NavigationGroup, NavigationItem};
use App\Filament\Clusters\{Access,};

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
                ->items([
                    ...self::canAccess(FilamentBlog\CategoryResource::getNavigationItems(), 'category'),
                    ...self::canAccess(FilamentBlog\PostResource::getNavigationItems(), 'post'),
                    ...self::canAccess(FilamentBlog\TagResource::getNavigationItems(), 'tag'),
                    ...self::canAccess(FilamentBlog\SeoDetailResource::getNavigationItems(), 'seo::detail'),
                    ...self::canAccess(FilamentBlog\NewsletterResource::getNavigationItems(), 'newsletter'),
                    ...self::canAccess(FilamentBlog\CommentResource::getNavigationItems(), 'comment'),
                    ...self::canAccess(FilamentBlog\ShareSnippetResource::getNavigationItems(), 'share::snippet'),
                    ...self::canAccess(FilamentBlog\SettingResource::getNavigationItems(), 'setting'),
                ]),
            NavigationGroup::make()
                ->label(__('core.access.label'))
                ->icon(__('core.access.icon'))
                ->items([
                    ...self::canAccess(Access\Resources\UserResource::getNavigationItems(), 'user'),
                    ...self::canAccess(Access\Resources\RoleResource::getNavigationItems(), 'role'),
                ]),
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
