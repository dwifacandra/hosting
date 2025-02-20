<?php

namespace App\Filament\Clusters\Access\Resources\UserResource\Pages;

use Filament\Forms;
use Filament\Actions;
use Filament\Support;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\Hash;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;
use App\Filament\Clusters\Access\Resources\UserResource;
use JoseEspinal\RecordNavigation\Traits\HasRecordNavigation;
use Filament\Notifications\Notification;

class EditUser extends EditRecord
{
    use HasRecordNavigation;

    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        $actions = [
            Actions\EditAction::make()
                ->label('Change password')
                ->icon('fill.lock')
                ->color('warning')
                ->form([
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
                ->modalWidth(Support\Enums\MaxWidth::Medium)
                ->modalHeading('Update Password')
                ->modalDescription(fn($record) => $record->email)
                ->modalAlignment('center')
                ->modalCloseButton(false)
                ->modalSubmitActionLabel('Submit')
                ->modalCancelActionLabel('Cancel'),
            Actions\RestoreAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\DeleteAction::make()
                ->icon('fill.delete')
                ->color('danger')
                ->keyBindings(['ctrl+del']),
            Actions\CreateAction::make()
                ->icon('fill.add_circle')
                ->color('success')
                ->keyBindings(['ctrl+alt+n'])
                ->url(fn(): string => static::$resource::getNavigationUrl() . '/create'),
        ];

        return array_merge($actions, $this->getNavigationActions());
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    public function getTitle(): Htmlable
    {
        $title = $this->record->name;
        $badge = $this->getBadgeStatus();

        return new HtmlString("
            <div class='flex items-center space-x-2'>
                <div>$title</div>
                $badge
            </div>
        ");
    }

    public function getBadgeStatus(): string|Htmlable
    {
        if ($this->record->verified) {
            $badge = "<span class='inline-flex items-center px-2 py-1 text-xs font-semibold rounded-md text-success-700 bg-success-50 ring-1 ring-inset ring-success-600/20'>Verified</span>";
        } else {
            $badge = "<span class='inline-flex items-center px-2 py-1 text-xs font-semibold rounded-md text-danger-700 bg-danger-50 ring-1 ring-inset ring-danger-600/20'>Unverified</span>";
        }

        return $badge;
    }

    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('User Updated')
            ->body('Updated success for user ' . $this->record->name);
    }
}
