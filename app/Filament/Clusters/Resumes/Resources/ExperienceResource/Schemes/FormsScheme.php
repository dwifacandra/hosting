<?php

namespace App\Filament\Clusters\Resumes\Resources\ExperienceResource\Schemes;

use Filament\{Forms, Forms\Form,};
use Illuminate\Support\Facades\Auth;
use App\Models\GeoLocations\{Province, Regency};
use App\Enums\{JobType, LocationType};
use FilamentTiptapEditor\TiptapEditor;

trait FormsScheme
{
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('user_id')->default(Auth::user()->id),
                Forms\Components\Section::make('General')
                    ->columns(3)
                    ->schema([
                        Forms\Components\TextInput::make('job_title')
                            ->required()
                            ->label('Job Title'),
                        Forms\Components\Select::make('job_type')
                            ->required()
                            ->native(false)
                            ->options(JobType::class),
                        Forms\Components\Select::make('company_id')
                            ->relationship('company', 'name')
                            ->required()
                            ->native(false)
                    ]),
                Forms\Components\Section::make('Location')
                    ->columns(2)
                    ->schema([
                        Forms\Components\Select::make('country')
                            ->options([
                                'Indonesia' => 'Indonesia',
                                'Malaysia' => 'Malaysia',
                                'Singapore' => 'Singapore',
                                'Thailand' => 'Thailand',
                                'Philippines' => 'Philippines',
                                'Vietnam' => 'Vietnam',
                                'Myanmar' => 'Myanmar',
                                'Cambodia' => 'Cambodia',
                                'Laos' => 'Laos',
                                'Brunei' => 'Brunei',
                                'East Timor' => 'East Timor'
                            ])
                            ->required()
                            ->default('Indonesia')
                            ->reactive()
                            ->native(false),
                        Forms\Components\Select::make('province')
                            ->required()
                            ->reactive()
                            ->native(false)
                            ->searchable()
                            ->disabled(fn(callable $get) => empty($get('country')))
                            ->options(Province::all()->pluck('name', 'alt_name')),
                        Forms\Components\Select::make('regency')
                            ->required()
                            ->reactive()
                            ->native(false)
                            ->searchable()
                            ->disabled(fn(callable $get) => empty($get('province')))
                            ->options(function (callable $get) {
                                $province = Province::where('alt_name', 'like', '%' . $get('province') . '%')->first()->id ?? null;
                                return Regency::where('province_id', $province)->pluck('name', 'alt_name');
                            }),
                        Forms\Components\Select::make('location_type')
                            ->required()
                            ->native(false)
                            ->options(LocationType::class)
                            ->default(LocationType::OnSite),
                    ]),
                Forms\Components\Section::make('Date')
                    ->columns(2)
                    ->schema([
                        Forms\Components\DatePicker::make('start_date')
                            ->required()
                            ->default(today()),
                        Forms\Components\DatePicker::make('end_date'),
                    ]),
                TiptapEditor::make('description')
                    ->hiddenLabel()
                    ->columnSpanFull()
                    ->extraInputAttributes(['style' => 'min-height: 50vh;']),
            ]);
    }
}
