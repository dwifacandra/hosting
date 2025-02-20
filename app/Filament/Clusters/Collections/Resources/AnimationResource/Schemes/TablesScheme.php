<?php

namespace App\Filament\Clusters\Collections\Resources\AnimationResource\Schemes;

use App\{Enums\PostScope, Traits\DefaultOptions};
use Filament\{Tables, Tables\Table};
use Illuminate\{Database\Eloquent\Builder, Support\Str};

trait TablesScheme
{
    public static function table(Table $table): Table
    {
        DefaultOptions::getColumnConfigs();
        return $table
            ->modifyQueryUsing(function (Builder $query) {
                return $query->inScope(PostScope::ANIMATION);
            })
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->description(
                        fn($record) => Str::limit(strip_tags(
                            $record->content
                        ), 50)
                    ),
                Tables\Columns\TextColumn::make('author.username')
                    ->color('primary')
                    ->badge()
                    ->prefix('@'),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('views')
                    ->badge()
                    ->color('secondary')
                    ->alignCenter()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('likes')
                    ->badge()
                    ->color('secondary')
                    ->alignCenter()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('dislikes')
                    ->badge()
                    ->color('secondary')
                    ->alignCenter()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('shares')
                    ->badge()
                    ->color('secondary')
                    ->alignCenter()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('category.name')
                    ->color('info')
                    ->badge(),
                Tables\Columns\SpatieTagsColumn::make('tags')
                    ->color('info')
                    ->type('animation')
                    ->searchable(false),
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
