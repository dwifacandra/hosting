<x-filament-widgets::widget>
    <x-filament::section>
        <div class="app-info">
            <img src="{{ asset('img/logo.ico') }}" class="app-logo" />
            <div class="app-detail">
                <p>
                    {{ config('app.name') }} <span class="text-sm font-thin">{{ config('app.version') ?
                        "v".env('APP_VERSION'):
                        '' }}</span>
                </p>
                <p style="margin-top: 1px;margin-bottom: 1px;" class="text-xs text-gray-500 dark:text-gray-400">
                    {{ config('app.url') }}
                </p>
            </div>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>