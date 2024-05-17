<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;
    protected $table = 'estudiantes';

    protected $primaryKey = 'persona_dni';

    public $incrementing = false;

    protected $fillable = [
        'persona_dni',
        'estado',
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'persona_dni', 'dni');
    }
}