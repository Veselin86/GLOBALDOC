<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = ['model', 'name'];

    public $timestamps = true;

    public function terms() {
        return $this->hasMany(Term::class);
    }

    public function users() {
         return $this->hasMany(USer::class);
    }
}
