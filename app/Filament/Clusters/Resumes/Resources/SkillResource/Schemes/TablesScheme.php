<?php

namespace App\Filament\Clusters\Resumes\Resources\SkillResource\Schemes;

use Illuminate\Support\Str;
use App\{Traits\DefaultOptions};
use Filament\{Tables, Tables\Table};

trait TablesScheme
{
    public static function table(Table $table): Table
    {
        DefaultOptions::getColumnConfigs();
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->icon(fn($record) => $record->icon),
                Tables\Columns\TextColumn::make('rating')
                    ->badge(),
                Tables\Columns\TextColumn::make('category.name'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d/m/Y H:i:s'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime('d/m/Y H:i:s'),
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
