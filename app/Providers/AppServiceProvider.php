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
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Shield
        Gate::policy(\Firefly\FilamentBlog\Models\Category::class, \App\Policies\CategoryPolicy::class);
        Gate::policy(\Firefly\FilamentBlog\Models\Post::class, \App\Policies\PostPolicy::class);
        Gate::policy(\Firefly\FilamentBlog\Models\Tag::class, \App\Policies\TagPolicy::class);
        Gate::policy(\Firefly\FilamentBlog\Models\SeoDetail::class, \App\Policies\SeoDetailPolicy::class);
        Gate::policy(\Firefly\FilamentBlog\Models\NewsLetter::class, \App\Policies\NewsLetterPolicy::class);
        Gate::policy(\Firefly\FilamentBlog\Models\Comment::class, \App\Policies\CommentPolicy::class);
        Gate::policy(\Firefly\FilamentBlog\Models\ShareSnippet::class, \App\Policies\ShareSnippetPolicy::class);
        Gate::policy(\Firefly\FilamentBlog\Models\Setting::class, \App\Policies\SettingPolicy::class);

        // # Table Default Config
        \Filament\Tables\Table::configureUsing(
            function (\Filament\Tables\Table $table): void {
                $table
                    ->emptyStateHeading('No data yet')
                    ->defaultPaginationPageOption(10)
                    ->paginated([10, 25, 50, 100])
                    ->extremePaginationLinks()
                    ->defaultSort('created_at', 'desc');
            }
        );

        // # Hooks
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
}
