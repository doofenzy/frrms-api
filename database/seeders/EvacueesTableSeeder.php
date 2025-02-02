<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EvacueesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('evacuees')->insert([
            'head_family' => 'John Doe',
            'infant' => 1,
            'toddlers' => 2,
            'preschool' => 1,
            'school_age' => 2,
            'teen_age' => 1,
            'adult' => 2,
            'senior_citizen' => 1,
            'total_persons' => 10,
            'lactating_mothers' => 1,
            'pregnant' => 1,
            'pwd' => 1,
            'solo_parent' => 1,
            'evacuation_center_id' => null,
            'calamity_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('evacuees')->insert([
            'head_family' => 'Jane Doe',
            'infant' => 0,
            'toddlers' => 1,
            'preschool' => 1,
            'school_age' => 3,
            'teen_age' => 2,
            'adult' => 2,
            'senior_citizen' => 0,
            'total_persons' => 9,
            'lactating_mothers' => 0,
            'pregnant' => 0,
            'pwd' => 0,
            'solo_parent' => 0,
            'evacuation_center_id' => null,
            'calamity_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('evacuees')->insert([
            'head_family' => 'Alice Smith',
            'infant' => 1,
            'toddlers' => 1,
            'preschool' => 0,
            'school_age' => 2,
            'teen_age' => 1,
            'adult' => 2,
            'senior_citizen' => 1,
            'total_persons' => 8,
            'lactating_mothers' => 1,
            'pregnant' => 1,
            'pwd' => 0,
            'solo_parent' => 1,
            'evacuation_center_id' => null,
            'calamity_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('evacuees')->insert([
            'head_family' => 'Bob Johnson',
            'infant' => 0,
            'toddlers' => 2,
            'preschool' => 1,
            'school_age' => 1,
            'teen_age' => 2,
            'adult' => 2,
            'senior_citizen' => 0,
            'total_persons' => 8,
            'lactating_mothers' => 0,
            'pregnant' => 0,
            'pwd' => 1,
            'solo_parent' => 0,
            'evacuation_center_id' => null,
            'calamity_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('evacuees')->insert([
            'head_family' => 'Charlie Brown',
            'infant' => 1,
            'toddlers' => 1,
            'preschool' => 1,
            'school_age' => 2,
            'teen_age' => 1,
            'adult' => 2,
            'senior_citizen' => 1,
            'total_persons' => 9,
            'lactating_mothers' => 1,
            'pregnant' => 0,
            'pwd' => 0,
            'solo_parent' => 1,
            'evacuation_center_id' => null,
            'calamity_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Add more records as needed to reach 30
        DB::table('evacuees')->insert([
            'head_family' => 'David Clark',
            'infant' => 1,
            'toddlers' => 1,
            'preschool' => 1,
            'school_age' => 2,
            'teen_age' => 1,
            'adult' => 2,
            'senior_citizen' => 1,
            'total_persons' => 9,
            'lactating_mothers' => 1,
            'pregnant' => 0,
            'pwd' => 0,
            'solo_parent' => 1,
            'evacuation_center_id' => null,
            'calamity_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('evacuees')->insert([
            'head_family' => 'Rick Jayson',
            'infant' => 2,
            'toddlers' => 1,
            'preschool' => 1,
            'school_age' => 2,
            'teen_age' => 1,
            'adult' => 2,
            'senior_citizen' => 1,
            'total_persons' => 10,
            'lactating_mothers' => 1,
            'pregnant' => 0,
            'pwd' => 0,
            'solo_parent' => 1,
            'evacuation_center_id' => null,
            'calamity_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('evacuees')->insert([
            'head_family' => 'Jerome Brown',
            'infant' => 2,
            'toddlers' => 1,
            'preschool' => 1,
            'school_age' => 2,
            'teen_age' => 1,
            'adult' => 2,
            'senior_citizen' => 1,
            'total_persons' => 9,
            'lactating_mothers' => 1,
            'pregnant' => 0,
            'pwd' => 1,
            'solo_parent' => 1,
            'evacuation_center_id' => null,
            'calamity_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('evacuees')->insert([
            'head_family' => 'Christian Reyes',
            'infant' => 1,
            'toddlers' => 1,
            'preschool' => 0,
            'school_age' => 3,
            'teen_age' => 1,
            'adult' => 3,
            'senior_citizen' => 1,
            'total_persons' => 10,
            'lactating_mothers' => 1,
            'pregnant' => 0,
            'pwd' => 0,
            'solo_parent' => 1,
            'evacuation_center_id' => null,
            'calamity_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
