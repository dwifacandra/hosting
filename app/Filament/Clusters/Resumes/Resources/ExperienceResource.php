<?php

namespace App\Filament\Clusters\Resumes\Resources;

use App\Filament\Clusters\Resumes\Resources\ExperienceResource\{Pages, Schemes};
use Filament\Resources\Resource;

class ExperienceResource extends Resource
{
    use Schemes\ResourceInfo,
        Schemes\FormsScheme,
        Schemes\TablesScheme;

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListExperiences::route('/'),
            'create' => Pages\CreateExperience::route('/create'),
            'edit' => Pages\EditExperience::route('/{record}/edit'),
        ];
    }
}
