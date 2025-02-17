<?php

namespace App\Filament\Clusters\Contents\Resources\CategoryResource\Pages;

use App\Filament\Clusters\Contents\Resources\CategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use JoseEspinal\RecordNavigation\Traits\HasRecordNavigation;

class ViewCategory extends ViewRecord
{
    use HasRecordNavigation;

    protected static string $resource = CategoryResource::class;

    protected function getHeaderActions(): array
    {
        $actions = [
            Actions\EditAction::make(),
        ];

        return array_merge($this->getNavigationActions(), $actions);
    }
}
