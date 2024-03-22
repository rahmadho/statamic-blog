<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'project_id',
        'title',
        'status'
    ];

    protected $hidden = [
        'user_id',
        'project_id',
        'status',
        'updated_at'
    ];
    
    function user() {
        return $this->belongsTo(User::class);
    }
    function project() {
        return $this->belongsTo(Project::class);
    }
}
