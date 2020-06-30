<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        $faker = Faker::create();
        $users = [];

        foreach(range(1, 20) as $index)
        {
            $users[] = [
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make('sa243fa243'),
                'type'    => rand(0, 1),
                'remember_token' => Str::random(10),
                'created_at'     => new DateTime,
                'updated_at'     => new DateTime
            ];
        }
        DB::table('users')->insert($users);
    }
}
