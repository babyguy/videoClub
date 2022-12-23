<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Pelicula;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
   
    public function run()
    {
     
        Pelicula::factory(10)->create();

        $this->call([PermissionSeeder::class]);
        User::factory(2)->create();
        $admin = User::find(1);
        $admin->assignRole('admin');
        $cashier=User::find(2);
        $cashier->assignRole('cliente');

    }
}