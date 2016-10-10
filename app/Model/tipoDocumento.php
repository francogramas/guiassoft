<?php

namespace guiassoft\Model;

use Illuminate\Database\Eloquent\Model;

class tipoDocumento extends Model
{
    
	//
	protected $table='tipoDocumento';
	protected $primarykey='id';	
	protected $fillable=['id', 'name', 'description'];	
	
	public function empresa(){
		return $this -> belongsto(empresa::class);
	}
}
