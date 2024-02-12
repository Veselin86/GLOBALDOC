<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    use HasFactory;

    protected $fillable = [
        'notes',
        'synthesis',
        'term_id',
    ];

    //Relacion 1:1 con Term
    public function terms()
    {
        return $this->belongsTo(Term::class, 'terms_id');
    }

    //Realicion N:M con User
    public function users()
    {
        return $this->belongsToMany(User::class, 'description_user', 'description_id', 'user_id', 'id', 'nia')
            ->withPivot('rate', 'rate_date')
            ->withTimestamps();
    }

    public function ideas()
    {
        return $this->hasMany(Idea::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
