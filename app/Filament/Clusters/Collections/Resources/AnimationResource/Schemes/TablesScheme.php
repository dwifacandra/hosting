<?php

namespace App\Filament\Clusters\Collections\Resources\AnimationResource\Schemes;

use Filament\Forms;
use Filament\Tables;
use App\Models\Category;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use App\Traits\DefaultOptions;
use Illuminate\Database\Eloquent\Builder;

trait TablesScheme
{
    public static function table(Table $table): Table
    {
        DefaultOptions::getColumnConfigs();
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->description(
                        fn($record) => Str::limit(strip_tags(
                            $record->description
                        ), 50)
                    ),
                Tables\Columns\TextColumn::make('author.username')
                    ->color('primary')
                    ->badge()
                    ->prefix('@'),
                Tables\Columns\TextColumn::make('status')
                    ->badge(),
                Tables\Columns\TextColumn::make('category.name')
                    ->color('info')
                    ->badge(),
                Tables\Columns\SpatieTagsColumn::make('tags')
                    ->color('info')
                    ->type('animation'),
                Tables\Columns\TextColumn::make('source')
                    ->color('secondary')
                    ->badge(),
                Tables\Columns\TextColumn::make('source_url')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
