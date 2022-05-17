<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name" => "Hein Htet Zan",
            "email" => "hhz@gmail.com",
            "password" => Hash::make('asdffdsa')
        ]);

        User::create([
            "name" => "Kyaw Kyaw",
            "email" => "kk@gmail.com",
            "password" => Hash::make('asdffdsa')
        ]);

        User::create([
            "name" => "Su Su",
            "email" => "ss@gmail.com",
            "password" => Hash::make('asdffdsa')
        ]);

         \App\Models\User::factory(10)->create();

         Contact::factory(200)->create();
    }
}
