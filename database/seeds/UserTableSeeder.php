<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\User::class, 10)->create()->each(function($u) {
    		$u->issues()->save(factory(App\Models\UserInfo::class)->make());
  		});
    }
}
