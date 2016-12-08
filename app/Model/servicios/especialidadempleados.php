<?php

namespace guiassoft\Model\servicios;

use Illuminate\Database\Eloquent\Model;

class especialidadempleados extends Model
{
    protected $table='especialidadempleados';
	protected $primarykey='id';
	protected $fillable=['id', 'especialidad_id','empleados_id'];

	public function especialidad()
	{
		return $this->hasMany(especialidad::class);
	}

	public function empleados()
	{
		return $this->hasMany(empleados::class);
	}

}
