<?php

namespace guiassoft\Model\instalaciones;

use Illuminate\Database\Eloquent\Model;

class inst_tipo extends Model
{
	
	protected $table='inst_tipo';
    protected $primarykey='id';	
	protected $fillable=['id','nombre','inst_servicio_id'];
	
	public function instalacion(){
		return $this -> belongsto(instalacion::class);
	}

	public function inst_servicio()
	{
		return $this->hasMany(inst_servicio::class);
	}
}
