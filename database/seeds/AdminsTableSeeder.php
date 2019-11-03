<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'created_at' => \Carbon\Carbon::now(),
            'username' => 'dzigi',
            'image' => '',
            'first_name' => 'Igor',
            'last_name' => 'Vujkovic',
            'email' => 'igorvujkovic@gmail.com',
            'password' => bcrypt('admin123'),
            'status' => '1'
        ]);
    }
}
