<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Submission;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class SubmissionController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('submission-file')) {
            $file = $request->file('submission-file');
            $fileName = $file->getClientOriginalName().' - '.Auth::id();
            $file->storeAs('public/sumbissions', $fileName);
        }

        $sumbission = new Submission();

        $sumbission->user_id = Auth::id();
        $sumbission->task_id = $request->get('task-id');
        $sumbission->comment = $request->get('comment');
        $sumbission->submitted_at = Carbon::now();
        $sumbission->file_path = $fileName ?? null;

        $sumbission->save();

        $task = Task::find($request->get('task-id'));

        $course = Course::find($task->course_id);

        return redirect('/tasks/'.$task->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
