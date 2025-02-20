<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // # Hooks
        \Filament\Tables\Table::$defaultDateDisplayFormat = 'd/m/o';
        \Filament\Tables\Table::$defaultDateTimeDisplayFormat = 'd/m/o H:i';
        \Filament\Support\Facades\FilamentIcon::register([
            'panels::sidebar.expand-button' => 'color.d_logo',
        ]);
        \Filament\Support\Facades\FilamentView::registerRenderHook(
            \Filament\View\PanelsRenderHook::FOOTER,
            fn(): \Illuminate\Contracts\View\View => view('filament.components.panel-footer'),
        );
        \Filament\Support\Facades\FilamentView::registerRenderHook(
            \Filament\View\PanelsRenderHook::USER_MENU_BEFORE,
            fn(): \Illuminate\Contracts\View\View => view('filament.components.button-website'),
        );
        \BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch::configureUsing(
            function (\BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch $switch) {
                $switch
                    ->locales(['en', 'id'])
                    ->renderHook('panels::user-menu.before')
                    ->flags([
                        'en' => asset('img/flags/en.svg'),
                        'id' => asset('img/flags/id.svg'),
                    ]);
            }
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Shield
        Gate::policy(\TomatoPHP\FilamentMediaManager\Models\Folder::class, \App\Policies\FolderPolicy::class);
        Gate::policy(\TomatoPHP\FilamentMediaManager\Models\Media::class, \App\Policies\MediaPolicy::class);

        // # Table Default Config
        \Filament\Tables\Table::configureUsing(
            function (\Filament\Tables\Table $table): void {
                $table
                    ->poll('10s')
                    ->emptyStateHeading('No data yet')
                    ->deferLoading()->deferFilters()
                    ->defaultPaginationPageOption(10)
                    ->paginated([10, 25, 50, 100])
                    ->extremePaginationLinks()
                    ->defaultSort('created_at', 'desc')
                    ->persistSearchInSession();
            }
        );
    }
}
