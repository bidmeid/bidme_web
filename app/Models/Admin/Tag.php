<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;
    use Sluggable;
    protected $fillable = ['tag_name'];
    // public $timestamps = false;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source'    => 'tag_name'
            ]
        ];
    }
}
