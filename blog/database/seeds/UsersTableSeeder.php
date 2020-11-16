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
        $user=App\User::create([
            'name'=>'usman',
            'email'=>'usmanabbas2211@gmail.com',
            'password'=>bcrypt('password'),
            'admin'=>1
        ]);
        App\Profile::create([
            'user_id'=>$user->id,
            'avatar'=>'uploads/baby2.jpg',
            'about'=>'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusamus, voluptas eius perferendis quis tenetur sequi quo veritatis porro fugiat dolor, minus labore non! ',
            'facebook'=>'facebook.com',
            'youtube'=>'youtube.com',
        ]);
    }
}
