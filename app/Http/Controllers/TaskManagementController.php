<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Mail\TaskCompletedMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class TaskManagementController extends Controller
{
    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:150'],
            'status' => ['required', Rule::in(['pending', 'done'])],
            'task_date' => ['required', 'date'],
        ]);

        Task::create($data);

        return redirect()->route('tasks')
            ->with('success', 'Task added successfully.');
    }

    public function edit(Task $task)
    {
        abort_if($task->is_archived, 404);

        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        abort_if($task->is_archived, 404);

        $data = $request->validate([
            'title' => ['required', 'string', 'max:150'],
            'status' => ['required', Rule::in(['pending', 'done'])],
            'task_date' => ['required', 'date'],
        ]);

        $sendNotification = false;

        DB::transaction(function () use ($task, $data, &$sendNotification) {
            $lockedTask = Task::whereKey($task->id)
                ->lockForUpdate()
                ->firstOrFail();

            abort_if($lockedTask->is_archived, 404);

            $sendNotification =
                $lockedTask->status !== 'done'
                && $data['status'] === 'done';

            $lockedTask->update($data);
        });

        if ($sendNotification) {
            Mail::to(config('mail.task_recipient'))
                ->send(new TaskCompletedMail($task->fresh()));
        }

        return redirect()->route('tasks')
            ->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $task->update(['is_archived' => true]);

        return redirect()->route('tasks')
            ->with('success', 'Task archived successfully.');
    }
}
