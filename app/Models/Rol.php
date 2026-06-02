<?php

/*
 Los models representan las tablas en PHP y definen relaciones, atributos protegidos
 y comportamientos. Los aspectos
 clave son: nombre de tabla en castellano, fillable (asignación masiva), 
 SoftDeletes y las relaciones Eloquent.
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rol extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'roles'; // sobreescribe la pluralización en inglés ('rols')
    protected $fillable = ['nombre', 'descripcion',];

    // Relación: un Rol tiene muchos Usuarios → se usa como $rol->usuarios
    public function users() {
    return $this->hasMany(User::class, 'rol_id');
    }


}
