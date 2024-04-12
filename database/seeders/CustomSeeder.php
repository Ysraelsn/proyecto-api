<?php


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CustomSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            DB::table('customers')->insert([
                'first_name' => 'First'.$i,
                'second_name' => 'Second'.$i,
                'surname' => 'Surname'.$i,
                'second_surname' => 'SecondSurname'.$i,
                'email' => 'email'.$i.'@example.com',
                'phone_number' => '123-456-7890',
                'age' => rand(18, 60),
                'budget' => rand(1000, 50000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
