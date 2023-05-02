@extends('admin.layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{Session::get('message')}}
                    </div>
                @endif
                <form action="{{route('role.update',$role->id)}}" method="post">
                    @method("PUT")
                    @csrf
                    <div class="card">
                        <div class="card-header">{{ __('Dashboard') }}</div>

                        <div class="card-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                       value="{{$role->name}}"/>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror"  name="description">
                                          {{$role->description}}
                               </textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>

                            @if(isset(Auth()->user()->role->permission['name']['role']['can-edit']))
                            <div class="form-group mt-1">
                                <button type="submit" class="btn btn-primary">éditer</button>
                            </div>
                            @endif

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
