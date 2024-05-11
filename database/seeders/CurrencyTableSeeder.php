<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrencyTableSeeder extends Seeder {
  /**
   * Run the database seeds.
   */
  public function run(): void {

    Currency::create([
      'country_name'  => [
        'ar' => 'الكويت',
        'en' => 'Kuwait',
      ],
      'name'          => [
        'ar' => 'دينار كويتي',
        'en' => 'Kuwaiti Dinar',
      ],
      'code'          => 'KWD',
      'country_flag'  => 'Kuwaiti.png',
      'selling_price' => 1,
      'buying_price'  => 1,
      'is_available'  => true,
      'is_default'    => true,
    ]);

    Currency::create([
      'country_name'  => [
        'ar' => 'السعوديه',
        'en' => 'Saudi Arabia',
      ],
      'name'          => [
        'ar' => 'ريال سعودي',
        'en' => 'Saudi Riyal',
      ],
      'code'          => 'RS',
      'country_flag'  => 'saudi.png',
      'selling_price' => 3.2314,
      'buying_price'  => 3.2314,
      'is_available'  => true,
      'is_default'    => false,
    ]);

    Currency::create([
      'country_name'  => [
        'ar' => 'الولايات المتحدة الامريكية',
        'en' => 'USA',
      ],
      'name'          => [
        'ar' => 'دولار امريكي',
        'en' => 'USA Dollar',
      ],
      'code'          => 'usa',
      'country_flag'  => 'usa.png',
      'selling_price' => 4.2314,
      'buying_price'  => 4.2314,
      'is_available'  => true,
      'is_default'    => false,

    ]);

    Currency::create([
      'country_name'  => [
        'ar' => 'الاتحاد الاوربى',
        'en' => 'EUR',
      ],
      'name'          => [
        'ar' => 'يورو',
        'en' => 'EUR',
      ],
      'code'          => 'eur',
      'country_flag'  => 'eur.png',
      'selling_price' => 5.2314,
      'buying_price'  => 5.2314,
      'is_available'  => true,
      'is_default'    => false,

    ]);

    Currency::create([
      'country_name'  => [
        'ar' => 'سويسرا',
        'en' => 'Swiss',
      ],
      'name'          => [
        'ar' => 'فرنك سويسرى',
        'en' => 'Swiss Franc',
      ],
      'code'          => 'swiss',
      'country_flag'  => '.png',
      'selling_price' => 2.2314,
      'buying_price'  => 2.2314,
      'is_available'  => true,
      'is_default'    => false,

    ]);

    Currency::create([
      'country_name'  => [
        'ar' => 'الامارات',
        'en' => 'UAE',
      ],
      'name'          => [
        'ar' => 'درهم اماراتى',
        'en' => 'UAE Dirham',
      ],
      'code'          => 'UAE',
      'country_flag'  => 'uae.png',
      'selling_price' => 1.2314,
      'buying_price'  => 1.2314,
      'is_available'  => true,
      'is_default'    => false,

    ]);

  }
}
