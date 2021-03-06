<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->call([
            PopulatePlaces::class,
    		PopulateMoods::class,
    		RolesAndPermissionsSeeder::class,
            UsersTableSeeder::class,
            FakeManyUsers::class,
            FakeBars::class,
            FakeNews::class,
            FakeEvents::class,
    		FakeSubscriptions::class,
    	]);
    }
}
