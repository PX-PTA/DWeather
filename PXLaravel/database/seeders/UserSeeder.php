<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "Admin",
            'email' => "admin@admin.com",
            'password' => Hash::make('admin'),
        ]);
        DB::table('devices')->insert([
            'name' => "Wemos D1 Pro",
            'desc' => "Wemos D1 Pro",
            'is_active' => true,
            'is_online' => true,
            'last_online' => Carbon::now(),
        ]);
        DB::table('sensors')->insert([
            'name' => "Anemometer",
            'desc' => "Sensor Angin",
            'type' => "angin",
            'is_active' => true,
            'is_online' => true,
            'device_id' => 1,
        ]);
        DB::table('sensors')->insert([
            'name' => "BME180",
            'desc' => "Sensor Suhu, Humidity",
            'type' => "kelembapan",
            'is_active' => true,
            'is_online' => true,
            'device_id' => 1,
        ]);
        DB::table('sensors')->insert([
            'name' => "DSB28T18",
            'desc' => "Sensor Suhu",
            'type' => "suhu",
            'is_active' => true,
            'is_online' => true,
            'device_id' => 1,
        ]);
    }
}
