<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MySkill extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'parent_id',
        'percent',
    ];

    public function parent()
    {
        return $this->belongsTo(MySkill::class, 'parent_id');
    }

    public function childs()
    {
        return $this->hasMany(MySkill::class, 'parent_id');
    }
}
