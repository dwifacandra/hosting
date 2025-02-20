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
