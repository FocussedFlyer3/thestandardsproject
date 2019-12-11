
<?php

use App\User;
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
        // resets tables
        DB::statement('SET FOREIGN_KEY_CHECKS=0');  
        DB::table('users')->truncate();

        //  insert mock teachers  
        User::create(array(
        'name'     => 'John Beck',
        'username' => 'teacherone',
        'email'    => 'johnbeck@email.com',
        'password' => Hash::make('asdqwe'),
        'role' => 1,
        'api_token' => str_random(60)
        ));

        User::create(array(
        'name'     => 'Joe Biden',
        'username' => 'teachertwo',
        'email'    => 'joebiden@email.com',
        'password' => Hash::make('asdqwe'),
        'role' => 1,
        'api_token' => str_random(60)
        ));

        User::create(array(
        'name'     => 'Ralph Cohen',
        'username' => 'teacherthree',
        'email'    => 'ralphcohen@email.com',
        'password' => Hash::make('asdqwe'),
        'role' => 1,
        'api_token' => str_random(60)
        ));

        //  insert mock students
        User::create(array(
            'name'     => 'Sally Rogers',
            'username' => 'studentone',
            'email'    => 'one@email.com',
            'password' => Hash::make('asdqwe'),
            'role' => 0,
            'api_token' => str_random(60)
            ));

        User::create(array(
            'name'     => 'Burt Hagard',
            'username' => 'studenttwo',
            'email'    => 'two@email.com',
            'password' => Hash::make('asdqwe'),
            'role' => 0,
            'api_token' => str_random(60)
            ));

        User::create(array(
            'name'     => 'Josiah Nigel',
            'username' => 'studentthree',
            'email'    => 'three@email.com',
            'password' => Hash::make('asdqwe'),
            'role' => 0,
            'api_token' => str_random(60)
            ));

        User::create(array(
            'name'     => 'Shahbaz Singh',
            'username' => 'studentfour',
            'email'    => 'four@email.com',
            'password' => Hash::make('asdqwe'),
            'role' => 0,
            'api_token' => str_random(60)
            ));

        User::create(array(
            'name'     => 'Harry Styles',
            'username' => 'studentfive',
            'email'    => 'five@email.com',
            'password' => Hash::make('asdqwe'),
            'role' => 0,
            'api_token' => str_random(60)
            ));

        User::create(array(
            'name'     => 'Louis Tatum',
            'username' => 'studentsix',
            'email'    => 'six@email.com',
            'password' => Hash::make('asdqwe'),
            'role' => 0,
            'api_token' => str_random(60)
            ));

        User::create(array(
            'name'     => 'Ryan Reynolds',
            'username' => 'studentseven',
            'email'    => 'seven@email.com',
            'password' => Hash::make('asdqwe'),
            'role' => 0,
            'api_token' => str_random(60)
            ));

        User::create(array(
            'name'     => 'Ian Lampert',
            'username' => 'studenteight',
            'email'    => 'eight@email.com',
            'password' => Hash::make('asdqwe'),
            'role' => 0,
            'api_token' => str_random(60)
            ));

        User::create(array(
            'name'     => 'Alaya Hunter',
            'username' => 'studentnine',
            'email'    => 'nine@email.com',
            'password' => Hash::make('asdqwe'),
            'role' => 0,
            'api_token' => str_random(60)
            ));

        User::create(array(
            'name'     => 'Jenny Sue',
            'username' => 'studentten',
            'email'    => 'ten@email.com',
            'password' => Hash::make('asdqwe'),
            'role' => 0,
            'api_token' => str_random(60)
            ));
    }
}
