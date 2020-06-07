<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CreateUserAdminSeeder::class);
        $this->call(CreateCategoriesSeeder::class);
        $this->call(CreateTasksSeeder::class);
    }
}
