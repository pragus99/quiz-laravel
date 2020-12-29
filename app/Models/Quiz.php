<?php

namespace App\Models;

use App\Models\{User,Question};
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'minutes'];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function users() 
    {
        return $this->belongsToMany(User::class, 'quiz_user');
    }

    public function hasQuizAttempted()
    {
        $attemptQuiz = [];
        $user = auth()->user()->id;
        $result = Result::where('user_id', $user)->get();
        foreach($result as $u){
            array_push($attemptQuiz, $u->quiz_id);
        }
        return $attemptQuiz;
    }
}

