<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;


class Client extends Model
{
    use HasFactory, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cedula', 'nombre_cliente'
    ];

    // Relación Uno a Uno: Un cliente TIENE UN perfil
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    

}

