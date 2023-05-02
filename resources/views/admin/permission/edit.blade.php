@extends('admin.layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">Permission</div>
                    @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{Session::get('message')}}
                        </div>
                    @endif
                    <form action="{{route('permission.update',$permission->id)}}" method="post" enctype="multipart/form-data">
                        @method("PUT")
                        @csrf
                        <div class="card-body">
                            {{--                            <select name="role_id" class="form-select @error('role_id') is-invalid @enderror  " >--}}
                            {{--                                <option value="">Seleect Role</option>--}}
                            {{--                                @foreach(\App\Models\Role::all() as $role)--}}
                            {{--                                    <option value="{{$role->id}}">{{$role->name}}</option>--}}
                            {{--                                @endforeach--}}
                            {{--                                @error('role_id')--}}
                            {{--                                <span class="invalid-feedback" role="alert">--}}
                            {{--                                <strong>{{ $message }}</strong>--}}
                            {{--                            </span>--}}
                            {{--                                @enderror--}}
                            {{--                            </select>--}}
                            <h3>{{$permission->role->name}}</h3>
                            <table class="table table-striped table-dark mt-5">
                                <thead>
                                <tr>
                                    <th scope="col">Permission</th>
                                    <th scope="col">can-add</th>
                                    <th scope="col">can-edit</th>
                                    <th scope="col">can-delete</th>
{{--                                    <th scope="col">can-view</th>--}}

                                    <th scope="col">can-list</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Department</td><!--isset c'est pour verifier si la valeur existe dans la coloun name ou non exemple : ['can-delete'] n'exite pas ; elle routrne non chekcked à la checkbox
                                     sans isset il y aura un msg d'erreur: Undefined array key "can-delete"-->
                                    <td><input type="checkbox" name="name[department][can-add]"
                                               @if(isset($permission['name']['department']['can-add']))checked
                                               @endif value="1"></td>

                                    <td><input type="checkbox" name="name[department][can-edit]"
                                               @if(isset($permission['name']['department']['can-edit']))checked
                                               @endif value="1"></td>
                                    <td><input type="checkbox" name="name[department][can-delete]"
                                               @if(isset($permission['name']['department']['can-delete']))checked
                                               @endif value="1"></td>

                                    <td><input type="checkbox" name="name[department][can-list]" @if(isset($permission['name']['department']['can-list']))checked
                                               @endif value="1"></td>
                                </tr>
                                <tr>
                                    <td>Role</td>
                                    <td><input type="checkbox" name="name[role][can-add]" @if(isset($permission['name']['role']['can-add']))checked
                                               @endif value="1"></td>
                                    <td><input type="checkbox" name="name[role][can-edit]" @if(isset($permission['name']['role']['can-edit']))checked
                                               @endif value="1"></td>
                                    <td><input type="checkbox" name="name[role][can-delete]"@if(isset($permission['name']['role']['can-delete']))checked
                                               @endif value="1"></td>

                                    <td><input type="checkbox" name="name[role][can-list]"@if(isset($permission['name']['role']['can-list']))checked
                                               @endif value="1"></td>
                                </tr>
                                <tr>
                                    <td>Permissions</td>
                                    <td><input type="checkbox" name="name[permission][can-add]"@if(isset($permission['name']['permission']['can-add']))checked
                                               @endif value="1"></td>
                                    <td><input type="checkbox" name="name[permission][can-edit]"@if(isset($permission['name']['permission']['can-edit']))checked
                                               @endif value="1"></td>
                                    <td><input type="checkbox" name="name[permission][can-delete]"@if(isset($permission['name']['permission']['can-delete']))checked
                                               @endif value="1"></td>

                                    <td><input type="checkbox" name="name[permission][can-list]"@if(isset($permission['name']['permission']['can-list']))checked
                                               @endif value="1"></td>
                                </tr>
                                <tr>
                                    <td>User</td>
                                    <td><input type="checkbox" name="name[user][can-add]"@if(isset($permission['name']['user']['can-add']))checked
                                               @endif value="1"></td>
                                    <td><input type="checkbox" name="name[user][can-edit]"@if(isset($permission['name']['user']['can-edit']))checked
                                               @endif value="1"></td>
                                    <td><input type="checkbox" name="name[user][can-delete]"@if(isset($permission['name']['user']['can-delete']))checked
                                               @endif value="1"></td>

                                    <td><input type="checkbox" name="name[user][can-list]"@if(isset($permission['name']['user']['can-list']))checked
                                               @endif value="1"></td>
                                </tr>



                                <tr>
                                    <td>Approver les Congés</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><input type="checkbox" name="name[leave][can-list]"@if(isset($permission['name']['leave']['can-list']))checked
                                               @endif value="1"></td>



                                </tr>
                                </tbody>
                            </table>

                            @if(isset(Auth()->user()->role->permission['name']['permission']['can-edit']))
                            <div class="form-group mt-1">
                                <button type="submit" class="btn btn-primary">Editer</button>
                            </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
