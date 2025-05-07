<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School_class extends Model
{
    use HasFactory;
    protected $table = 'classes';
    protected $fillable = [
        'class_number',
        'name',
    ];
}