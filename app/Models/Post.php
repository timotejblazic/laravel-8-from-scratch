<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Everything is allowed to be MASS ASIGNED except id
    protected $guarded = [];

    // Only these atributes are allowed to be MASS ASIGNED
    // protected $fillable = ['title', 'excerpt', 'body'];


    /*public function getRouteKeyName() {
        return 'slug';
    }*/

    public function category() {
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Category::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
