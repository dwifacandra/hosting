<?php

namespace App\Filament\Clusters\Collections\Resources;

use App\Models\Icon;
use Filament\{Resources\Resource, Pages\SubNavigationPosition, Tables\Table};
use App\Filament\Clusters\Collections;
use App\Filament\Clusters\Collections\Resources\IconResource\{Pages, Tables, Widgets};

class IconResource extends Resource
{
    protected static ?string $cluster = Collections::class;
    protected static ?string $model = Icon::class;
    protected static ?string $modelLabel = 'Icon';
    protected static ?string $recordTitleAttribute = 'name';
    protected static ?string $navigationIcon = 'icon-core.outline.fonticons';
    protected static ?string $activeNavigationIcon = 'icon-core.fill.fonticons';
    protected static ?int $navigationSort = 2;
    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;

    public static function table(Table $table): Table
    {
        return $table
            ->columns(Tables\IconTableColumns::getOptions())
            ->contentGrid(['default' => 2, 'xl' => 12,])
            ->filters(Tables\IconTableFilters::getOptions())
            ->defaultPaginationPageOption(50)
            ->paginated([50, 100, 150, 200])
        ;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageIcons::route('/'),
        ];
    }
}
