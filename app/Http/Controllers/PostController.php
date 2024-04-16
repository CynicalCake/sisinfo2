<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
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
        $post = new Post();

        $post->title = $request->get('post-title');
        $post->description = $request->get('post-description');
        $post->course_id = $request->get('course-id');
        $post->user_id = Auth::id();

        $post->save();

        return redirect('/courses/'.$request->get('course-code'));
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
        $post = Post::findOrFail($id);
    
        // Verificar si el usuario actual tiene permiso para editar este post
        if ($post->user_id != Auth::id()) {
        // Redirigir al usuario a alguna página de error o mostrar un mensaje de error
        return redirect()->back()->with('error', 'No tiene permiso para editar este post.');
        }
    
        // Retornar la vista de edición con los datos del post
        return view('post.edit', compact('post'));
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
