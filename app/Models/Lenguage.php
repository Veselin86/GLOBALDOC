<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lenguage extends Model
{
    use HasFactory;

    // public $incrementing = false; // Importante ya que no usamos la columna 'id' autoincremental
    // protected $primaryKey = 'iso_code'; // Establecer la clave primaria en 'iso_code'
    // protected $keyType = 'string'; // Establecer el tipo de la clave primaria a 'string'
    // protected $fillable = ['iso_code', 'name']; // Permitir asignación masiva para estos campos

    public function descriptions() {
        return $this->hasMany(Description::class);
    }
    
    public function ideas() {
        return $this->hasMany(Idea::class);
    }
    
    public function terms() {
        return $this->hasMany(Term::class);
    }
}
