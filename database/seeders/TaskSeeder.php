<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        $today = Carbon::today();

        $tasks = [
            ['title' => 'Check emails', 'status' => 'done', 'task_date' => $today],
            ['title' => 'Finish school activity', 'status' => 'pending', 'task_date' => $today],
            ['title' => 'Review Laravel lessons', 'status' => 'pending', 'task_date' => $today],
            ['title' => 'Update project files', 'status' => 'done', 'task_date' => $today],
            ['title' => 'Prepare documentation', 'status' => 'pending', 'task_date' => $today->copy()->addDay()],
            ['title' => 'Upload project to GitHub', 'status' => 'pending', 'task_date' => $today->copy()->addDay()],
            ['title' => 'Organize notes', 'status' => 'done', 'task_date' => $today->copy()->subDay()],
            ['title' => 'Plan next activities', 'status' => 'pending', 'task_date' => $today->copy()->subDay()],
        ];

        foreach ($tasks as $task) {
            Task::create($task);
        }
    }
}
