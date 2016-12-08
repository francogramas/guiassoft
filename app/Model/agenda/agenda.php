<?php

namespace guiassoft\Model\agenda;

use Illuminate\Database\Eloquent\Model;

class agenda extends Model
{
    
    protected $table='agenda';
	protected $primarykey='id';	
	protected $fillable=['id','fecha','hora','agendaestado_id','pacientes_id','empleados_id','seguromedico_id','contratos_id','especialidad_id','instalacion_id','tipousuario_id','users_id'];

	public function agendaestado()
	{
		return $this->hasMany(agendaestado::class);
	}

	public function pacientes()
	{
		return $this->hasMany(pacientes::class);
	}

	public function empleados()
	{
		return $this->hasMany(empleados::class);
	}

	public function seguromedico()
	{
		return $this->hasMany(seguromedico::class);
	}

	public function contratos()
	{
		return $this->hasMany(contratos::class);
	}

	public function especialidad()
	{
		return $this->hasMany(especialidad::class);
	}

	public function instalacion()
	{
		return $this->hasMany(instalacion::class);
	}

	public function tipousuario()
	{
		return $this->hasMany(tipousuario::class);
	}

	public function users()
	{
		return $this->hasMany(users::class);
	}

}
