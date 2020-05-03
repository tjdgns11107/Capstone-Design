<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Order::create([
            'buy_user' => 1,
            'product_id' => 1,
            'order_date' => '2020-05-01',
            'send_user' => 'user1',
            'send_address' => '경상북도',
            'payment' => 0,
        ]);

        \App\Order::create([
            'buy_user' => 2,
            'product_id' => 1,
            'order_date' => '2020-05-02',
            'send_user' => '사용자2',
            'send_address' => '대구광역시',
            'payment' => 0,
        ]);
    }
}
