<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $data = [
            'fullname' => 'Vasin Chatkittisuk',
            'username' => 'vasin90',
            'email' => 'vasin.chatkittisuk@gmail.com',
            'password' => Hash::make('1234'),
            'tel' => '0631595052',
            'avatar' => 'https://via.placeholder.com/400x400.png/005429?text=user',
            'role' => '1',
            'remember_token' => '1234567890',
        ];

        User::create($data);

        // เรียก UserFactory เพื่อ Generate data
        User::factory(99)->create();
    }
}
