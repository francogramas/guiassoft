<?php

namespace guiassoft\Model\hc;

use Illuminate\Database\Eloquent\Model;

class antecedenteclase extends Model
{
	protected $table='antecedenteclase';
	protected $primarykey='id';	
	protected $fillable=['id','nombre'];

    public function antecedente(){
		return $this -> belongsto(antecedente::class);
	}
}
