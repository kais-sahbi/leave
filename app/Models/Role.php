<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $guarded=[];
    // chaque role has oe permission 1 to 1
    //un role possede aumoin une permission associe
    public function permission(){
        return $this->hasOne(Permission::class);
    }
}
