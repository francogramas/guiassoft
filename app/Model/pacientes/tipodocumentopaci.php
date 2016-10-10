<?php

namespace guiassoft\Model\pacientes;

use Illuminate\Database\Eloquent\Model;

class tipodocumentopaci extends Model
{
    protected $table='tipodocumentopaci';
	protected $primarykey='id';	
	protected $fillable=['id', 'cod', 'descripcion'];	
	
	public function pacientes(){
		return $this -> belongsto(pacientes::class);
	}
}
