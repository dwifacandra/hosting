<?php

namespace App\Filament\Clusters\Collections\Resources\PhotographResource\Pages;

use App\Filament\Clusters\Collections\Resources\PhotographResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use JoseEspinal\RecordNavigation\Traits\HasRecordNavigation;

class EditPhotograph extends EditRecord
{
    use HasRecordNavigation;

    protected static string $resource = PhotographResource::class;

    protected function getHeaderActions(): array
    {
        $actions = [
            Actions\DeleteAction::make()
                ->icon('fill.delete')
                ->color('danger')
                ->keyBindings(['ctrl+del']),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
            Actions\CreateAction::make()
                ->icon('fill.add_circle')
                ->color('success')
                ->keyBindings(['ctrl+alt+n'])
                ->url(fn(): string => static::$resource::getNavigationUrl() . '/create'),
        ];

        return array_merge($actions, $this->getNavigationActions());
    }
}
