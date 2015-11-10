<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Role::class, 3)->create()->each(function($u) {
    		$u->issues()->save(factory(App\Models\User::class)->make());
  		});
    }
}
