<?php

namespace App\Filament\Clusters\Access\Resources\UserResource\Pages;

use App\Models\User;
use Filament\Actions;
use Spatie\Permission\Models\Role;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Filament\Pages\Concerns\ExposesTableToWidgets;
use App\Filament\Clusters\Access\Resources\UserResource;

class ListUsers extends ListRecords
{
    use ExposesTableToWidgets;

    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return static::$resource::getWidgets();
    }

    public function getTabs(): array
    {
        $user = auth()->user();
        $roles = Role::whereNot('name', config('filament-shield.super_admin.name'))->get();

        $tabs = [
            null => Tab::make('All')->badge(User::count()),
        ];

        foreach ($roles as $role) {
            $tabs[$role->name] =
                Tab::make()
                ->badge(
                    User::with('roles')
                        ->whereRelation('roles', 'name', '=', $role->name)
                        ->count()
                )
                ->query(fn($query) => $query
                    ->with('roles')
                    ->whereRelation('roles', 'name', '=', $role->name));
        }

        if ($user->isSuperAdmin()) {
            $tabs['root'] =
                Tab::make()
                ->badge(
                    User::with('roles')
                        ->whereRelation('roles', 'name', '=', config('filament-shield.super_admin.name'))
                        ->count()
                )
                ->query(fn($query) => $query
                    ->with('roles')
                    ->whereRelation('roles', 'name', '=', config('filament-shield.super_admin.name')));
        }

        return $tabs;
    }
}
