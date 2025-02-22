<?php

namespace App\Traits;

use Filament\Pages\Dashboard;
use Filament\Navigation\{NavigationBuilder, NavigationGroup, NavigationItem};
use App\Filament\Clusters\{Access, Blog, Collections, Statistic, Contents, Resumes};
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
                ->items([
                    ...self::canAccess(Blog\Resources\PostResource::getNavigationItems(), 'view_any_post'),
                ]),
            NavigationGroup::make()
                ->label(__('core.collection.label'))
                ->icon(__('core.collection.icon'))
                ->items([
                    ...self::canAccess(Collections\Resources\AnimationResource::getNavigationItems(), 'view_any_animation'),
                    ...self::canAccess(Collections\Resources\PhotographResource::getNavigationItems(), 'view_any_photograph'),
                    ...self::canAccess(Collections\Resources\IconResource::getNavigationItems(), 'view_any_icon'),
                ]),
            NavigationGroup::make()
                ->label(__('core.content.label'))
                ->icon(__('core.content.icon'))
                ->items([
                    ...self::canAccess(Contents\Resources\CategoryResource::getNavigationItems(), 'view_any_category'),
                    ...self::canAccess(FilamentMediaManager\Resources\FolderResource::getNavigationItems(), 'view_any_folder'),
                ]),
            NavigationGroup::make()
                ->label(__('core.stats.label'))
                ->icon(__('core.stats.icon'))
                ->items([
                    ...self::canAccess(Statistic\Resources\VisitorResource::getNavigationItems(), 'view_any_visitor'),
                ]),
            NavigationGroup::make()
                ->label(__('core.resume.label'))
                ->icon(__('core.resume.icon'))
                ->items([
                    ...self::canAccess(Resumes\Resources\CompanyResource::getNavigationItems(), 'view_any_company'),
                    ...self::canAccess(Resumes\Resources\ExperienceResource::getNavigationItems(), 'view_any_experience'),
                    ...self::canAccess(Resumes\Resources\SkillResource::getNavigationItems(), 'view_any_skill'),
                ]),
            NavigationGroup::make()
                ->label(__('core.access.label'))
                ->icon(__('core.access.icon'))
                ->items([
                    ...self::canAccess(Access\Resources\UserResource::getNavigationItems(), 'view_any_user'),
                    ...self::canAccess(Access\Resources\RoleResource::getNavigationItems(), 'view_any_role'),
                    ...self::canAccess(Access\Pages\DevOps::getNavigationItems(), 'page_DevOps'),
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
        return array_filter($items, fn($item) => auth()->user()->can($permission));
    }
}
