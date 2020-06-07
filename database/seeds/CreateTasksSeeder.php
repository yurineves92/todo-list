<?php

use Illuminate\Database\Seeder;

class CreateTasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Tasks::class, 900)->create();
    }
}
