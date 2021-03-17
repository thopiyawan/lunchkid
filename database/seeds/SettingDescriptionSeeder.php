<?php

use App\SettingDescription;
use Illuminate\Database\Seeder;

class SettingDescriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $csv = array_map('str_getcsv', file('database/seeds/database/food_restriction_code.csv'));
        foreach ($csv as $key => $item) {
            $setting = new SettingDescription();
            $setting->setting_id = $item[1];
            $setting->setting_description_english = $item[2];
            $setting->setting_description_thai = $item[3];
            $setting->setting_property_name = $item[4];
            $setting->save();
        }
        
    }
}
