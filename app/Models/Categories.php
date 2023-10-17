<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Categories extends Model
{
    use HasFactory;

    use Sluggable;

    public function Sluggable():array
    {
        return[
            'slug' =>
            [
                'source' => 'libelle'
            ]
        ];
    }

    public function sousCategorie()
    {
        return $this->belongsTo(SousCategories::class);
    }
}
