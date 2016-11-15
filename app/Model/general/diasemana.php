<?php

namespace guiassoft\Model\general;

use Illuminate\Database\Eloquent\Model;

class diasemana extends Model
{
    protected $table='diasemana';
	protected $primarykey='id';	
	protected $fillable=['id', 'descripcion'];	
	
}
