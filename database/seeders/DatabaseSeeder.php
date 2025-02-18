<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $user = User::firstOrCreate(
            [
                'email' => 'aditya@dwifacandra.test',
                'username' => 'dwifacandra',
                'firstname' => 'Aditya',
                'lastname' => 'Dwifacandra',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ]
        );

        Artisan::call('shield:super-admin', [
            '--user' => $user->id,
            '--panel' => 'core'
        ]);
        Artisan::call('shield:generate', [
            '--all' => true,
            '--panel' => 'core'
        ]);

        if (config('app.env') === 'local') {
            $this->call([
                CategorySeeder::class,
                AnimationSeeder::class,
            ]);
        }
        $this->call([]);
    }
}
