<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
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

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
