<?php

namespace App\Filament\Clusters\Collections\Resources;

use Filament\Resources\Resource;
use App\Filament\Clusters\Collections\Resources\AnimationResource\{Pages, Schemes};

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
            'edit' => Pages\EditAnimation::route('/{record}/edit'),
        ];
    }
}
