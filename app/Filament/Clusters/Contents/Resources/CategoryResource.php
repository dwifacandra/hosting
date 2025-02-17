<?php

namespace App\Filament\Clusters\Contents\Resources;

use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\{Builder, SoftDeletingScope};
use App\Filament\Clusters\Contents\Resources\CategoryResource\{Pages, Schemes};

class CategoryResource extends Resource
{
    use Schemes\ResourceInfo,
        Schemes\FormsScheme,
        Schemes\TablesScheme;

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'view' => Pages\ViewCategory::route('/{record}'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
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
