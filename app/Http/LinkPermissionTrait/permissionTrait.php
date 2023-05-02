<?php

namespace App\Http\LinkPermissionTrait;

trait permissionTrait
{
public function hasPermission(){
    //for department
    if(!isset(auth()->user()->role->permission['name']['department']['can-add']) && \Route::is('departement.create')){
        return abort(401);
    }
    if(!isset(auth()->user()->role->permission['name']['department']['can-list']) && \Route::is('departement.list')){
        return abort(401);
    }
//for role
    if(!isset(auth()->user()->role->permission['name']['role']['can-list']) && \Route::is('role.list')){
        return abort(401);
    }
    if(!isset(auth()->user()->role->permission['name']['role']['can-add']) && \Route::is('role.create')){
        return abort(401);
    }
    //for user
    if(!isset(auth()->user()->role->permission['name']['user']['can-list']) && \Route::is('user.list')){
        return abort(401);
    }
    if(!isset(auth()->user()->role->permission['name']['user']['can-add']) && \Route::is('user.create')){
        return abort(401);
    }
    //for permission
    if(!isset(auth()->user()->role->permission['name']['permission']['can-list']) && \Route::is('permisssion.list')){
        return abort(401);
    }
    if(!isset(auth()->user()->role->permission['name']['permission']['can-add']) && \Route::is('permisssion.create')){
        return abort(401);
    }
    //approve-reject staff leave
    if(!isset(auth()->user()->role->permission['name']['leave']['can-list']) && \Route::is('leave.list')){
        return abort(401);
    }

    }
}
