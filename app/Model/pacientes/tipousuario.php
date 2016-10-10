<?php

namespace guiassoft\Model\pacientes;

use Illuminate\Database\Eloquent\Model;

class tipousuario extends Model
{
    protected $table='tipousuario';
	protected $primarykey='id';	
	protected $fillable=['id', 'descripcion'];	
	
	public function pacientes(){
		return $this -> belongsto(pacientes::class);
	}
}
