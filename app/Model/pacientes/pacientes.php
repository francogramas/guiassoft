<?php

namespace guiassoft\Model\pacientes;

use Illuminate\Database\Eloquent\Model;

class pacientes extends Model
{
    protected $table='pacientes';
	protected $primarykey='id';	
	protected $fillable=['id','tipodocumentopaci_id','documento','tipousuario_id','apellido1','apellido2','nombre1','nombre2','nacimiento','sexo_id','ciudad_id','telefono','correo','direccion','zonaresidencia_id','seguromedico_id'];
	
	public function pacientes(){
		return $this -> belongsto(pacientes::class);
	}

	public function tipodocumentopaci()
	{		
		return $this->hasMany(tipodocumentopaci::class);
	}

	public function tipousuario()
	{		
		return $this->hasMany(tipousuario::class);
	}
	
	public function sexo()
	{		
		return $this->hasMany(sexo::class);
	}

	public function ciudades()
	{		
		return $this->hasMany(ciudades::class);
	}

	public function zonaresidencia()
	{		
		return $this->hasMany(zonaresidencia::class);
	}
	public function seguromedico()
	{		
		return $this->hasMany(seguromedico::class);
	}
}
