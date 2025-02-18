<?php

namespace App\Traits;

trait Plugins
{
    public static function getAll(): array
    {
        return [
            \TomatoPHP\FilamentMediaManager\FilamentMediaManagerPlugin::make()
                ->allowSubFolders()
                ->allowUserAccess(),
            \BezhanSalleh\FilamentShield\FilamentShieldPlugin::make()
                ->gridColumns([
                    'default' => 1,
                    'sm' => 2,
                    'lg' => 3
                ])
                ->sectionColumnSpan(1)
                ->checkboxListColumns([
                    'default' => 1,
                    'sm' => 2,
                    'lg' => 4,
                ])
                ->resourceCheckboxListColumns([
                    'default' => 1,
                    'sm' => 2,
                ]),
        ];
    }
}
