<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $event = new Event();
        $event->id = 1;
        $event->name = 'Festival Kebudayaan';
        $event->description = 'Festival kebudayaan adalah sebuah perayaan yang menampilkan kekayaan tradisi, seni, dan warisan budaya suatu komunitas atau bangsa melalui berbagai kegiatan seperti pertunjukan tari, musik, pameran seni, kuliner khas, dan berbagai upacara adat, dengan tujuan mempererat rasa kebersamaan dan melestarikan nilai-nilai budaya bagi generasi mendatang.';
        $event->start_date =
            $event->role = "super_admin";
        $event->save();
    }
}
