<?php

namespace guiassoft\model\hc;

use Illuminate\Database\Eloquent\Model;

class itemshc extends Model
{
    protected $table='itemshc';
	protected $primarykey='id';
	protected $fillable=['id','etapashcespecialidad_id','nombre','sugerencia','orden','type'];
}