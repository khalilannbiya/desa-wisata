<?php

namespace Database\Seeders;

use App\Models\Event;
use Faker\Factory;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();

        $imagePath = $faker->image('public/storage/gallery');
        $relativePath = str_replace('public/storage/', '', $imagePath);

        $eventData = [
            [
                'id' => 3,
                'admin_id' => 2,
                'image_url' => $relativePath,
                'name' => 'Festival Kebudayaan 1',
                'description' => 'Perayaan tradisi dan seni dari berbagai daerah.',
                'location' => 'Istana Kepresidenan',
                'gmaps_url' => 'https://maps.app.goo.gl/eDowv9N59yPRozto6',
                'start_date' => '2025-06-28 09:00:00',
                'end_date' => '2025-06-28 17:00:00',
                'slug' => 'festival-kebudayaan-1-' . Str::ulid(),
            ],
            [
                'id' => 4,
                'admin_id' => 2,
                'image_url' => $relativePath,
                'name' => 'Pesta Rakyat 2',
                'description' => 'Acara rakyat dengan berbagai hiburan dan kuliner lokal.',
                'location' => 'Lapangan Merdeka',
                'gmaps_url' => 'https://maps.app.goo.gl/someurl1',
                'start_date' => '2025-07-01 10:00:00',
                'end_date' => '2025-07-01 18:00:00',
                'slug' => 'pesta-rakyat-2-' . Str::ulid(),
            ],
            [
                'id' => 5,
                'admin_id' => 2,
                'image_url' => $relativePath,
                'name' => 'Konser Musik Tradisional 3',
                'description' => 'Konser yang menampilkan musik tradisional dari berbagai daerah.',
                'location' => 'Gedung Kesenian Jakarta',
                'gmaps_url' => 'https://maps.app.goo.gl/someurl2',
                'start_date' => '2025-07-05 19:00:00',
                'end_date' => '2025-07-05 22:00:00',
                'slug' => 'konser-musik-tradisional-3-' . Str::ulid(),
            ],
            [
                'id' => 6,
                'admin_id' => 2,
                'image_url' => $relativePath,
                'name' => 'Pameran Seni Rupa 4',
                'description' => 'Pameran seni rupa kontemporer dari seniman lokal.',
                'location' => 'Galeri Nasional',
                'gmaps_url' => 'https://maps.app.goo.gl/someurl3',
                'start_date' => '2025-07-10 09:00:00',
                'end_date' => '2025-07-10 17:00:00',
                'slug' => 'pameran-seni-rupa-4-' . Str::ulid(),
            ],
            [
                'id' => 7,
                'admin_id' => 2,
                'image_url' => $relativePath,
                'name' => 'Festival Film Indie 5',
                'description' => 'Pemutaran film-film independen dengan tema budaya.',
                'location' => 'Bioskop XXI',
                'gmaps_url' => 'https://maps.app.goo.gl/someurl4',
                'start_date' => '2025-07-15 18:00:00',
                'end_date' => '2025-07-15 22:00:00',
                'slug' => 'festival-film-indie-5-' . Str::ulid(),
            ],
            [
                'id' => 8,
                'admin_id' => 2,
                'image_url' => $relativePath,
                'name' => 'Festival Tari Tradisional 6',
                'description' => 'Pertunjukan tari tradisional dari berbagai daerah.',
                'location' => 'Taman Ismail Marzuki',
                'gmaps_url' => 'https://maps.app.goo.gl/someurl5',
                'start_date' => '2025-07-20 10:00:00',
                'end_date' => '2025-07-20 18:00:00',
                'slug' => 'festival-tari-tradisional-6-' . Str::ulid(),
            ],
            [
                'id' => 9,
                'admin_id' => 2,
                'image_url' => $relativePath,
                'name' => 'Bazaar Kuliner Nusantara 7',
                'description' => 'Bazaar yang menjual berbagai kuliner khas nusantara.',
                'location' => 'Lapangan Banteng',
                'gmaps_url' => 'https://maps.app.goo.gl/someurl6',
                'start_date' => '2025-07-25 09:00:00',
                'end_date' => '2025-07-25 21:00:00',
                'slug' => 'bazaar-kuliner-nusantara-7-' . Str::ulid(),
            ],
            [
                'id' => 10,
                'admin_id' => 2,
                'image_url' => $relativePath,
                'name' => 'Festival Wayang 8',
                'description' => 'Pertunjukan wayang kulit dan wayang golek.',
                'location' => 'Museum Wayang',
                'gmaps_url' => 'https://maps.app.goo.gl/someurl7',
                'start_date' => '2025-07-30 18:00:00',
                'end_date' => '2025-07-30 22:00:00',
                'slug' => 'festival-wayang-8-' . Str::ulid(),
            ],
            [
                'id' => 11,
                'admin_id' => 2,
                'image_url' => $relativePath,
                'name' => 'Festival Batik 9',
                'description' => 'Pameran dan workshop batik tradisional.',
                'location' => 'Gedung Sate',
                'gmaps_url' => 'https://maps.app.goo.gl/someurl8',
                'start_date' => '2025-08-05 09:00:00',
                'end_date' => '2025-08-05 17:00:00',
                'slug' => 'festival-batik-9-' . Str::ulid(),
            ],
            [
                'id' => 12,
                'admin_id' => 2,
                'image_url' => $relativePath,
                'name' => 'Festival Budaya Tionghoa 10',
                'description' => 'Perayaan budaya Tionghoa dengan berbagai kegiatan menarik.',
                'location' => 'Pecinan Jakarta',
                'gmaps_url' => 'https://maps.app.goo.gl/someurl9',
                'start_date' => '2025-08-10 10:00:00',
                'end_date' => '2025-08-10 20:00:00',
                'slug' => 'festival-budaya-tionghoa-10-' . Str::ulid(),
            ]
        ];

        foreach ($eventData as $data) {
            $event = new Event();
            $event->id = $data['id'];
            $event->admin_id = $data['admin_id'];
            $event->image_url = $data['image_url'];
            $event->name = $data['name'];
            $event->description = $data['description'];
            $event->location = $data['location'];
            $event->gmaps_url = $data['gmaps_url'];
            $event->start_date = $data['start_date'];
            $event->end_date = $data['end_date'];
            $event->slug = $data['slug'];
            $event->save();
        }
    }
}
