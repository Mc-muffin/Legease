<?php

use Illuminate\Database\Seeder;
use App\Entities\User;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $guard = config('auth.defaults.guard');

        DB::table(config('permission.table_names.permissions'))->insert([
            ['name' => env('MIX_PERM_MANAGE_ROLES', 'NO_PERM'), 'guard_name' => $guard],
            ['name' => env('MIX_PERM_MANAGE_TITLES', 'NO_PERM'), 'guard_name' => $guard],
            ['name' => env('MIX_PERM_MANAGE_USERS', 'NO_PERM'), 'guard_name' => $guard],
            ['name' => env('MIX_PERM_MANAGE_DEPS', 'NO_PERM'), 'guard_name' => $guard],
            ['name' => env('MIX_PERM_BASE', 'NO_PERM'), 'guard_name' => $guard],
            ['name' => env('MIX_PERM_MANAGESIGNS', 'NO_PERM'), 'guard_name' => $guard],
            ['name' => env('MIX_PERM_MANAGE_PLACES_MADE', 'NO_PERM'), 'guard_name' => $guard],
            ['name' => env('MIX_PERM_MANAGE_DOCTYPES', 'NO_PERM'), 'guard_name' => $guard],
            ['name' => env('MIX_PERM_MANAGE_PERMS', 'NO_PERM'), 'guard_name' => $guard],
            ['name' => env('MIX_PERM_GRANT_PERMS', 'NO_PERM'), 'guard_name' => $guard],
            ['name' => env('MIX_PERM_USE_STATS', 'NO_PERM'), 'guard_name' => $guard],
            ['name' => env('MIX_PERM_MANAGE_DOCS', 'NO_PERM'), 'guard_name' => $guard],
            ['name' => "documentos familia", 'guard_name' => $guard],
            ['name' => "documentos penal", 'guard_name' => $guard],
        ]);

        DB::table(config('permission.table_names.roles'))->insert([
            ['name' => 'Default', 'guard_name' => $guard],
            ['name' => 'Secretario', 'guard_name' => $guard],
            ['name' => 'Administrador', 'guard_name' => $guard],
            ['name' => 'Abogado', 'guard_name' => $guard],
        ]);

        Role::find(2)->syncPermissions([
            env('MIX_PERM_MANAGE_ROLES', 'NO_PERM'),
            env('MIX_PERM_MANAGE_USERS', 'NO_PERM'),
            env('MIX_PERM_MANAGE_DEPS', 'NO_PERM'),
            env('MIX_PERM_MANAGESIGNS', 'NO_PERM'),
            env('MIX_PERM_MANAGE_PLACES_MADE', 'NO_PERM'),
            env('MIX_PERM_MANAGE_PERMS', 'NO_PERM'),
            env('MIX_PERM_GRANT_PERMS', 'NO_PERM'),
            env('MIX_PERM_USE_STATS', 'NO_PERM'),
        ]);

        Role::find(3)->syncPermissions([
            env('MIX_PERM_MANAGE_ROLES', 'NO_PERM'),
            env('MIX_PERM_MANAGE_USERS', 'NO_PERM'),
            env('MIX_PERM_MANAGE_DEPS', 'NO_PERM'),
            env('MIX_PERM_MANAGESIGNS', 'NO_PERM'),
            env('MIX_PERM_MANAGE_PLACES_MADE', 'NO_PERM'),
            env('MIX_PERM_GRANT_PERMS', 'NO_PERM'),
            env('MIX_PERM_MANAGE_PERMS', 'NO_PERM'),
            env('MIX_PERM_BASE', 'NO_PERM'),
            env('MIX_PERM_USE_STATS', 'NO_PERM'),
            env('MIX_PERM_MANAGE_DOCTYPES', 'NO_PERM'),
            env('MIX_PERM_MANAGE_DOCS', 'NO_PERM'),
        ]);

        Role::find(4)->syncPermissions([
            "documentos familia",
            // env('MIX_PERM_MANAGE_DOCTYPES', 'NO_PERM'),
            // env('MIX_PERM_MANAGE_DOCS', 'NO_PERM'),
        ]);

        // for ($i=0; $i < 10; $i++) { 
        //     User::where('department_id', 'PKTCN')->get()->random()->assignRole();
        // }

        // for ($i=0; $i < 10; $i++) { 
        //     User::where('department_id', 'PHCHC')->get()->random()->assignRole();
        // }

        // for ($i=0; $i < 50; $i++) { 
        //     User::whereNotIn('department_id', ['PKTCN', 'PHCHC'])
        //         ->get()
        //         ->random()
        //         ->assignRole(Role::all()->random()->id);
        // }

        User::find('PKTCN-TP-1')->assignRole('Administrador');
        User::find('PKTCN-TP-100')->assignRole('Abogado');
        User::find('PKTCN-TP-200')->assignRole('Secretario');
    }
}
