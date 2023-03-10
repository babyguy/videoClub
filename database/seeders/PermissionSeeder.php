<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Permission::create(['name'=>'create peliculas']);
        Permission::create(['name'=>'read peliculas']);
        Permission::create(['name'=>'update peliculas']);
        Permission::create(['name'=>'delete peliculas']);
 
        
 
        $roleAdmin =  Role::create(['name' => 'admin']);
        $roleCliente =  Role::create(['name' => 'cliente']);
 
        $roleAdmin->givePermissionto([
            'create peliculas',
            'read peliculas',
            'update peliculas',
            'delete peliculas',
        ]);

        $roleCliente->givepermissionTo([
            'read peliculas',
        ]);
    }
}
