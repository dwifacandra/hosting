<?php

namespace App\Filament\Clusters\Resumes\Resources;

use App\Filament\Clusters\Resumes\Resources\SkillResource\{Pages, Schemes};
use Filament\Resources\Resource;

class SkillResource extends Resource
{
    use Schemes\ResourceInfo,
        Schemes\FormsScheme,
        Schemes\TablesScheme;

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSkills::route('/'),
            'create' => Pages\CreateSkill::route('/create'),
            'edit' => Pages\EditSkill::route('/{record}/edit'),
        ];
    }
}
