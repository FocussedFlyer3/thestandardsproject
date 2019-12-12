<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
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
        DB::table('tasks')->truncate();

        //  insert mock scores  
        DB::table('tasks')->insert(array(
            array(
                'name' => 'Math is fun',
                'details' => '<insert module details here>',
                'url' => '/video',
                'module_id' => 1
            ),
            array(
                'name' => 'Space Math',
                'details' => '<insert module details here>',
                'url' => 'localhost',
                'module_id' => 2
            ),
            array(
                'name' => 'Pizza Slicer',
                'details' => '<insert module details here>',
                'url' => '/game',
                'module_id' => 1
            )
        ));
    }
}
