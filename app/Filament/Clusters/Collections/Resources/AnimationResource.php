<?php

namespace App\Filament\Clusters\Collections\Resources;

use App\Filament\Clusters\Collections\Resources\AnimationResource\{Pages, Schemes};
use Filament\Resources\Resource;

class AnimationResource extends Resource
{
    use Schemes\ResourceInfo,
        Schemes\FormsScheme,
        Schemes\TablesScheme;

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAnimations::route('/'),
            'create' => Pages\CreateAnimation::route('/create'),
            'view' => Pages\ViewAnimation::route('/{record}'),
            'edit' => Pages\EditAnimation::route('/{record}/edit'),
        ];
    }
}
