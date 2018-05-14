<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'title' => 'Моторные масла',
            'slug' => str2url('Моторные масла')
        ]);
        DB::table('categories')->insert([
            'title' => 'Смазочные материалы',
            'slug' => str2url('Смазочные материалы')
        ]);
        DB::table('categories')->insert([
            'title' => 'Средства по уходу',
            'slug' => str2url('Средства по уходу')
        ]);
        DB::table('categories')->insert([
            'title' => 'Bardahl',
            'slug' => str2url('Bardahl'),
            'parent_id' => 1,
            'image' => 'public/uploads/20150914_131100_418.png'
        ]);
        DB::table('categories')->insert([
            'title' => 'Mitasu',
            'slug' => str2url('Mitasu'),
            'parent_id' => 1,
            'image' => 'public/uploads/20150914_131336_693.png'
        ]);
        DB::table('categories')->insert([
            'title' => 'Areca',
            'slug' => str2url('Areca'),
            'parent_id' => 1,
            'image' => 'public/uploads/20150914_131438_163.png'
        ]);
        DB::table('categories')->insert([
            'title' => 'Swag',
            'slug' => str2url('Swag'),
            'parent_id' => 1,
            'image' => 'public/uploads/20180212_142433_829.jpg'
        ]);
        DB::table('categories')->insert([
            'title' => 'Eurol',
            'slug' => str2url('Eurol'),
            'parent_id' => 1,
            'image' => 'public/uploads/20180212_142528_452.png'
        ]);
        DB::table('categories')->insert([
            'title' => 'Mobil',
            'slug' => str2url('Mobil'),
            'parent_id' => 1,
            'image' => 'public/uploads/20180212_142606_219.png'
        ]);
    }
}
