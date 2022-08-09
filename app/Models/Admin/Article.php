<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected     $guarded      = ['id'];
    protected     $attributes   = ['headlines' => false, 'viewer' => false];
    // public        $timestamps   = false;

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])
            ->format('d F Y');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
