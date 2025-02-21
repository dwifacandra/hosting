<?php

namespace App\Filament\Clusters\Blog\Resources;

use Filament\Resources\Resource;
use App\Filament\Clusters\Blog\Resources\PostResource\{Pages, Schemes};

class PostResource extends Resource
{
    use Schemes\ResourceInfo,
        Schemes\FormsScheme,
        Schemes\TablesScheme;

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
