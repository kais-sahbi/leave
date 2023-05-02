@extends('admin.layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="row ">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">All Roles</li>
                    </ol>
                </nav>
                @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{Session::get('message')}}
                    </div>
                @endif
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>

                    <tr>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Edit</th>
                        <th>Delete</th>

                    </tr>

                    </thead>
                    <tbody>
                    @if(count($roless)>0)
                        @foreach($roless as $key=>$rol)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$rol->name}}</td>
                                <td>{{$rol->description}}</td>
                                <td>
                                    @if(isset(Auth()->user()->role->permission['name']['role']['can-edit']))
                                   <a href="{{route('role.edit',$rol->id)}}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @endif
                                </td>
                                <td>
                                    @if(isset(Auth()->user()->role->permission['name']['role']['can-delete']))
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal{{$rol->id}}">

                                        <i class="fas fa-trash"></i>
                                    </a>
                                    @endif
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{$rol->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" >
                                            <form action="{{route('role.destroy',$rol->id)}}" method="post">
                                                @method("DELETE")
                                                @csrf

                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title fs-5" id="exampleModalLabel">Delete Confirm</h5>
                                                        <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close">
                                                            {{--<span aria-hidden="true">&times;</span>--}}
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{$rol->id}}
                                                        Do you want to delete?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!--Modal end-->


                                </td>





                            </tr>
                        @endforeach
                    @else
                        <td>No role to display</td>
                    @endif
                    </tbody>
                </table>


            </div>
        </div>
    </div>
@endsection
