<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Faker\Factory as Faker;

class BTTH03Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //prac 1
        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            DB::table('medicines')->insert([
                'name' => $faker->word,
                'brand' => $faker->company,
                'dosage' => $faker->randomElement(['250mg', '500mg', '1000mg']),
                'form' => $faker->randomElement(['tablet', 'capsule', 'syrup']),
                'price' => $faker->randomFloat(2, 5, 100),
                'stock' => $faker->numberBetween(10, 100),
            ]);
        }

        foreach (range(1, 50) as $index) {
            DB::table('sales')->insert([
                'medicine_id' => $faker->numberBetween(1, 50),
                'quantity' => $faker->numberBetween(1, 10),
                'sale_date' => $faker->dateTime,
                'customer_phone' => $faker->phoneNumber,
            ]);
        }

        //prac 2
        foreach (range(1, 10) as $index) {
            DB::table('classes')->insert([
                'grade_level' => $faker->randomElement(['Pre-K', 'Kindergarten']),
                'room_number' => $faker->randomNumber(3),
            ]);
        }

        foreach (range(1, 50) as $index) {
            DB::table('students')->insert([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'date_of_birth' => $faker->date,
                'parent_phone' => $faker->phoneNumber,
                'class_id' => $faker->numberBetween(1, 10),
            ]);
        }

        //prac 3
        foreach (range(1, 20) as $index) {
            DB::table('computers')->insert([
                'computer_name' => $faker->word,
                'model' => $faker->word,
                'operating_system' => $faker->randomElement(['Windows', 'Linux', 'MacOS']),
                'processor' => $faker->word,
                'memory' => $faker->numberBetween(4, 64),
                'available' => $faker->boolean,
            ]);
        }

        foreach (range(1, 50) as $index) {
            DB::table('issues')->insert([
                'computer_id' => $faker->numberBetween(1, 20),
                'reported_by' => $faker->name,
                'reported_date' => $faker->dateTime,
                'description' => $faker->paragraph,
                'urgency' => $faker->randomElement(['Low', 'Medium', 'High']),
                'status' => $faker->randomElement(['Open', 'In progress', 'Resolved']),
            ]);
        }
    }
}
