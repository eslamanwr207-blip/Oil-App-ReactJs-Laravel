<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model implements TranslatableContract
{
    use HasFactory,SoftDeletes ,Translatable;
    public $translatedAttributes = ['title'];
    protected $fillable = ['id', 'image', 'created_at', 'updated_at', 'deleted_at'];

    public function products(){
        return $this->hasMany(Product::class);
    }
}
