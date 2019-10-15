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
                'url' => 'localhost',
            ),
            array(
                'name' => 'Space Math',
                'url' => 'localhost',
            )
        ));
    }
}
