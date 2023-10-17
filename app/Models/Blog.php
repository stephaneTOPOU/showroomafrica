<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    public $fillable = ['titre', 'description1', 'image1', 'description2', 'image2', 'description3', 'image3', 'description4', 'video1', 'description5', 'video2', 'descriptionCourte'];
}
