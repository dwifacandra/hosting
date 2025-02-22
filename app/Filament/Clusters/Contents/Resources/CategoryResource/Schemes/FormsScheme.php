<?php

namespace App\Filament\Clusters\Contents\Resources\CategoryResource\Schemes;

use App\Enums\PostScope;
use Filament\Forms;
use Filament\Forms\Set;
use App\Models\Category;
use Filament\Forms\Form;
use App\Helpers\CoreIcon;
use Illuminate\Support\Str;
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
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->autocapitalize('words')
                            ->helperText(fn($state): string => 'Slug: ' . $state)
                            ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),
                        Forms\Components\Select::make('parent_id')
                            ->label('Parent Name')
                            ->native(false)
                            ->preload()
                            ->searchable()
                            ->options(Category::all()->pluck('name', 'id')),
                        Forms\Components\Hidden::make('slug')
                            ->required(),
                        Forms\Components\Select::make('scope')
                            ->required()
                            ->native(false)
                            ->preload()
                            ->searchable()
                            ->options(array_merge(
                                PostScope::toArray(),
                                ['skill' => 'Skill']
                            )),
                        Forms\Components\Select::make('icon')
                            ->native(false)
                            ->preload()
                            ->searchable()
                            ->reactive()
                            ->options(CoreIcon::getIcons())
                            ->default('outline.category')
                            ->prefixIcon(function ($state): string {
                                return $state;
                            }),
                    ]),
                TiptapEditor::make('description')
                    ->hiddenLabel()
                    ->columnSpanFull()
                    ->extraInputAttributes(['style' => 'min-height: 50vh;']),
            ]);
    }
}
