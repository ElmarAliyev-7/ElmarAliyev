<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable= [
      'name',
      'link',
      'task_id',
    ];

    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id', 'id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_questions');
    }
}
