<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courses_Model extends Model
{
    protected $table = "courses";
    protected $primaryKey = 'uuid';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'uuid', 'title', 'description', 'price', 'image'
    ];
}
