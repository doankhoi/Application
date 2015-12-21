<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $data = [
            ['title' => 'Adminstrator', 'slug' => 'admin'],
            ['title' => 'Redaction', 'slug' => 'redac'],
            ['title' => 'User', 'slug' => 'user']
        ];

        Role::create($data);

        $data1 = [
            'email' => 'doanngockhoi93@gmail.com',
            'username' => 'doankhoi',
            'password' => bcrypt('doankhoi123'),
            'photo' => '5873247f70fc8f6d8a0c4eaebcf1b972ecac7bd81448158592.jpg',
            'number_login' => 0, 
            'fails_login' => 0, 
            'role_id' => 2,
            'seen' => 1,
            'is_active' => 1,
            'register_token' => '0TH8a4O2j949ioTUE0asvBEv4zRhWq',
            'created_at' => '2015-11-22 02:16:32',
            'updated_at' => '2015-12-01 08:26:26',
            'confirmed' => 1,
            'remember_token' => 'KFg11iyhQJTUF4Gf9EnHGRkznHRlVgB13pwwjnpDMXZFRfAB5SovHizhCJXg',
            'description' => 'This is des'
        ];

        User::create($data1);
        Model::reguard();
    }
}
