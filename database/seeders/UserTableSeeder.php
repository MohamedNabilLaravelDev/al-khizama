<?php
namespace Database\Seeders;

use DB;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {

  public function run() {

    $faker = Faker::create('ar_SA');
    $users = [];
    for ($i = 0; $i < 10; $i++) {

      $users[] = [
        'name'       => $faker->name,
        'phone'      => "51111111$i",
        'email'      => $faker->unique()->email,
        'password'   => bcrypt(123456),
        'is_blocked' => 0,
        'active'     => 1,
      ];
    }

    DB::table('users')->insert($users);
  }
}
