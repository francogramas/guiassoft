<?php

namespace guiassoft\Model\empresa;

use Illuminate\Database\Eloquent\Model;

class empleados extends Model
{
    protected $table='empleados';
	protected $primarykey='id';	
	protected $fillable=['id','nombre','apellido1','apellido2','sexo_id','nacimiento','tipodocumentopaci_id','documento','ciudad_id','telefono','direccion','correo','estadoempleados_id','role_id'];

	public function ciudades()
	{		
		return $this->hasMany(ciudades::class);
	}
	public function tipodocumentopaci()
	{		
		return $this->hasMany(tipodocumentopaci::class);
	}
	public function estadoempleados()
	{		
		return $this->hasMany(estadoempleados::class);
	}
	public function sexo()
	{		
		return $this->hasMany(sexo::class);
	}
	public function role()
	{		
		return $this->hasMany(role::class);
	}
}
