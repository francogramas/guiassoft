<?php

namespace guiassoft\model\hc;

use Illuminate\Database\Eloquent\Model;

class etapashcespecialidad extends Model
{
    protected $table='etapashcespecialidad';
	protected $primarykey='id';
	protected $fillable=['id','etapashc_id','cupsespecialidad_id','orden'];


	public function etapashc_id()
	{
		return $this->hasMany(etapashc_id::class);
	}

	public function cupsespecialidad_id()
	{
		return $this->hasMany(cupsespecialidad_id::class);
	}
}
