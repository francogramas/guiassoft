<?php

namespace guiassoft\model\contratacion;

use Illuminate\Database\Eloquent\Model;

class tipocontrato extends Model
{
    protected $table='tipocontrato';
	protected $primarykey='id';	
	protected $fillable=['id', 'nombre'];	
	
	public function contratos(){
		return $this -> belongsto(contratos::class);
	}
}
