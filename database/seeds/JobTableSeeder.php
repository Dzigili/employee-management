<?php

use Illuminate\Database\Seeder;

class JobTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jobs')->insert(
            [
                [
                    'created_at' => \Carbon\Carbon::now(),
                    'name' => 'Konobar',
                    'description' => 'Konobar description',
                ],
                [
                    'created_at' => \Carbon\Carbon::now(),
                    'name' => 'Kuvar',
                    'description' => 'Kuvar description',
                ],
                [
                    'created_at' => \Carbon\Carbon::now(),
                    'name' => 'Pomocni radnik',
                    'description' => 'Pomocni radnik description',
                ],
            ]
        );
    }
}
