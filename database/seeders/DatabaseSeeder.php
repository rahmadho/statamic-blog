<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use TruncateTable;
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->disableForeignKey();
        $this->truncate(['users','projects', 'tasks']);

        User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com'
        ]);
        User::factory(5)->create();
        Project::factory()->has(Task::factory()->count(8))->count(10)->create();

        $this->disableForeignKey();
    }
}
