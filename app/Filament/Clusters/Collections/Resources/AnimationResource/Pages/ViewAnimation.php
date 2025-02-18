<?php

namespace App\Filament\Clusters\Collections\Resources\AnimationResource\Pages;

use App\Filament\Clusters\Collections\Resources\AnimationResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use JoseEspinal\RecordNavigation\Traits\HasRecordNavigation;

class ViewAnimation extends ViewRecord
{
    use HasRecordNavigation;

    protected static string $resource = AnimationResource::class;

    protected function getHeaderActions(): array
    {
        $actions = [
            Actions\EditAction::make(),
        ];

        return array_merge($this->getNavigationActions(), $actions);
    }
}
