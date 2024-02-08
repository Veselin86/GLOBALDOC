<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    use HasFactory;

    //Relacion 1:M con type
    // public function type()
    // {
    //     return $this->belongsTo(Type::class);
    // }
    public function type() {
        return $this->belongsTo(Type::class, 'type_id');
    }
    
    //Relacion 1:N con descripocion:
    public function descriptions()
    {
        return $this->hasMany(Description::class);
    }

    //Relacion N:M con usuario:
    public function users()
    {
        return $this->belongsToMany(User::class, 'term_user', 'term_id', 'user_id', 'id', 'nia');
    }

    // public function users() {
    //     return $this->belongsToMany(User::class, 'term_user');
    // }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
