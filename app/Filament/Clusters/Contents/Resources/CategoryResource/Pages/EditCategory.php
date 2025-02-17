<?php

namespace App\Filament\Clusters\Contents\Resources\CategoryResource\Pages;

use App\Filament\Clusters\Contents\Resources\CategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use JoseEspinal\RecordNavigation\Traits\HasRecordNavigation;

class EditCategory extends EditRecord
{
    use HasRecordNavigation;

    protected static string $resource = CategoryResource::class;

    protected function getHeaderActions(): array
    {
        $actions = [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];

        return array_merge($this->getNavigationActions(), $actions);
    }
}
