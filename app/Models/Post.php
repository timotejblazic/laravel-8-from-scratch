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

    protected $with = ['category', 'author'];


    /*public function getRouteKeyName() {
        return 'slug';
    }*/

    public function scopeFilter($query, array $filters) {  // Post::newQuery()->filter()
//        if ($filters['search'] ?? false) {
//            $query
//                ->where('title', 'like', '%' . request('search') . '%')
//                ->orWhere('body', 'like', '%' . request('search') . '%');
//        }

        $query->when($filters['search'] ?? false, fn ($query, $search) =>
            $query
                ->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%'));
    }

    public function category() {
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Category::class);
    }

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
