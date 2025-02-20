<?php

namespace App\Filament\Clusters\Resumes\Resources\SkillResource\Schemes;

use App\Filament\Clusters\Resumes;
use App\Models\Skill;
use Illuminate\Database\Eloquent\Model;

trait ResourceInfo
{
    public static function getGlobalSearchResultTitle(Model $record): string
    {
        return $record->name;
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name'];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'rating' => $record->rating,
        ];
    }

    public static function getCluster(): ?string
    {
        return Resumes::class;
    }

    public static function getModel(): string
    {
        return Skill::class;
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
        return __('core.resume.skill.label');
    }

    public static function getNavigationIcon(): string
    {
        return __('core.resume.skill.icon');
    }

    public static function getActiveNavigationIcon(): string
    {
        return __('core.resume.skill.icon_active');
    }
}
