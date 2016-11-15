<?php

namespace guiassoft\Model\servicios;

use Illuminate\Database\Eloquent\Model;

class especialidad extends Model
{
    protected $table='especialidad';
	protected $primarykey='id';
	protected $fillable=['id', 'nombre','servicios_id'];

	public function servicios()
	{
		return $this->hasMany(servicios::class);
	}

	public function cupsespecialidad()
	{		
		return $this->belongsTo(cupsespecialidad::class);
	}
}
