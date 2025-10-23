<?php

namespace App\Models\Website;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewController extends Model
{
    use HasFactory;

    protected $fillable = ['comment', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
