<?php

use Illuminate\Database\Seeder;

class TopUpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        date_default_timezone_set('Asia/Dhaka');
        $date = date("Y-m-d H:i:s", strtotime("yesterday"));

        for ($i = 0; $i < 200000; $i++) {
            $data[] = [

                'amount' => rand(50,200),
                'phone' => $faker->phoneNumber,
                'user_id' => rand(1,500),
                'created_at' =>  $date,
                'updated_at' => $date,
            ];
        }

        $chunks = array_chunk($data, 5000);
        foreach ($chunks as $data) {
            App\TopUp::insert($data);
        }

    }
}
