<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = Role::create(['name'=>'user']);
        $business  = Role::create(['name'=>'business']);

        $user_create =  User::factory()->user()->create();
        $business_create =  User::factory()->business()->create();

        $user_create->assignRole($user);
        $business_create->assignRole($business);
    }
}
