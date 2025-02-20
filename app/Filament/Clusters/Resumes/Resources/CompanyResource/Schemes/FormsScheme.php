<?php

namespace App\Filament\Clusters\Resumes\Resources\CompanyResource\Schemes;

use Filament\{Forms, Forms\Form,};
use Illuminate\{Support\Collection};
use FilamentTiptapEditor\TiptapEditor;

trait FormsScheme
{
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required(),
                        Forms\Components\TextInput::make('url')
                            ->url()
                            ->suffixIcon('heroicon-m-globe-alt'),
                        Forms\Components\SpatieMediaLibraryFileUpload::make('logo')
                            ->columnSpanFull()
                            ->disk('public')
                            ->collection('companies')
                            ->customProperties(['scope' => 'logo'])
                            ->filterMediaUsing(fn(Collection $media): Collection => $media->where('custom_properties.scope', 'logo'))
                            ->image()
                            ->imageEditor()
                            ->openable()
                            ->downloadable()
                            ->nullable(),
                    ]),
                TiptapEditor::make('description')
                    ->hiddenLabel()
                    ->columnSpanFull()
                    ->extraInputAttributes(['style' => 'min-height: 50vh;']),
            ]);
    }
}
