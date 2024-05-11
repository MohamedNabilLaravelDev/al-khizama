<?php

namespace Database\Seeders;

use App\Models\Day;
use App\Models\Time;
use Illuminate\Database\Seeder;

class DayTableSeeder extends Seeder {
  /**
   * Run the database seeds.
   */
  public function run(): void {

    $days_ar = ['السبت', 'الاحد', 'الاثنين', 'الثلاثاء', 'الاربعاء', 'الخميس', 'الجمعة'];
    $days_en = ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];

    Time::create([
      'name' => '12:00 AM',
      'time' => '00:00:00',
    ]);
    Time::create([
      'name' => '01:00 AM',
      'time' => '01:00:00',
    ]);

    Time::create([
      'name' => '02:00 AM',
      'time' => '02:00:00',
    ]);

    Time::create([
      'name' => '03:00 AM',
      'time' => '03:00:00',
    ]);

    Time::create([
      'name' => '04:00 AM',
      'time' => '04:00:00',
    ]);

    Time::create([
      'name' => '05:00 AM',
      'time' => '05:00:00',
    ]);

    Time::create([
      'name' => '06:00 AM',
      'time' => '06:00:00',
    ]);

    Time::create([
      'name' => '07:00 AM',
      'time' => '07:00:00',
    ]);

    Time::create([
      'name' => '08:00 AM',
      'time' => '08:00:00',
    ]);

    Time::create([
      'name' => '09:00 AM',
      'time' => '09:00:00',
    ]);

    Time::create([
      'name' => '10:00 AM',
      'time' => '10:00:00',
    ]);

    Time::create([
      'name' => '11:00 AM',
      'time' => '11:00:00',
    ]);

    Time::create([
      'name' => '01:00 PM',
      'time' => '13:00:00',
    ]);

    Time::create([
      'name' => '02:00 PM',
      'time' => '14:00:00',
    ]);

    Time::create([
      'name' => '03:00 PM',
      'time' => '15:00:00',
    ]);

    Time::create([
      'name' => '04:00 PM',
      'time' => '16:00:00',
    ]);

    Time::create([
      'name' => '05:00 PM',
      'time' => '17:00:00',
    ]);

    Time::create([
      'name' => '06:00 PM',
      'time' => '18:00:00',
    ]);

    Time::create([
      'name' => '07:00 PM',
      'time' => '19:00:00',
    ]);

    Time::create([
      'name' => '08:00 PM',
      'time' => '20:00:00',
    ]);

    Time::create([
      'name' => '09:00 PM',
      'time' => '21:00:00',
    ]);

    Time::create([
      'name' => '10:00 PM',
      'time' => '22:00:00',
    ]);

    Time::create([
      'name' => '11:00 PM',
      'time' => '23:00:00',
    ]);

    Time::create([
      'name' => '12:00 PM',
      'time' => '24:00:00',
    ]); //

    foreach ($days_ar as $key => $day_ar) {
      $day = Day::create([
        'name'         => [
          'ar' => $day_ar,
          'en' => $days_en[$key],
        ],
        'is_available' => true,
      ]);

      // DayInterval::create([
      //   'day_id'  => $day->id,
      //   'from_id' => 21,
      //   'to_id'   => 2,
      //   'from'    => '09:00:00',
      //   'to'      => '13:00:00',
      // ]);

      // DayInterval::create([
      //   'day_id'  => $day->id,
      //   'from_id' => 6,
      //   'to_id'   => 11,
      //   'from'    => '17:00:00',
      //   'to'      => '22:00:00',
      // ]);

    }

  }
}
