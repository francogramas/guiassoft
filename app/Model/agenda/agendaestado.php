<?php

namespace guiassoft\Model\agenda;

use Illuminate\Database\Eloquent\Model;

class agendaestado extends Model
{
    protected $table='agendaestado';
	protected $primarykey='id';	
	protected $fillable=['id','nombre'];

	public function agenda ()
	{		
		return $this->belongsTo(agenda::class);
	}
}
