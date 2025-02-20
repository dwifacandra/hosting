<?php

namespace App\Filament\Clusters\Resumes\Resources\CompanyResource\Schemes;

use App\Models\Company;
use Filament\{Tables, Tables\Table};
use Illuminate\Database\Eloquent\Collection;
use App\{Traits\DefaultOptions};

trait TablesScheme
{
    public static function table(Table $table): Table
    {
        DefaultOptions::getColumnConfigs();
        return $table
            ->columns([
                Tables\Columns\SpatieMediaLibraryImageColumn::make('logo')
                    ->collection('companies')
                    ->filterMediaUsing(fn(Collection $media): Collection => $media->where('custom_properties.scope', 'logo'))
                    ->alignment('center')
                    ->size(28)
                    ->extraImgAttributes(fn(Company $record): array => [
                        'alt' => "{$record->name} logo",
                        'class' => 'object-contain',
                    ]),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('url')
                    ->size('sm')
                    ->lineClamp(1)
                    ->url(
                        fn(Company $record): string =>
                        $record->url ?? '',
                        shouldOpenInNewTab: true
                    ),
                Tables\Columns\TextColumn::make('description')->lineClamp(2)->html(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
