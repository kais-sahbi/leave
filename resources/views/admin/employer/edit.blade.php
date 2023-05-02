@extends('admin.layouts.master')

@section('content')
    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Modifier un employée

                </li>
            </ol>
        </nav>
        @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
        @endif
        <form action="{{route('user.update',$user->id)}}" method="post" enctype="multipart/form-data">

                 @method("PUT")
                 @csrf
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">General Information</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Full name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$user->name}}"/>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                 </span>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="adresse" class="form-control" value="{{$user->name}}" />
                            </div>

                            <div class="form-group">
                                <label>Matrécule </label>
                                <input type="number" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" value="{{$user->phone_number}}" />
                                @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                 </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Departement</label>
                                <select class="form-select" name="departement_id" required="">
                                    @foreach(App\Models\Departement::all() as $department)

                                        <option value="{{$department->id}}" @if($user->departement_id==$department->id)selected @endif>{{$department->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label>Designation</label>
                                <input type="text" name="designation" class="form-control  @error('designation') is-invalid @enderror" value="{{$user->designation}}"/>
                                @error('designation')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                 </span>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label>Start date</label>
                                <input type="date" name="start_from" class="form-control  @error('start_from') is-invalid @enderror" placeholder="dd-mm-yyyy" value="{{$user->start_from}}"/>
                                @error('start_from')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                 </span>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image" accept="image/*" class="form-control @error('image') is-invalid @enderror" />
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Login Information</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Email </label>
                                <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" required="" value="{{$user->email}}" />
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                 </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label>Role</label>
                                <select class="form-select" name="role_id" required="">

                                    @foreach(App\Models\Role::all() as $role)

                                        <option value="{{$role->id}}"@if($user->role_id==$role->id)selected @endif>{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                    </div>
                    <br>

                    @if(isset(Auth()->user()->role->permission['name']['user']['can-edit']))
                    <div class="form-group">
                        <button class="btn btn-primary " type="submit">éditer</button>
                    </div>
                    @endif
                </div>

            </div>
        </form>
    </div>

@endsection
