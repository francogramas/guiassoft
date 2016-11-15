<?php namespace guiassoft;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {

    protected $table = 'role';
	protected $primarykey='id';	
    protected $fillable = ['id', 'name', 'descripction','code'];

    public function users()
    {
        return $this->hasMany('guiassoft\User', 'role_id', 'id');
    }

}
