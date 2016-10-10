<?php namespace guiassoft;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {

    protected $table = 'role';

    public function users()
    {
        return $this->hasMany('guiassoft\User', 'role_id', 'id');
    }

}
