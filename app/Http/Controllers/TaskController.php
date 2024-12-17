<?php

namespace App\Http\Controllers;

use App\Events\NewRegistrationEvent;
use App\Events\TaskCreated;
use App\Events\TaskCreateEvent;
use App\Jobs\SendTaskCreatedEmail;
use App\Models\Task;
use Exception;
use Illuminate\Container\Attributes\DB;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = auth()->user()->task;
        return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required'
        ]);

        try {
            $task = auth()->user()->task()->create([
                'title' => $request->title,
                'description' => $request->description
            ]);

            event(new TaskCreateEvent($task));

            return redirect('/tasks');
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string', // Allow nullable description
        ]);

        if (isset($request->title)) {
            $task->update([
                'title' => $request->title,
            ]);
        }

        if (isset($request->description)) {
            $task->update([
                'description' => $request->description,
            ]);
        }



        return redirect()->back()->with('success', 'Task updated successfully!');
    }

    public function toggleStatus(Request $request)
    {
        try {
            Task::where(['id' => $request->id])->update(['completed' => true]);
            return redirect()->route('tasks');
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function destroy(Request $request)
    {
        try {
            Task::where(['id' => $request->id])->delete();
            return redirect()->route('tasks');
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function bulkAction(Request $request)
    {
        $request->validate([
            'task_ids' => 'required',
        ]);

        if (isset($request->action) && $request->action == 'delete') {
            try {
                foreach ($request->task_ids as $id) {
                    Task::where(['id' => $id])->delete();
                }
                return redirect()->route('tasks');
            } catch (Exception $e) {
                dd($e);
            }
        } elseif (isset($request->action) && $request->action == 'mark_done') {
            try {
                foreach ($request->task_ids as $id) {
                    Task::where(['id' => $id])->update(['completed' => true]);
                }
                return redirect()->route('tasks');
            } catch (Exception $e) {
                dd($e);
            }
        } else {
            return redirect()->route('tasks');
        }
    }
}
