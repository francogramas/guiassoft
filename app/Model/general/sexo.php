<?php

namespace guiassoft\Model\general;

use Illuminate\Database\Eloquent\Model;

class sexo extends Model
{
    	//
	protected $table='sexo';
	protected $primarykey='id';	
	protected $fillable=['id', 'cod', 'descripcion'];	
	
	public function pacientes(){
		return $this -> belongsto(pacientes::class);
	}
}
