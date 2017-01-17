<?php

namespace guiassoft\model\hc;

use Illuminate\Database\Eloquent\Model;

class etapashc extends Model
{
    
	protected $table='etapashc';
	protected $primarykey='id';
	protected $fillable=['id','nombre','descripcion'];

    public function estructurahc(){
		return $this -> belongsto(estructurahc::class);
	}
}
