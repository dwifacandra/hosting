<?php

namespace App\Filament\Clusters\Statistic\Resources\VisitorResource\Pages;

use App\Filament\Clusters\Statistic\Resources\VisitorResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use JoseEspinal\RecordNavigation\Traits\HasRecordNavigation;

class ViewVisitor extends ViewRecord
{
    use HasRecordNavigation;

    protected static string $resource = VisitorResource::class;

    protected function getHeaderActions(): array
    {
        $actions = [
            Actions\DeleteAction::make()
                ->icon('fill.delete')
                ->color('danger')
                ->keyBindings(['ctrl+del']),
        ];

        return array_merge($actions, $this->getNavigationActions());
    }
}
