<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([
            'site_name'=>'Laravel`s Blog',
            'contact_number'=>'03025488955',
            'contact_email'=>'info@gmail.com',
            'address'=>'Daska,Pakistan'
        ]);
    }
}
