<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
/*use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;*/
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/*  Son ATTRIBUTES de PHP 8.
    Es una forma moderna de escribir metadata.
    #[Fillable(['name', 'email', 'password'])]
    #[Hidden(['password', 'remember_token'])]

    equivale a escribir:
    protected $fillable = [...];
    protected $hidden = [...];
*/

/* Normalmente un modelo común extiende 'Model' pero como los usuarios necesitan 
   login, password, sesiones, auth, remember token, etc. 
   Entonces Laravel usa extends Authenticatable 
*/
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    // son TRAITS. código reutilizable que “agrega capacidades”.
    use HasFactory, Notifiable, SoftDeletes; //HasFactory generar usuarios falsos para pruebas.
                                            //permite enviar notificaciones, emails, recuperación de contraseña.
                                

    //el modelo user debe coincidir con el archivo de migracion 'users'
    protected $table = 'users';
    protected $fillable = ['name', 'email', 'password', 'rol_id']; //fillable define qué campos pueden llenarse masivamente.
    protected $hidden = ['password', 'remember_token']; //Hidden Oculta esos campos cuando el modelo se convierte en JSON, API, respuestas.

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */

    //casts sirve para transformar tipos automáticamente.
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed', // hashea automáticamente al asignar. eje: $user->password = '123456' -> $2y$10$asdasd...(encripta la password)
        ];
    }

    // Relación: un Usuario pertenece a un Rol → se usa como $usuario->ro
    public function rol(){

        return $this->belongsTo(Rol::class); //belongsTo = 'pertenece a'
 
    }
}
