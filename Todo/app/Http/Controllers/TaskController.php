<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function create (Request $request)
    {
        $user = new Task();
        $user->title = $request->input('title');
        $user->desc = $request->input('desc');
        $user->save();

        return response()->json($user);
    }

    public function read ()
    {
        $user = Task::all();

        return response()->json($user);
    }

    public function update (Request $request , Task $tasks)
    {
        $tasks->update($request->all());
        return response()->json($tasks);
    }

    public function delete (Task $tasks)
    {
        $tasks->delete();
        $user = Task::all();
        return response()->json($user);
    }

    public function deleteall (Task $tasks)
    {
        Task::truncate();
    }
}
