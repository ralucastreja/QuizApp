<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'number'];

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }
}
