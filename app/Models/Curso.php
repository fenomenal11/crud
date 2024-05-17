<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    protected $table = 'cursos';

    protected $primaryKey = 'docente_id';

    public $incrementing = false;

    protected $fillable = [
        'nombre',
        'descripcion',
        'docente_id',
        'estado',
    ];

    public function docente()
    {
        return $this->belongsTo(Docente::class, 'docente_id', 'id');
    }
}