<?php

namespace guiassoft\Model\servicios;

use Illuminate\Database\Eloquent\Model;

class servicios extends Model
{
    protected $table='servicios';
	protected $primarykey='id';
	protected $fillable=['id', 'nombre','ambitoprocedimiento_id'];

	public function ambitoprocedimiento()
	{
		return $this->hasMany(ambitoprocedimiento::class);
	}
	
	public function especialidad()
	{
		return $this->belongsTo(especialidad::class);
	}
}
