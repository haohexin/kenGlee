<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model {
    public    $timestamps = false;
    protected $table      = 'permission_role';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'permission_id',
        'role_id',
    ];

    public function permission()
    {
        return $this->hasOne('App\Model\Permission', 'id', 'permission_id');
    }
}
