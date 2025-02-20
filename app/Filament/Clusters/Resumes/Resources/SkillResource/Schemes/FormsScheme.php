<?php

namespace App\Filament\Clusters\Resumes\Resources\SkillResource\Schemes;

use App\Enums\{Rating};
use App\Models\Category;
use App\Helpers\CoreIcon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Filament\{Forms, Forms\Form};

trait FormsScheme
{
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->columns(3)
                    ->schema([
                        Forms\Components\Hidden::make('user_id')->default(Auth::user()->id),
                        Forms\Components\TextInput::make('name')->required(),
                        Forms\Components\Select::make('category_id')
                            ->required()
                            ->reactive()
                            ->native(false)
                            ->relationship(
                                name: 'category',
                                titleAttribute: 'name',
                                modifyQueryUsing: fn(Builder $query) => $query->where('scope', 'skill'),
                            )
                            ->prefixIcon(function ($state): string {
                                $category = Category::find($state);
                                return $category ? $category->icon : '';
                            }),
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
                Forms\Components\Section::make()
                    ->columns(2)
                    ->schema([
                        Forms\Components\ToggleButtons::make('rating')
                            ->inline()
                            ->options(Rating::class),
                    ]),
            ]);
    }
}
