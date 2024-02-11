<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    use HasFactory;

    protected $fillable = [
        // Lista de campos asignables en masa
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

    //Realacion N:M con Idea
    public function ideas()
    {
        return $this->belongsToMany(Idea::class, 'description_idea', 'description_id', 'idea_id', 'id', 'id')
            ->withTimestamps();
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
