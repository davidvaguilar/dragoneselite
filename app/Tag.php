<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = [];
    
    public function getRouteKeyName(){
        return 'url';
    }

    public function posts(){
        return $this->belongsToMany(Post::class);   // base belongsToMany
    }

                public function users()
                {
                    return $this->belongsToMany(User::class);    // PERTENECE A MUCHOS  belongsToMany  hasMany
                }

    public function setNameAttribute($name){    //MUTADOR
        $this->attributes['name'] = $name;
        $this->attributes['url'] = str_slug($name);
    }
}
