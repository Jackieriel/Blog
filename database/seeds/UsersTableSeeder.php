<?php

use Illuminate\Database\Seeder;
// use App\Models\Profile;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::create([
            'name' => 'Jonah Jackson',
            'email' => 'jonahjackson@jackieriel.com',
            'password' => bcrypt('password'),
            'admin' => 1
        ]);

        App\Models\Profile::create([ 
            'user_id' => $user->id,
            'avatar' =>'uploads/avatar/avater.jpg',
            'about' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        Quis rem architecto nihil voluptate perferendis laudantium ullam, 
                        harum autem commodi minima aliquid vitae. Vel voluptates earum maxime, 
                        eos culpa labore iste?',
            'twitter' => 'https://twitter.com/jackieriel',
            'facebook' => 'https://facebook.com/jackieriel',
            'youtube' => 'https://facebook.com/jackieriel'
        ]);
    }
}

