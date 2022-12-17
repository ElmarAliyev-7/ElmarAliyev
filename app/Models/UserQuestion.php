<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserQuestion extends Model
{
    use HasFactory;

    protected $fillable=[
      'user_id',
      'question_id',
    ];

    public function users()
    {
        return $this->belongsToMany('user_id',User::class);
    }

    public function questions()
    {
        return $this->belongsToMany('question_id', Question::class);
    }
}
