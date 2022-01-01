<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Savings extends Model
{
    use HasFactory;
    protected $table = 'savings';
    protected $fillable = [
        'category',
        'post_id',
        'user_id',

    ];
    public function post(){
        return $this->belongsTo("App\Models\Post");
      }
}
