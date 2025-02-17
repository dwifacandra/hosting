<?php

namespace App\Filament\Clusters\Collections\Resources\IconResource\Schemes;

use App\Models\Icon;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

trait TablesScheme
{
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\Layout\Stack::make([
                    Tables\Columns\IconColumn::make('preview')
                        ->alignCenter()
                        ->icon(fn($record) => $record->name)
                        ->size('2xl'),
                    Tables\Columns\TextColumn::make('name')
                        ->alignCenter()
                        ->copyable()
                        ->copyMessage(fn(string $state): string => "Copied {$state}")
                        ->formatStateUsing(function ($state) {
                            $lastPart = Str::afterLast($state, '.');
                            return str_replace('_', ' ', $lastPart);
                        })
                        ->lineClamp(1)
                        ->extraAttributes(['class' => 'pt-2 gap-y-0']),
                ])
            ])
            ->contentGrid(['default' => 2, 'xl' => 12,])
            ->filters([
                Tables\Filters\SelectFilter::make('folder')
                    ->multiple()
                    ->searchable()
                    ->options(function () {
                        return Icon::all()->pluck('folder', 'folder');
                    }),
            ])
            ->defaultPaginationPageOption(50)
            ->paginated([50, 100, 150, 200])
        ;
    }
}
