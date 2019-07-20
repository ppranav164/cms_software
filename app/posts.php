<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class posts extends Model
{
    


   protected $fillable = ['post_titile','post_content','posted_by','category_id','posted_at','image','description','month','year','time'];


}


