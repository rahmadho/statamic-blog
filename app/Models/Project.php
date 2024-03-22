<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $casts = [
        'deadline' => 'datetime:Y-m-d',
    ];

    protected $fillable = [
        'user_id',
        'title',
        'deadline'
    ];
    protected $hidden = [
        'user_id',
        'updated_at'
    ];

    function user() {
        return $this->belongsTo(User::class);
    }
    function tasks() {
        return $this->hasMany(Task::class);
    }
}
