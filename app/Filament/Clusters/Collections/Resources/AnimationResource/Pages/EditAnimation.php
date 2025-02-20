<?php

namespace App\Filament\Clusters\Collections\Resources\AnimationResource\Pages;

use App\Filament\Clusters\Collections\Resources\AnimationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use JoseEspinal\RecordNavigation\Traits\HasRecordNavigation;

class EditAnimation extends EditRecord
{
    use HasRecordNavigation;

    protected static string $resource = AnimationResource::class;

    protected function getHeaderActions(): array
    {
        $actions = [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];

        return array_merge($this->getNavigationActions(), $actions);
    }
}
