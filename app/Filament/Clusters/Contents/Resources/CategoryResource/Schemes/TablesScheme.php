<?php

namespace App\Filament\Clusters\Contents\Resources\CategoryResource\Schemes;

use Filament\Tables;
use App\Models\Category;
use Filament\Tables\Table;
use App\Traits\DefaultOptions;

trait TablesScheme
{
    public static function table(Table $table): Table
    {
        DefaultOptions::getColumnConfigs();
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->icon(fn($record) => $record->icon),
                Tables\Columns\TextColumn::make('parent.name')
                    ->label('Parent Name'),
                Tables\Columns\TextColumn::make('scope')
                    ->badge()
                    ->visible(fn($livewire): bool => is_null($livewire->activeTab) || $livewire->activeTab === ''),
                Tables\Columns\TextColumn::make('slug'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }
}
