<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;
    protected $fillable = ['title'];

    public function description()
    {
        return $this->belongsTo(Description::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
