<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        if(config('database.default') !== 'sqlite') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0');
        }

        App\User::truncate();
        $this->call(UsersTableSeeder::class);

        App\Product::truncate();
        $this->call(ProductsTableSeeder::class);
        
        App\Question::truncate();
        $this->call(QuestionsTableSeeder::class);

        App\Answer::truncate();
        $this->call(AnswersTableSeeder::class);

        App\Order::truncate();
        $this->call(OrdersTableSeeder::class);

        if(config('database.default') !== 'sqlite') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1');
        }
    }
}
