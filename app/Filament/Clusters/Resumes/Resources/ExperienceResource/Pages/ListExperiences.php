<?php

namespace App\Filament\Clusters\Resumes\Resources\ExperienceResource\Pages;

use App\Filament\Clusters\Resumes\Resources\ExperienceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use JoseEspinal\RecordNavigation\Traits\HasRecordsList;

class ListExperiences extends ListRecords
{
    use HasRecordsList;

    protected static string $resource = ExperienceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->icon('fill.add_circle')
                ->color('success')
                ->keyBindings(['ctrl+alt+n']),
        ];
    }
}
