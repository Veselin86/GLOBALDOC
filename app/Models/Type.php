<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    public function terms() {
        return $this->hasMany(Term::class);
    }

    public function users() {
         return $this->hasMany(USer::class);
    }
    // public function users() {
    //     return $this->hasMany(User::class, 'type_id');
    // }

    // public function terms() {
    //     return $this->hasMany(Term::class, 'type_id');
    // }
}
