<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'created_at' => \Carbon\Carbon::now(),
                'username' => 'Igor',
                'image' => '',
                'first_name' => 'Igor',
                'last_name' => 'Vujkovic',
                'role' => 'admin',
                'email' => 'igorvujkovic@gmail.com',
                'password' => bcrypt('admin123'),
                'status' => '1',
                'phone' => '9866567794',
                'address' => 'Karaburma',
                'gender' => 'male',
                'dob' => '2019-03-12',
                'join_date' => '2019-03-12',
                'job_type' => 'Programer',
                'city' => 'Beograd',
                'age' => '35',
                'job_id' => 1
            ],
        ]);
    }
}
