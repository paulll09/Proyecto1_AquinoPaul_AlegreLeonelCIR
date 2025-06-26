<?php

namespace App\Models;
use CodeIgniter\Model;

class mensajesContactoModel extends Model
{
    protected $table = 'mensajes_contacto';
    protected $primaryKey = 'id_mensajes_contacto';
    
    protected $useAutoIncrement = true;

    protected $returnType = 'array'; //define en que formato va a devolver los resultados 
    protected $useSoftDeletes = false; //los regitros se eliminan directamente de la base de datos

    protected $allowedFields = [ 'nombre_completo','correo_electronico','telefono','asunto','mensaje','leido'];
    
    protected $useTimestamps = false; //no se van a usar los timestamps de creacion y actualizacion
    protected $createdField = ''; //campo de la fecha de creacion
    protected $updatedField= ''; //campo de la fecha de actualizacion
    protected $deletedField = ''; //campo de la fecha de eliminacion

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false; //no se va a saltar la validacion de los datos
}