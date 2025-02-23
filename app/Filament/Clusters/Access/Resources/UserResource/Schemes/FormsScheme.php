<?php

namespace App\Filament\Clusters\Access\Resources\UserResource\Schemes;

use Filament\Forms;
use App\Models\User;
use Filament\Forms\Form;
use Illuminate\Support\Str;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

trait FormsScheme
{
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make()
                    ->schema([
                        Forms\Components\Tabs\Tab::make('Details')
                            ->icon('heroicon-o-information-circle')
                            ->schema([
                                Forms\Components\TextInput::make('username')
                                    ->required()
                                    ->maxLength(255)
                                    ->live()
                                    ->rules(function ($record) {
                                        $userId = $record?->id;
                                        return $userId
                                            ? ['unique:users,username,' . $userId]
                                            : ['unique:users,username'];
                                    }),
                                Forms\Components\TextInput::make('email')
                                    ->email()
                                    ->required()
                                    ->maxLength(255)
                                    ->rules(function ($record) {
                                        $userId = $record?->id;
                                        return $userId
                                            ? ['unique:users,email,' . $userId]
                                            : ['unique:users,email'];
                                    }),
                                Forms\Components\TextInput::make('firstname')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('lastname')
                                    ->required()
                                    ->maxLength(255),
                            ])->columns(2),
                        Forms\Components\Tabs\Tab::make('Roles')
                            ->icon('fluentui-shield-task-48')
                            ->schema([
                                Forms\Components\Select::make('roles')
                                    ->hiddenLabel()
                                    ->relationship('roles', 'name')
                                    ->getOptionLabelFromRecordUsing(fn(Model $record) => Str::headline($record->name))
                                    ->multiple()
                                    ->preload()
                                    ->searchable()
                                    ->optionsLimit(5)
                                    ->columnSpanFull(),
                            ])
                    ])
                    ->extraAttributes(['style' => 'min-height: 70vh;'])
                    ->columnSpan([
                        'sm' => 1,
                        'lg' => 2
                    ]),
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make()
                            ->schema([
                                SpatieMediaLibraryFileUpload::make('media')
                                    ->hiddenLabel()
                                    ->avatar()
                                    ->collection('avatar')
                                    ->visibility('private')
                                    ->alignCenter()
                                    ->columnSpanFull()
                                    ->afterStateUpdated(function ($state, callable $get) {
                                        $userId = $get('id');
                                        Cache::forget("user_avatar_{$userId}");
                                    }),
                            ]),
                        // Forms\Components\Actions::make([
                        //     Forms\Components\Action::make('resend_verification')
                        //         ->label(__('resource.user.actions.resend_verification'))
                        //         ->color('info')
                        //         ->action(fn(MailSettings $settings, Model $record) => static::doResendEmailVerification($settings, $record)),
                        // ])
                        //     ->hidden(fn(User $user) => $user->email_verified_at != null)
                        //     ->hiddenOn('create')
                        //     ->fullWidth(),
                        Forms\Components\Section::make()
                            ->schema([
                                Forms\Components\TextInput::make('password')
                                    ->password()
                                    ->dehydrateStateUsing(fn(string $state): string => Hash::make($state))
                                    ->dehydrated(fn(?string $state): bool => filled($state))
                                    ->revealable()
                                    ->required(),
                                Forms\Components\TextInput::make('passwordConfirmation')
                                    ->password()
                                    ->dehydrateStateUsing(fn(string $state): string => Hash::make($state))
                                    ->dehydrated(fn(?string $state): bool => filled($state))
                                    ->revealable()
                                    ->same('password')
                                    ->required(),
                            ])
                            ->compact()
                            ->hidden(fn(string $operation): bool => $operation === 'edit'),
                        Forms\Components\Section::make()
                            ->schema([
                                Forms\Components\Split::make([
                                    Forms\Components\Placeholder::make('email_verified_at')
                                        ->label(__('core.access.users.field.email_verified_at'))
                                        ->content(fn(User $record): ?string => new HtmlString("$record->email_verified_at")),
                                    Forms\Components\Placeholder::make('deleted_at')
                                        ->label(__('core.access.users.field.deleted_at'))
                                        ->content(fn(User $record): ?string => $record->deleted_at?->diffForHumans()),
                                ]),
                                Forms\Components\Split::make([
                                    Forms\Components\Placeholder::make('created_at')
                                        ->label(__('core.access.users.field.created_at'))
                                        ->content(fn(User $record): ?string => $record->created_at?->diffForHumans()),
                                    Forms\Components\Placeholder::make('updated_at')
                                        ->label(__('core.access.users.field.updated_at'))
                                        ->content(fn(User $record): ?string => $record->updated_at?->diffForHumans()),
                                ]),
                            ])
                            ->compact()
                            ->hidden(fn(string $operation): bool => $operation === 'create'),
                    ])->columnSpan(1),
            ])->columns(3);
    }
}
