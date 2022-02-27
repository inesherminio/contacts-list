<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ContactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(range(0,100) as $index) {
            DB::table('contacts')->insert([
                'name' => Str::random(10),
                'email' => Str::random(10).'@gmail.com',
                'contact' => Str::random(10),
                'country' => Str::random(10),
            ]);
        }
    }
}
