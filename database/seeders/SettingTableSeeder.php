<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;
class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Setting::create([
        'name'=> 'example.com',
        'copyright'=>'nasreen@gmail.com',
        'site_logo'=>'',
        'description'=>'',
        'facebook'=>'',
        'twitter'=>'',
        'instagram'=>'',
        'reddit'=>'',
        'email'=>'',
        'phone'=>'',
        'address'=>'',
    ]);
    }
}
