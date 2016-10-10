<?php

namespace guiassoft\Model\pacientes;

use Illuminate\Database\Eloquent\Model;

class zonaresidencia extends Model
{
    	//
	protected $table='zonaresidencia';
	protected $primarykey='id';	
	protected $fillable=['id', 'cod', 'descripcion'];	
	
	public function pacientes(){
		return $this -> belongsto(pacientes::class);
	}
}
