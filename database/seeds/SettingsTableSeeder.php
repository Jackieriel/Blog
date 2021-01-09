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
        $settings = App\Models\Setting::create([
            'site_name' => 'DevJackieriel',
            'address' => 'Liverpool Road, Eket',
            'contact_number' => '+2348131327382',
            'contact_email' => 'info@jackieriel.com'
        ]);
    }
}
