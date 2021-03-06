<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['title' => 'Adminstrator', 'slug' => 'admin'],
            ['title' => 'Redaction', 'slug' => 'redac'],
            ['title' => 'User', 'slug' => 'user']
        ];

        Role::create($data);
    }
}
