<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, Translatable;

    public $translatedAttributes = ['title', 'description'];
    protected $fillable = ['id', 'image', 'parent', 'created_at', 'updated_at', 'deleted_at'];

    public function parents()
    {
        return $this->belongsTo(Category::class, 'parent');
    }


    public function children()
    {
        return $this->hasMany(Category::class, 'parent');
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }
}
