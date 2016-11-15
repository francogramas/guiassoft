<?php

namespace guiassoft\Model\servicios;

use Illuminate\Database\Eloquent\Model;

class cupsespecialidad extends Model
{
    protected $table='cupsespecialidad';
	protected $primarykey='id';
	protected $fillable=['id', 'especialidad_id','cups_codigo'];

	public function cups()
	{
		return $this->hasMany(cups::class);
	}

	public function especialidad()
	{
		return $this->hasMany(especialidad::class);
	}
}
