<?php

namespace Database\Seeders;

use App\Models\Accommodation;
use App\Models\ContactDetail;
use Faker\Factory;
use App\Models\User;
use App\Models\Destination;
use App\Models\Facility;
use App\Models\Gallery;
use App\Models\OpeningHour;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        $owners = User::where('role', 'owner')->get();

        foreach ($owners as $owner) {
            $nameDestination = $faker->city();
            $destination = Destination::create([
                'owner_id' => $owner->id,
                'name' => $nameDestination,
                'description' => $faker->paragraph(),
                'location' => $faker->address(),
                'gmaps_url' => 'https://maps.app.goo.gl/FL4CuzCR4HDZhPT59',
                'price_range' => $faker->numberBetween(20000, 500000),
                'status' => $faker->randomElement(['active', 'inactive']),
                'slug' => Str::slug($nameDestination . '-' . Str::ulid()),
            ]);

            $imagePath = $faker->image('public/storage/gallery');
            $relativePath = str_replace('public/storage/', '', $imagePath);
            Gallery::create([
                'destination_id' => $destination->id,
                'image_url' => $relativePath
            ]);


            $days = ['senin', 'selasa'];

            foreach ($days as $day) {
                OpeningHour::create([
                    'destination_id' => $destination->id,
                    'day' => $day,
                    'open' => $faker->time('H:i:s'),
                    'close' => $faker->time('H:i:s'),
                ]);
            }

            for ($i = 1; $i <= 4; $i++) {
                Facility::create([
                    'destination_id' => $destination->id,
                    'name' => $faker->sentence(2)
                ]);
            }


            for ($i = 1; $i <= 4; $i++) {
                Accommodation::create([
                    'destination_id' => $destination->id,
                    'name' => $faker->sentence(2)
                ]);
            }

            ContactDetail::create([
                'destination_id' => $destination->id,
                'phone' => '089912212192',
                'email' => $faker->email(),
                'social_media' => $faker->sentence(2)
            ]);
        }
    }
}
