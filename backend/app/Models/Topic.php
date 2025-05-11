<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject_id',
        'class_id',
        'title',
        'description',
        'created_by',
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function class()
    {
        return $this->belongsTo(School_class::class, 'class_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function quests()
    {
        return $this->hasMany(Quest::class);
    }
    
    public function tests()
    {
        return $this->hasMany(Test::class);
    }
    
}