<?php

use Illuminate\Database\Seeder;

class ModulesTableSeeder extends Seeder
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
        DB::table('modules')->truncate();

        //  insert modules/targets 
        DB::table('modules')->insert(array(
            array(
                'subject' => 'Math',
                'grade' => 5,
                'name' => 'A',
                'description' => 'Apply mathematics to solve well-posed problems in pure mathematics and arising in everyday life, society and the workplace.'
            ),
            array(
                'subject' => 'Math',
                'grade' => 5,
                'name' => 'B',
                'description' => 'Select and use appropriate tools strategically.'
            ),
            array(
                'subject' => 'Math',
                'grade' => 5,
                'name' => 'C',
                'description' => 'Interpret results in the context of a situation.'
            ),
            array(
                'subject' => 'Math',
                'grade' => 5,
                'name' => 'D',
                'description' => 'Identify important quantities in a practical situation and map their relationship.'
            )
        ));
    }
}
