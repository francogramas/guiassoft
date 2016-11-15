<?php

namespace guiassoft\Model\instalaciones;

use Illuminate\Database\Eloquent\Model;

class instalacion extends Model
{
    protected $table='instalacion';
    protected $primarykey='id';	
	protected $fillable=['id','nombre','cupo','inst_tipo_id'];
	
	public function inst_tipo()
	{
		return $this->hasMany(inst_tipo::class);
	}
}