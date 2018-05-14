<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(DetailsTableSeeder::class);
        $this->call(SlidesTableSeeder::class);
        DB::table('users')->insert([
            'name' => 'Админ',
            'email' => 'info@motor-m.kz',
            'password' => bcrypt('vpw4*c#w'),
        ]);
    }
}
