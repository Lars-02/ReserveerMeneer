<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

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

    public function roles() {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public function assignRole($role) {
        $this->roles()->save($role);
    }

    public function abilities() : Collection {
        return $this->roles->map(function ($item) {
            return $item->abilities->pluck('name');
        })->flatten();
    }

    public function events() {
        return $this->belongsToMany(Event::class, 'event_tickets')->using(EventTicket::class);
    }

    public function getFullNameAttribute()
    {
        return $this->firstname.' '.$this->lastname;
    }
}
