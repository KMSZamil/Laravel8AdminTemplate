<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuModel extends Model
{

    protected $table = 'menu';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $guarded=[];
}
