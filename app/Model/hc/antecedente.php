<?php

namespace guiassoft\Model\hc;

use Illuminate\Database\Eloquent\Model;

class antecedente extends Model
{
    protected $table='antecedente';
	protected $primarykey='id';	
	protected $fillable=['id','nombre','antecedenteclase_id','type','sugerencia'];	
	

	public function antecedenteclase()
	{
		// hasMany(RelatedModel, foreignKeyOnRelatedModel = antecedente_id, localKey = id)
		return $this->hasMany(antecedenteclase::class);
	}
}
