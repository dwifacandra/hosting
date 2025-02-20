<?php

namespace App\Filament\Clusters\Resumes\Resources\CompanyResource\Pages;

use App\Filament\Clusters\Resumes\Resources\CompanyResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use JoseEspinal\RecordNavigation\Traits\HasRecordsList;

class ListCompanies extends ListRecords
{
    use HasRecordsList;

    protected static string $resource = CompanyResource::class;

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
