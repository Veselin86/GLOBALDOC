<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;

    //Relacion N:M con Description
    public function descriptions() {
        return $this->belongsToMany(Description::class, 'description_idea', 'description_id', 'idea_id', 'id', 'id');
    }

    // public function descriptions() {
    //     return $this->belongsToMany(Description::class, 'description_idea');
    // }

    public function language() {
        return $this->belongsTo(Language::class);
    }    
}
