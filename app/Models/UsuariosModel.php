<?php

namespace App\Models;
use CodeIgniter\Model;

class UsuariosModel extends Model
{
    protected $table = 'personas';
    protected $primaryKey = 'id_persona';
    
    protected $useAutoIncrement = true;

    protected $returnType = 'array'; //define en que formato va a devolver los resultados 
    protected $useSoftDeletes = false; //los regitros se eliminan directamente de la base de datos

    protected $allowedFields = [ 'persona_mail','persona_pass','persona_nombre','persona_apellido','persona_estado','perfil_id','persona_telefono','persona_dni','persona_fecha_nacimiento','persona_direccion','persona_ciudad','persona_provincia','persona_codigo_postal'];
    
    protected $useTimestamps = false; //no se van a usar los timestamps de creacion y actualizacion
    protected $createdField = ''; //campo de la fecha de creacion
    protected $updatedField= ''; //campo de la fecha de actualizacion
    protected $deletedField = ''; //campo de la fecha de eliminacion

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false; //no se va a saltar la validacion de los datos
}