<?php

namespace Database\Seeders;

use App\Models\UserType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserType::create([
            'type'=>'gold',
            'discount'=>0.20
        ]);
        UserType::create([
            'type'=>'normal',
            'discount'=>0.0
        ]);
        UserType::create([
            'type'=>'silver',
            'discount'=>0.10
        ]);
    }
}
