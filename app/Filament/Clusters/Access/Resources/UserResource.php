<?php

namespace App\Filament\Clusters\Access\Resources;

use App\Filament\Clusters\Access\Resources\UserResource\{Pages, Schemes};
use Filament\Resources\Resource;

class UserResource extends Resource
{
    use Schemes\ResourceInfo,
        Schemes\FormsScheme,
        Schemes\TablesScheme;

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
