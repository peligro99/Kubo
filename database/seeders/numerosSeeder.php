<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class numerosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('numeroswth')->insert([
            [
                'number' => '+573147324584',
                'status' => 'Active'
                
            ],
            [
                'number' => '+573147334584',
                'status' => ''
                
            ],
            [
                'number' => '+573144824584',
                'status' => 'Active'
                
            ],
            [
                'number' => '+573147345584',
                'status' => 'No exist'
                
            ],
            [
                'number' => '+573108724584',
                'status' => ''
                
            ],
            
        ]);
    }
}
