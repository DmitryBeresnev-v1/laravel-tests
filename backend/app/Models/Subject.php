<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'description',
        'url_name',
        'color',
        'icon_subject'
    ];

    public function topics()
    {
        return $this->hasMany(Topic::class);
    }
}