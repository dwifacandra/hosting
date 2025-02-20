<?php

namespace App\Filament\Clusters\Resumes\Resources\ExperienceResource\Schemes;

use App\Filament\Clusters\Resumes;
use App\Models\Experience;
use Illuminate\Database\Eloquent\Model;

trait ResourceInfo
{
    public static function getGlobalSearchResultTitle(Model $record): string
    {
        return $record->name;
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['job_title'];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'Info' => $record->description,
            'Type' => $record->job_type,
        ];
    }

    public static function getCluster(): ?string
    {
        return Resumes::class;
    }

    public static function getModel(): string
    {
        return Experience::class;
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
        return __('core.resume.experience.label');
    }

    public static function getNavigationIcon(): string
    {
        return __('core.resume.experience.icon');
    }

    public static function getActiveNavigationIcon(): string
    {
        return __('core.resume.experience.icon_active');
    }
}
