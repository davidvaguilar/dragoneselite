<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPasswordNotification;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'run', 'name', 'email', 'password', 'adress', 'phone', 'movil'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($password){
        $this->attributes['password'] = bcrypt($password);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);    //, 'user_id'
    }

                public function tags()
                {
                    return $this->belongsToMany(Tag::class);    // PERTENECE A MUCHOS  belongsToMany es una coleccion
                }


    public function scopeAllowed($query)
    {
        if( auth()->user()->can('view', $this) ){   //if( auth()->user()->hasRole('Admin') ){
            return $query;
        } 
        return $query->where('id', auth()->id());
    }

    public function getRoleDisplayName()
    {
        return $this->roles->pluck('display_name')->implode(', ');
    }

    public function syncTags($tags){
        $tagIds = collect($tags)->map(function($tag){
            return Tag::find($tag)
            ? $tag
            : Tag::create(['name' => $tag])->id;
        });

        return $this->tags()->sync($tagIds);
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
    
}
