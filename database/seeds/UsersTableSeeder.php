<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $user = new User();
        $user->name = 'Tomas';
        $user->email = 'tleffew1994@gmail.com';
        $user->password = 'test123';
        $user->role = 'admin';
        $user->save();
    }
}
