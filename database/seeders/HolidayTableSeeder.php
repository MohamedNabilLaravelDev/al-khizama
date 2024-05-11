<?php

namespace Database\Seeders;

use App\Models\Holiday;
use Illuminate\Database\Seeder;

class HolidayTableSeeder extends Seeder {
  /**
   * Run the database seeds.
   */
  public function run(): void {

    Holiday::create([
      'date'        => now()->addDays(3),
      'title'       => [
        'ar' => 'اجازه 1',
        'en' => 'Holiday 1',
      ],
      'description' => [
        'ar' => 'اجازه 1',
        'en' => 'Holiday 1',
      ],
      'is_active'   => 1,
    ]);

    Holiday::create([
      'date'        => now()->addDays(10),
      'title'       => [
        'ar' => 'اجازه 2',
        'en' => 'Holiday 2',
      ],
      'description' => [
        'ar' => 'اجازه 2',
        'en' => 'Holiday 2',
      ],
      'is_active'   => 1,
    ]);

  }
}
