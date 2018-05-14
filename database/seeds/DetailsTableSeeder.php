<?php

use Illuminate\Database\Seeder;

class DetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('details')->insert([
            'key' => 'sitename',
            'value' => 'motor-m.kz'
        ]);
        DB::table('details')->insert([
            'key' => 'siteaddress',
            'value' => 'г. Алматы, ул. Абая 145 (офис 21)'
        ]);
        DB::table('details')->insert([
            'key' => 'siteaddress2',
            'value' => 'Адрес'
        ]);
        DB::table('details')->insert([
            'key' => 'siteemail',
            'value' => 'jumper_w@mail.ru'
        ]);
        DB::table('details')->insert([
            'key' => 'sitephone',
            'value' => '+7 (727) <span>329 13 89</span>'
        ]);
        DB::table('details')->insert([
            'key' => 'sitephone2',
            'value' => '+7 (727) 329 13 89'
        ]);
        DB::table('details')->insert([
            'key' => 'fb',
            'value' => 'https://facebook.com/'
        ]);
        DB::table('details')->insert([
            'key' => 'vk',
            'value' => 'https://vk.com/'
        ]);
        DB::table('details')->insert([
            'key' => 'instagram',
            'value' => 'https://instagram.com/'
        ]);
        DB::table('details')->insert([
            'key' => 'map',
            'value' => 'footer-map-high-dpi.jpg'
        ]);
    }
}
