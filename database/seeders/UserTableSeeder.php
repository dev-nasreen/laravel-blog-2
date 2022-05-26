<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=> 'Nasreen Akter',
            'email'=>'nasreen@gmail.com',
            'password'=>bcrypt('12345678'),
            'description'=>'The About Us page of your website is an essential source of information for all who want to know more about your business.

            About Us pages are where you showcase your history, what is unique about your work, your company’s values, and who you serve.
            
            The design, written content, and visual or video elements together tell an important story about who you are and why you do it.'
        ]);
    }
}
