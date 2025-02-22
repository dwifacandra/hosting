<?php

namespace App\Filament\Clusters\Statistic\Resources;

use Filament\Resources\Resource;
use App\Filament\Clusters\Statistic\Resources\VisitorResource\{Pages, Schemes};


class VisitorResource extends Resource
{
    use Schemes\ResourceInfo,
        Schemes\InfolistScheme,
        Schemes\TablesScheme;

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVisitors::route('/'),
            'view' => Pages\ViewVisitor::route('/{record}'),
        ];
    }
}
