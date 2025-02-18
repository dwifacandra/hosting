<?php

namespace App\Filament\Clusters\Access\Resources\UserResource\Schemes;

use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use App\Traits\DefaultOptions;
use Illuminate\Database\Eloquent\Model;

trait TablesScheme
{
    public static function table(Table $table): Table
    {
        DefaultOptions::getColumnConfigs();
        return $table
            ->columns([
                Tables\Columns\SpatieMediaLibraryImageColumn::make('avatar')
                    ->collection('avatar')
                    ->visibility('private')
                    ->circular()
                    ->alignCenter()
                    ->size(40),
                Tables\Columns\TextColumn::make('username')
                    ->label(__('core.access.users.field.username'))
                    ->description(fn(Model $record) => $record->firstname . ' ' . $record->lastname),
                Tables\Columns\TextColumn::make('roles.name')
                    ->label(__('core.access.users.field.role'))
                    ->formatStateUsing(fn($state): string => Str::headline($state))
                    ->colors(['info'])
                    ->badge(),
                Tables\Columns\TextColumn::make('email')
                    ->label(__('core.access.users.field.email')),
                Tables\Columns\IconColumn::make('verified')
                    ->label(__('core.access.users.field.verified'))
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->toggleable(),
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
