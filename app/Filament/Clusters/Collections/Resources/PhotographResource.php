<?php

namespace App\Filament\Clusters\Collections\Resources;

use Filament\Resources\Resource;
use App\Filament\Clusters\Collections\Resources\PhotographResource\{Pages, Schemes};

class PhotographResource extends Resource
{
    use Schemes\ResourceInfo,
        Schemes\FormsScheme,
        Schemes\TablesScheme;

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPhotographs::route('/'),
            'create' => Pages\CreatePhotograph::route('/create'),
            'edit' => Pages\EditPhotograph::route('/{record}/edit'),
        ];
    }
}
