<?php

namespace App\Filament\Clusters\Resumes\Resources\ExperienceResource\Pages;

use App\Filament\Clusters\Resumes\Resources\ExperienceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use JoseEspinal\RecordNavigation\Traits\HasRecordNavigation;

class EditExperience extends EditRecord
{
    use HasRecordNavigation;

    protected static string $resource = ExperienceResource::class;

    protected function getHeaderActions(): array
    {
        $actions = [
            Actions\DeleteAction::make()
                ->icon('fill.delete')
                ->color('danger')
                ->keyBindings(['ctrl+del']),
            Actions\CreateAction::make()
                ->icon('fill.add_circle')
                ->color('success')
                ->keyBindings(['ctrl+alt+n'])
                ->url(fn(): string => static::$resource::getNavigationUrl() . '/create'),
        ];

        return array_merge($actions, $this->getNavigationActions());
    }
}
