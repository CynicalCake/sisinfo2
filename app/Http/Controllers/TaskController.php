<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Submission;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $courseCode)
    {
        return view('task.create', ['courseCode' => $courseCode]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $course = Course::where('code', $request->get('course-code'))->first();

        $task = new Task();

        $task->user_id = Auth::id();
        $task->course_id = $course->id;
        $task->title = $request->get('task-title');
        $task->description = $request->get('task-description');
        $task->deadline = $request->get('task-deadline');
        $task->score = $request->get('task-score');

        $task->save();

        return redirect('/courses/'.$request->get('course-code'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::find($id);

        $user = Auth::user();

        $existingSubmission = Submission::where('task_id', $id)
                                        ->where('user_id', $user->id)
                                        ->exists();

        return view('task.show', compact('task', 'existingSubmission'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::findOrFail($id);

        return view('task.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $task = Task::find($id);

        $task->title = $request->get('task-title');
        $task->description = $request->get('task-description');
        $task->deadline = $request->get('task-deadline');
        $task->score = $request->get('task-score');

        $task->save();

        $course = Course::find($request->get('course-id'));

        return redirect('/courses/'.$course->code);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
