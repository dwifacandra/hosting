<?php

namespace App\Filament\Clusters\Access\Pages;

use Filament\Actions\Action;
use App\Filament\Clusters\Access;
use Filament\Support\Enums\ActionSize;
use Filament\Actions\Contracts\HasActions;
use App\Http\Controllers\Dev\AutomationController;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\{Pages\Page, Pages\SubNavigationPosition};

class DevOps extends Page implements HasActions
{
    use InteractsWithActions;
    protected $automation;
    protected static ?string $cluster = Access::class;
    protected static string $view = 'filament.clusters.access.pages.dev-ops';
    protected static ?string $navigationIcon = 'icon-core.outline.developer_board';
    protected static ?string $activeNavigationIcon = 'icon-core.fill.developer_board';
    protected static ?int $navigationSort = 3;
    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;
    public function __construct()
    {
        $this->automation = new AutomationController();
    }
    public function optimize(): Action
    {
        return Action::make('optimize')
            ->label('Process')
            ->requiresConfirmation()
            ->color('danger')
            ->size(ActionSize::Small)
            ->action(fn() => $this->automation->callCommand('optimize'));
    }
    public function optimizeClear(): Action
    {
        return Action::make('optimizeClear')
            ->label('Process')
            ->requiresConfirmation()
            ->color('danger')
            ->size(ActionSize::Small)
            ->action(fn() => $this->automation->callCommand('optimize:clear'));
    }
    public function runMigrate(): Action
    {
        return Action::make('runMigrate')
            ->label('Process')
            ->requiresConfirmation()
            ->color('danger')
            ->size(ActionSize::Small)
            ->action(fn() => $this->automation->callCommand('migrate --force'));
    }
    public function storageLink(): Action
    {
        return Action::make('storageLink')
            ->label('Process')
            ->requiresConfirmation()
            ->color('danger')
            ->size(ActionSize::Small)
            ->action(fn() => $this->automation->callCommand('storage:link'));
    }
    public function storageUnlink(): Action
    {
        return Action::make('storageUnlink')
            ->label('Process')
            ->requiresConfirmation()
            ->color('danger')
            ->size(ActionSize::Small)
            ->action(fn() => $this->automation->callCommand('storage:unlink'));
    }
    public function permissionSync(): Action
    {
        return Action::make('permissionSync')
            ->label('Process')
            ->requiresConfirmation()
            ->color('danger')
            ->size(ActionSize::Small)
            ->action(fn() => $this->automation->callCommand('shield:generate'));
    }
}
