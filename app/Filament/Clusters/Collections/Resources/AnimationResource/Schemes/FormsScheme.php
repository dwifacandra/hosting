<?php

namespace App\Filament\Clusters\Collections\Resources\AnimationResource\Schemes;

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
                Forms\Components\Split::make([
                    Forms\Components\Section::make('General')
                        ->extraAttributes(['style' => 'min-height: 70vh;'])
                        ->schema([
                            Forms\Components\Hidden::make('scope')
                                ->default(PostScope::ANIMATION),
                            Forms\Components\Hidden::make('author_id')
                                ->default(Auth()->user()->id),
                            Forms\Components\Hidden::make('slug')
                                ->required(),
                            Forms\Components\TextInput::make('title')
                                ->required()
                                ->maxLength(255)
                                ->live(onBlur: true)
                                ->autocapitalize('words')
                                ->helperText(fn($state): string => 'Slug: ' . Str::slug($state))
                                ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),
                            Forms\Components\Select::make('category_id')
                                ->required()
                                ->reactive()
                                ->native(false)
                                ->relationship(
                                    name: 'category',
                                    titleAttribute: 'name',
                                    modifyQueryUsing: fn(Builder $query) => $query->where('scope', PostScope::ANIMATION),
                                )
                                ->prefixIcon(function ($state): string {
                                    $category = Category::find($state);
                                    return $category ? $category->icon : '';
                                }),
                            Forms\Components\SpatieTagsInput::make('tags')
                                ->type(PostScope::ANIMATION->value)
                        ]),
                    Forms\Components\Section::make('Sources')
                        ->extraAttributes(['style' => 'min-height: 70vh;'])
                        ->schema([
                            Forms\Components\Select::make('source')
                                ->required()
                                ->reactive()
                                ->native(false)
                                ->default(SourceType::YOUTUBE->value)
                                ->options(SourceType::class),
                            Forms\Components\TextInput::make('source_url')
                                ->label('Source Url')
                                ->maxLength(255)
                                ->default(null)
                                ->required(fn(Get $get): bool => $get('source') === SourceType::YOUTUBE->value)
                                ->hidden(fn(Get $get): bool => $get('source') === SourceType::LOCAL->value)
                                ->prefix('https://www.youtube.com/watch?v='),
                            Forms\Components\SpatieMediaLibraryFileUpload::make('attachment')
                                ->required(fn(Get $get): bool => $get('source') === SourceType::LOCAL->value)
                                ->hidden(fn(Get $get): bool => $get('source') === SourceType::YOUTUBE->value)
                                ->disk('private')->visibility('private')
                                ->collection('collections')
                                ->customProperties(['scope' => 'attachment'])
                                ->filterMediaUsing(fn(Collection $media): Collection => $media->where('custom_properties.scope', 'attachment'))
                                ->acceptedFileTypes(['video/mp4'])
                                ->openable()
                                ->downloadable()
                                ->columnSpanFull(),
                        ]),
                    Forms\Components\Section::make('Additional')
                        ->extraAttributes(['style' => 'min-height: 70vh;'])
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
                            Forms\Components\SpatieMediaLibraryFileUpload::make('cover')
                                ->required()
                                ->disk('public')->visibility('public')
                                ->collection('collections')
                                ->customProperties(['scope' => 'cover'])
                                ->filterMediaUsing(fn(Collection $media): Collection => $media->where('custom_properties.scope', 'cover'))
                                ->image()
                                ->openable()
                                ->downloadable()
                                ->columnSpanFull(),
                        ]),
                ])->columnSpanFull()->from('md'),
                \FilamentTiptapEditor\TiptapEditor::make('content')
                    ->hiddenLabel()
                    ->columnSpanFull()
                    ->extraInputAttributes(['style' => 'min-height: 50vh;']),
            ]);
    }
}
