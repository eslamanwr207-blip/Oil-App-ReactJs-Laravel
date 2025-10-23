<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    use HasFactory, softDeletes, Translatable;

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
