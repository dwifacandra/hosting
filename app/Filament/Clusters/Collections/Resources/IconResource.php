<?php

namespace App\Filament\Clusters\Collections\Resources;

use Filament\{Resources\Resource, Pages\SubNavigationPosition, Tables\Table};
use App\Filament\Clusters\Collections\Resources\IconResource\{Pages, Tables, Schemes};

class IconResource extends Resource
{
    use Schemes\ResourceInfo,
        Schemes\TablesScheme;

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageIcons::route('/'),
        ];
    }
}
