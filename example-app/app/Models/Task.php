<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    //LINEA DE CODIGO PARA HACER LA VINCULACION DEL MODELO DE BASE DE DATOS PARA LA TABLA Task
    protected $fillable = ['titulo', 'descripcion', 'estado'];

}
