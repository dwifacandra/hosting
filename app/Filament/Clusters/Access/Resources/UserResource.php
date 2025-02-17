<?php

namespace App\Filament\Clusters\Access\Resources;

use App\Models\User;
use App\Filament\Clusters\Access;
use App\Filament\Clusters\Access\Resources\UserResource\{Pages, Schemes};
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\{Builder, SoftDeletingScope};

class UserResource extends Resource
{
    use Schemes\ResourceInfo,
        Schemes\FormsScheme,
        Schemes\TablesScheme;

    protected static ?string $cluster = Access::class;
    protected static ?string $model = User::class;

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
