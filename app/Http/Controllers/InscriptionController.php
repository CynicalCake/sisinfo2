<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Inscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inscriptions = Inscription::all();
        return view('inscription.create')->with('inscriptions', $inscriptions);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inscription.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $course = Course::where('code', $request->get('course-code'))->first();

        if (!$course) {
            return redirect('/courses');
        }

        $inscription = new Inscription();
        $inscription->course_id = $course->id;
        $inscription->user_id = Auth::id();

        $inscription->save();

        return redirect('/courses');
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
