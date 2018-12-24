<?php

use Illuminate\Database\Seeder;

class LoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->truncate();
        DB::table('admins')->insert([
            'name' => 'Demo',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),
           
        ]);

    }
}
