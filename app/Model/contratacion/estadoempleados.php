<?php

namespace guiassoft\Model\contratacion;

use Illuminate\Database\Eloquent\Model;

class estadoempleados extends Model
{
    protected $table='estadoempleados';
	protected $primarykey='id';	
	protected $fillable=['id', 'nombre'];	
	
	public function empleados(){
		return $this -> belongsto(empleados::class);
	}
}
