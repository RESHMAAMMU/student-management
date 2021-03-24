<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StaffTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teacher_list')->insert([
            [
                'name'=>'Doel',
                'created_at' => now(),
                'updated_at' => now()
            
            ],
            [
                'name'=>'Harry',
                'created_at' => now(),
                'updated_at' => now()
            
            ],
            [
                'name'=>'Preetha',
                'created_at' => now(),
                'updated_at' => now()
            
            ],
            [
                'name'=>'Divya',
                'created_at' => now(),
                'updated_at' => now()
            
            ],
          
        ]);
    }
}
