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
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('libraries')->insert([
                'name' => $faker->company,
                'address' => $faker->address,
                'contact_number' => $faker->phoneNumber,
            ]);
        }

        $libraryIds = DB::table('libraries')->pluck('id')->toArray();
        for ($i = 0; $i < 50; $i++) {
            DB::table('books')->insert([
                'title' => $faker->sentence,
                'author' => $faker->name,
                'publication_year' => $faker->year,
                'genre' => $faker->randomElement(['Fiction', 'Non-Fiction', 'Programming']),
                'library_id' => $faker->randomElement($libraryIds),
            ]);
        }

        for ($i = 0; $i < 20; $i++) {
            DB::table('renters')->insert([
                'name' => $faker->name,
                'phone_number' => $faker->phoneNumber,
                'email' => $faker->unique()->safeEmail,
            ]);
        }

        $renterIds = DB::table('renters')->pluck('id')->toArray();
        for ($i = 0; $i < 50; $i++) {
            DB::table('laptops')->insert([
                'brand' => $faker->randomElement(['Dell', 'HP', 'Lenovo']),
                'model' => $faker->word,
                'specifications' => $faker->text,
                'rental_status' => $faker->boolean,
                'renter_id' => $faker->randomElement($renterIds),
            ]);
        }

        for ($i = 0; $i < 5; $i++) {
            DB::table('it_centers')->insert([
                'name' => $faker->company,
                'location' => $faker->address,
                'contact_email' => $faker->unique()->safeEmail,
            ]);
        }

        $centerIds = DB::table('it_centers')->pluck('id')->toArray();

        for ($i = 0; $i < 30; $i++) {
            DB::table('hardware_devices')->insert([
                'device_name' => $faker->word,
                'type' => $faker->randomElement(['Computer', 'Printer', 'Scanner', 'Projector']),
                'status' => $faker->boolean,
                'center_id' => $faker->randomElement($centerIds),
            ]);
        }

        for ($i = 0; $i < 5; $i++) {
            DB::table('cinemas')->insert([
                'name' => $faker->company,
                'location' => $faker->address,
                'total_seats' => $faker->numberBetween(100, 500),
            ]);
        }

        $cinemaIds = DB::table('cinemas')->pluck('id')->toArray();

        for ($i = 0; $i < 30; $i++) {
            DB::table('movies')->insert([
                'title' => $faker->sentence,
                'director' => $faker->name,
                'release_date' => $faker->date,
                'duration' => $faker->numberBetween(60, 180),
                'cinema_id' => $faker->randomElement($cinemaIds),
            ]);
        }
    }
}
