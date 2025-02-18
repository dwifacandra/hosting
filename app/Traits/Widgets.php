<?php

namespace App\Traits;

trait Widgets
{
    public static function getAll(): array
    {
        return [
            \Filament\Widgets\AccountWidget::class,
            \App\Filament\Widgets\ApplicationInfo::class,
        ];
    }
}
