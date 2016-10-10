<?php

namespace guiassoft\Model;

use Illuminate\Database\Eloquent\Model;

class empresa extends Model
{
    protected $table='empresa';
	protected $primarykey='id';	
	protected $fillable=['id', 'nombre', 'tipodocumento_id','documento','ciudad_id','telefono','correo','direccion','codigo_habilitacion'];

	public function ciudad ()
		{			
			return $this->hasMany(ciudad::class);
		}

	public function tipoDocumento ()
		{			
			return $this->hasMany(tipoDocumento::class);
		}
}
