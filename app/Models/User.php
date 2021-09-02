<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'last_name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'assigned_roles');
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function hasRole(array $roles)
    {
        return $this->roles->pluck('name')->intersect($roles)->count();

    }

    public function isAdmin()
    {
        return $this->hasRole(['admin']);
    }

    // funcion mutadora, sirve para hacer una accion antes de guardar, el nombre debe ser set Campo Attribute
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = strtoupper($name);
    }

    public function setLastNameAttribute($last_name)
    {
        $this->attributes['last_name'] = strtoupper($last_name);
    }
}
