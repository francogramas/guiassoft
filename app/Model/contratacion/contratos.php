<?php

namespace guiassoft\Model\contratacion;

use Illuminate\Database\Eloquent\Model;

class contratos extends Model
{
    protected $table='contratos';
	protected $primarykey='id';	
	protected $fillable=['id','numero','seguromedico_id','nombre','plan','inicio','final','tipocontrato_id','estadocontrato_id','monto'];	
	
	public function contratos(){
		return $this -> belongsto(contratos::class);
	}

	public function tipocontrato ()
	{
		return $this->hasMany(tipocontrato::class);
	}

	public function estadocontrato ()
	{
		return $this->hasMany(estadocontrato::class);
	}
}