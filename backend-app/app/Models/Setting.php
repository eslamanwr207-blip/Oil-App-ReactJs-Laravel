<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model implements TranslatableContract
{
    use HasFactory, Translatable, softDeletes;

    public $translatedAttributes = ['title', 'description'];

    protected $fillable = ['id', 'email', 'facebook', 'x', 'logo', 'favicon','created_at','updated_at','deleted_at'];


    public static function cheeksettings()
    {
        $settings = Self::all();
        if (count($settings) < 1){
            $data = [
                'id' => 1,
            ];

            foreach (config('app.languages') as $key=> $value) {
                $data[$key]['title'] = $value;
            }

            Self::create($data);
        }

        return Self::first();
    }
}
