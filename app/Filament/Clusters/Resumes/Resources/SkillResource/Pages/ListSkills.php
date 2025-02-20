<?php

namespace App\Filament\Clusters\Resumes\Resources\SkillResource\Pages;

use App\Filament\Clusters\Resumes\Resources\SkillResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use JoseEspinal\RecordNavigation\Traits\HasRecordsList;

class ListSkills extends ListRecords
{
    use HasRecordsList;

    protected static string $resource = SkillResource::class;

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
