<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quest extends Model
{
    use HasFactory;

    protected $table = 'questions';

    protected $fillable = [
        'question',
        'test_id',
        'type',
    ];
    
    public function tests()
    {
        return $this->belongsTo(Test::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class, 'question_id');
    }
}