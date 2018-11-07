<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckList extends Model
{
    //

    public function users(){
        return $this->belongsToMany('App\User','user_checklists','check_list_id','user_id');
    }

}
