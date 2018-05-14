<?php

use Illuminate\Database\Seeder;

class SlidesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('slides')->insert([
            'title' => 'Главный слайдер 1',
            'image' => 'public/uploads/20150912_130003_378.jpg',
            'type' => 'slide',
            'link' => '/catalog/kuhnya/oborudovanie-2'
        ]);
        DB::table('slides')->insert([
            'title' => 'Главный слайдер 2',
            'image' => 'public/uploads/20150912_130012_742.jpg',
            'type' => 'slide',
            'link' => '/catalog/zal/inventar-i-aksessuary-3'
        ]);
        DB::table('slides')->insert([
            'title' => 'Главный слайдер 3',
            'image' => 'public/uploads/20150912_130021_259.jpg',
            'type' => 'slide',
            'link' => '/catalog/inventar-i-aksessuary/pitchery'
        ]);
    }
}
