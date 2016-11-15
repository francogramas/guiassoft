<?php

namespace guiassoft\Model\instalaciones;

use Illuminate\Database\Eloquent\Model;

class inst_servicio extends Model
{
    
	protected $table='inst_servicio';
	protected $primarykey='id';	
	protected $fillable=['id','nombre'];

	public function inst_tipo(){
		return $this -> belongsto(inst_tipo::class);
	}
}
