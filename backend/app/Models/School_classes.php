<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School_classes extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'subject_id',
    ];
}