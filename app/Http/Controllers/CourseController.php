<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Inscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Clock\Clock;
use Illuminate\Support\Str;
use PHPUnit\Framework\Constraint\Count;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener el ID del usuario autenticado
        $userId = Auth::id();

        // Obtener los IDs de los cursos en los que el usuario está inscrito
        $courseIds = Inscription::where('user_id', $userId)->pluck('course_id');

        // Obtener los cursos correspondientes a los IDs obtenidos
        $courses = Course::whereIn('id', $courseIds)->get();

        return view('course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('course.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $course = new Course();
        $course->name = $request->get('name');
        $course->description = $request->get('description');

        $course->code = $this->generateCode();

        $course->save();

        return redirect('/courses');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $code)
    {
        $userId = Auth::id();
        $courseIds = Inscription::where('user_id', $userId)->pluck('course_id');
        $myCourses = Course::whereIn('id', $courseIds)->get();

        $course = Course::where('code', $code)->firstOrFail();
        $posts = $course->posts;
        $tasks = $course->tasks;

        return view('course.show', compact('course', 'posts', 'tasks', 'myCourses'));
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

    public function generateCode()
    {
        do {
            $code = Str::random(6);
        } while ($this->codeExists($code));

        return $code;
    }

    public function codeExists(string $code)
    {
        return Course::where('code', $code)->exists();
    }
}
