<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey = 'nia';
    protected $fillable = ['nia', 'name', 'type_id', 'email', 'password'];

    //Relacion 1:M con type
    public function type() {
        return $this->belongsTo(Type::class, 'type_id');
    }
    
    //Relacion N:M con term
    public function terms() {
        return $this->belongsToMany(User::class, 'term_user', 'term_id', 'user_id', 'id', 'nia');
    }

    public function rates() {
        return $this->belongsToMany(User::class, 'description_user', 'description_id', 'user_id', 'id', 'nia')
            ->withPivot('rate', 'rate_date')
            ->withTimestamps();
    }
}
