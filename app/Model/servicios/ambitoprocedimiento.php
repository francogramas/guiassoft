<?php

namespace guiassoft\Model\servicios;

use Illuminate\Database\Eloquent\Model;

class ambitoprocedimiento extends Model
{
    protected $table='ambitoprocedimiento';
	protected $primarykey='id';
	protected $fillable=['id', 'descripcion'];

	public function servicios()
	{
		return $this->belongsTo(servicios::class);
	}
}