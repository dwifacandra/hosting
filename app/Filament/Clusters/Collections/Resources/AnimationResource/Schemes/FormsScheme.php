<?php

namespace App\Filament\Clusters\Collections\Resources\AnimationResource\Schemes;

use Filament\Forms;
use Filament\Forms\Set;
use App\Models\Category;
use Filament\Forms\Form;
use App\Enums\PostStatus;
use Illuminate\Support\Str;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Builder;

trait FormsScheme
{
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Split::make([
                    Forms\Components\Section::make('General')
                        ->extraAttributes(['style' => 'min-height: 50vh;'])
                        ->schema([
                            Forms\Components\Hidden::make('author_id')
                                ->default(Auth()->user()->id),
                            Forms\Components\Hidden::make('slug')
                                ->required(),
                            Forms\Components\TextInput::make('title')
                                ->required()
                                ->maxLength(255)
                                ->live(onBlur: true)
                                ->autocapitalize('words')
                                ->helperText(fn($state): string => 'Slug: ' . $state)
                                ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),
                            Forms\Components\Select::make('category_id')
                                ->required()
                                ->reactive()
                                ->native(false)
                                ->relationship(
                                    name: 'category',
                                    titleAttribute: 'name',
                                    modifyQueryUsing: fn(Builder $query) => $query->where('scope', 'animation'),
                                )
                                ->prefixIcon(function ($state): string {
                                    $category = Category::find($state);
                                    return $category ? $category->icon : '';
                                }),
                            Forms\Components\SpatieTagsInput::make('tags')
                                ->type('animation')
                        ]),
                    Forms\Components\Section::make('Sources')
                        ->extraAttributes(['style' => 'min-height: 50vh;'])
                        ->schema([
                            Forms\Components\TextInput::make('source')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('source_url')
                                ->maxLength(255)
                                ->default(null),
                        ]),
                    Forms\Components\Section::make('Additional')
                        ->extraAttributes(['style' => 'min-height: 50vh;'])
                        ->schema([
                            Forms\Components\Select::make('status')
                                ->required()
                                ->reactive()
                                ->native(false)
                                ->options(PostStatus::class)
                                ->default(PostStatus::DRAFT->value)
                                ->prefixIcon(function ($state): string {
                                    return PostStatus::from($state)->getIcon();
                                }),
                        ]),
                ])->columnSpanFull()->from('md'),
                TiptapEditor::make('description')
                    ->hiddenLabel()
                    ->columnSpanFull()
                    ->extraInputAttributes(['style' => 'min-height: 50vh;']),
            ]);
    }
}
