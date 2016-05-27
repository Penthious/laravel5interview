<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Factory as Faker;

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
        $user->role = 'Admin';
        $user->save();

		$faker = Faker::create();
		foreach(range(1, 100) as $index)
		{
            $user = new User();
            $user->name = $faker->name;
            $user->email = $faker->email;
            $user->password = 'test123';
            $user->role = 'user';
            $user->save();
		}
	}
}
