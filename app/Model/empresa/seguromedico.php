<?php

namespace guiassoft\Model\empresa;

use Illuminate\Database\Eloquent\Model;

class seguromedico extends Model
{
    protected $table='seguromedico';
	protected $primarykey='id';	
	protected $fillable=['id','tipo','codigo','nit','razonsocial','direccion','telefono','ciudad_id'];

	public function ciudades()
	{		
		return $this->hasMany(ciudades::class);
	}
}