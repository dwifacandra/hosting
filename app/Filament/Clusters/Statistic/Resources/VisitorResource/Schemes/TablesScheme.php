<?php

namespace App\Filament\Clusters\Statistic\Resources\VisitorResource\Schemes;

use App\{Traits\DefaultOptions};
use Filament\{Tables, Tables\Table};

trait TablesScheme
{
    public static function table(Table $table): Table
    {
        DefaultOptions::getColumnConfigs();
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Datetime')
                    ->dateTime('d/m/Y H:i:s'),
                Tables\Columns\TextColumn::make('user_name')
                    ->label('User / Guest')
                    ->badge()
                    ->searchable(false)
                    ->sortable(false),
                Tables\Columns\TextColumn::make('locale')
                    ->badge()
                    ->color('secondary'),
                Tables\Columns\TextColumn::make('os')
                    ->label('OS')
                    ->searchable(false)
                    ->sortable(false),
                Tables\Columns\TextColumn::make('browser')
                    ->searchable(false)
                    ->sortable(false),
                Tables\Columns\TextColumn::make('ip_address')
                    ->label('IP Address')
                    ->url(fn($record) => 'https://ip-api.com/' . $record->ip_address)
                    ->openUrlInNewTab(),
                Tables\Columns\TextColumn::make('page_url')
                    ->label('URL')
                    ->limit(25)
                    ->alignLeft()
                    ->url(fn($record) => $record->page_url)
                    ->openUrlInNewTab()
                    ->searchable(false)
                    ->sortable(false),
                Tables\Columns\TextColumn::make('page_referer')
                    ->label('Referer')
                    ->limit(25)
                    ->alignLeft()
                    ->url(fn($record) => $record->page_referer)
                    ->openUrlInNewTab()
                    ->searchable(false)
                    ->sortable(false),
                Tables\Columns\TextColumn::make('page_path')
                    ->label('Path')
                    ->limit(25)
                    ->alignLeft()
                    ->searchable(false)
                    ->sortable(false),
                Tables\Columns\TextColumn::make('route_name')
                    ->label('Route Name')
                    ->alignLeft()
                    ->searchable(false)
                    ->sortable(false),
                Tables\Columns\TextColumn::make('route_query')
                    ->label('Route Query')
                    ->limit(25)
                    ->alignLeft()
                    ->searchable(false)
                    ->sortable(false),
                Tables\Columns\TextColumn::make('user_agent')
                    ->label('User Agent')
                    ->limit(25)
                    ->alignLeft(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
