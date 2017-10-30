<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Navigation extends Model {

    // 与二级菜单的关系
    public function secondLevel()
    {
        return $this->hasMany('App\Model\Navigation', 'fid', 'code');
    }

    // 与一级菜单的关系
    public function fLevel()
    {
        return $this->belongsTo('App\Model\Navigation', 'fid', 'code');
    }

}
