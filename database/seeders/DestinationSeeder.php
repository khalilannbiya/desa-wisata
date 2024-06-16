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
                'price_range' => $faker->numberBetween(20000, 500000),
                'status' => $faker->randomElement(['active', 'inactive']),
                'slug' => Str::slug($nameDestination . '-' . Str::ulid()),
            ]);

            for ($i = 1; $i <= 3; $i++) {
                Gallery::create([
                    'destination_id' => $destination->id,
                    'image_url' => $faker->image('public/storage/images')
                ]);
            }

            $days = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu'];

            foreach ($days as $day) {
                $isClosed = $faker->boolean();
                $open = $isClosed ? null : $faker->time('H:i:s');
                $close = $isClosed ? null : $faker->time('H:i:s');

                OpeningHour::create([
                    'destination_id' => $destination->id,
                    'day' => $day,
                    'open' => $open,
                    'close' => $close,
                    'is_closed' => $isClosed,
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

            $typeOfContacts = ['phone', 'email', 'fax', 'social_media'];

            foreach ($typeOfContacts as $type) {
                ContactDetail::create([
                    'destination_id' => $destination->id,
                    'type' => $type,
                    'value' => $faker->phoneNumber()
                ]);
            }
        }
    }
}