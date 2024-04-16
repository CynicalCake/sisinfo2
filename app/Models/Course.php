<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Course extends Model
{
    use HasFactory;

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function inscriptions()
    {
        return $this->hasMany(Inscription::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'inscriptions');
    }

    public function enrollUser()
    {
        $inscription = new Inscription();
        $inscription->course_id = $this->id;
        $inscription->user_id = Auth::id();
        $inscription->save();
    }
}
