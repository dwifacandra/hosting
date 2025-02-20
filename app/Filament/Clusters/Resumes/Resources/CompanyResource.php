<?php

namespace App\Filament\Clusters\Resumes\Resources;

use App\Filament\Clusters\Resumes\Resources\CompanyResource\{Pages, Schemes};
use Filament\Resources\Resource;

class CompanyResource extends Resource
{
    use Schemes\ResourceInfo,
        Schemes\FormsScheme,
        Schemes\TablesScheme;

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCompanies::route('/'),
            'create' => Pages\CreateCompany::route('/create'),
            'edit' => Pages\EditCompany::route('/{record}/edit'),
        ];
    }
}
