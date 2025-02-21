<?php

namespace App\Filament\Clusters\Blog\Resources\PostResource\Schemes;

use App\Models\Category;
use App\Enums\{PostScope, PostStatus, SourceType};
use Filament\{Forms, Forms\Form, Forms\Get, Forms\Set};
use Illuminate\{Database\Eloquent\Builder, Support\Str, Support\Collection};

trait FormsScheme
{
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('scope')
                    ->default(PostScope::POST),
                Forms\Components\Hidden::make('author_id')
                    ->default(Auth()->user()->id),
                Forms\Components\Hidden::make('slug')
                    ->required(),
                Forms\Components\SpatieMediaLibraryFileUpload::make('cover')
                    ->hiddenLabel()
                    ->disk('public')->visibility('public')
                    ->collection('collections')
                    ->customProperties(['scope' => 'cover'])
                    ->filterMediaUsing(fn(Collection $media): Collection => $media->where('custom_properties.scope', 'cover'))
                    ->image()
                    ->openable()
                    ->downloadable()
                    ->columnSpanFull(),
                Forms\Components\Split::make([
                    Forms\Components\Section::make()
                        ->schema([
                            Forms\Components\TextInput::make('title')
                                ->required()
                                ->maxLength(255)
                                ->live(onBlur: true)
                                ->autocapitalize('words')
                                ->helperText(fn($state): string => 'Slug: ' . Str::slug($state))
                                ->dehydrateStateUsing(fn(string $state): string => Str::title($state))
                                ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),
                            \FilamentTiptapEditor\TiptapEditor::make('content')
                                ->hiddenLabel()->reactive()
                                ->columnSpanFull()
                                ->extraInputAttributes(['style' => 'min-height: 50vh;']),
                        ]),
                    Forms\Components\Section::make()
                        ->extraAttributes(['style' => 'width: 25vw'])
                        ->grow(false)
                        ->schema([
                            Forms\Components\Select::make('status')
                                ->required()
                                ->reactive()
                                ->native(false)
                                ->default(PostStatus::DRAFT->value)
                                ->options(PostStatus::class)
                                ->prefixIcon(function ($state): string {
                                    return PostStatus::from($state)->getIcon();
                                }),
                            Forms\Components\Select::make('category_id')
                                ->required()
                                ->reactive()
                                ->native(false)
                                ->relationship(
                                    name: 'category',
                                    titleAttribute: 'name',
                                    modifyQueryUsing: fn(Builder $query) => $query->where('scope', PostScope::POST),
                                )
                                ->prefixIcon(function ($state): string {
                                    $category = Category::find($state);
                                    return $category ? $category->icon : '';
                                }),
                            Forms\Components\SpatieTagsInput::make('tags')
                                ->type(PostScope::POST->value),
                        ]),
                ])->columnSpanFull()->columns(4)->from('md'),
            ]);
    }
}
