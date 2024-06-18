<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->id = 1;
        $user->name = 'Syeich Khalil Annbiya';
        $user->email = 'syeichkhalil@gmail.com';
        $user->role = "super_admin";
        $user->password = Hash::make('Rahasia123#');
        $user->save();

        $user = new User();
        $user->id = 2;
        $user->name = 'Slamet Septiawan';
        $user->email = 'slametseptiawan@gmail.com';
        $user->role = "admin";
        $user->password = Hash::make('Rahasia123#');
        $user->save();

        $user = new User();
        $user->id = 3;
        $user->name = 'Ramdhan Nassyirah';
        $user->email = 'ramdhannassyirah@gmail.com';
        $user->role = "owner";
        $user->password = Hash::make('Rahasia123#');
        $user->save();

        $user = new User();
        $user->id = 4;
        $user->name = 'Annisa Putri';
        $user->email = 'annisaputri@gmail.com';
        $user->role = "writer";
        $user->password = Hash::make('Rahasia123#');
        $user->save();

        $user = new User();
        $user->id = 5;
        $user->name = 'Khalil Annbiya';
        $user->email = 'khalilannbiya@gmail.com';
        $user->role = "owner";
        $user->password = Hash::make('Rahasia123#');
        $user->save();
    }
}
