<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        "fullname",
        "duty",
        "description",
        "from",
        "lives_in",
        "age",
        "gender",
        "cv",
        "image"
    ];
}
