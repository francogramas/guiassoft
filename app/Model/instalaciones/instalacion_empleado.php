<?php

namespace guiassoft\Model\instalaciones;

use Illuminate\Database\Eloquent\Model;

class instalacion_empleado extends Model
{
    protected $table='instalacion_empleado';
    protected $primarykey='id';	
	protected $fillable=['id','horai','horaf','instalacion_id','empleados_id','diasemana_id','intervalo'];
	
	public function instalacion()
	{
		return $this->hasMany(instalacion::class);
	}
	
	public function empleados()
	{
		return $this->hasMany(empleados::class);
	}
	
	public function diasemana()
	{
		return $this->hasMany(diasemana::class);
	}

}
