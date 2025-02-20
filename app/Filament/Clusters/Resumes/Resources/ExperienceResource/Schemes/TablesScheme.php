<?php

namespace App\Filament\Clusters\Resumes\Resources\ExperienceResource\Schemes;

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
                Tables\Columns\TextColumn::make('job_title')
                    ->label('Job Title')
                    ->description(
                        fn($record) => Str::limit(strip_tags(
                            $record->description
                        ), 50)
                    ),
                Tables\Columns\TextColumn::make('job_type')
                    ->label('Job Type')
                    ->badge()
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('company.name')
                    ->label('Company Name')
                    ->badge()
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('location_type')
                    ->label('Location Type')
                    ->badge()
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('location'),
                Tables\Columns\TextColumn::make('experience_duration.duration')
                    ->label('Experience'),
                Tables\Columns\TextColumn::make('start_date')
                    ->label('Start Date')
                    ->date('d/m/Y')
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('end_date')
                    ->label('End Date')
                    ->date('d/m/Y')
                    ->alignCenter(),
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
