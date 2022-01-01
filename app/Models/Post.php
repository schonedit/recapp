<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $fillable = [
        'title',
        'content',
        'profile_image',
        'user_id',

    ];
    public function user(){
        return $this->belongsTo("App\Models\User");
      }
    public function savings(){
        return $this->hasMany("App\Models\Savings");
    }
}
