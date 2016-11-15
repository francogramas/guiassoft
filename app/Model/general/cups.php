<?php

namespace guiassoft\Model\general;

use Illuminate\Database\Eloquent\Model;

class cups extends Model
{
    protected $table='cups';
	protected $primarykey='codigo';	
	protected $fillable=['codigo','nombre','sexo','edad_ini','edad_fin','archivo','qx','tipo_procedimiento','no_maximo','no_minimo','finalidad','dx_requerido','edad_incial_dias','edad_final_dias','pos'];	
	
	public function cupsespecialidad(){
		return $this -> belongsto(cupsespecialidad::class);
	}
}
