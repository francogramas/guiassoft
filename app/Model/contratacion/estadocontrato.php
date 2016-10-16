<?php

namespace guiassoft\model\contratacion;

use Illuminate\Database\Eloquent\Model;

class estadocontrato extends Model
{
    protected $table='estadocontrato';
	protected $primarykey='id';	
	protected $fillable=['id', 'nombre'];	
	
	public function contratos(){
		return $this -> belongsto(contratos::class);
	}
}
