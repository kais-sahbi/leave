@extends('admin.layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="row ">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">All Departments</li>
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
{{--                        @dd(Auth()->user()->departement->name)--}}
                    </tr>

                    </thead>
                    <tbody>
                    @if(count($departements)>0)
                        @foreach($departements as $key=>$departement)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$departement->name}}</td>
                        <td>{{$departement->description}}</td>
                        <td>
                            @if(isset(Auth()->user()->role->permission['name']['department']['can-edit']))
                            <a href="{{route('departement.edit',$departement->id)}}">
                            <i class="fas fa-edit"></i>
                            </a>
                        </td>
                             @endif
                        <td>
                            @if(isset(Auth()->user()->role->permission['name']['department']['can-delete']))
                            <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal{{$departement->id}}">

                            <i class="fas fa-trash"></i>

                            </a>
                            @endif
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{$departement->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" >
                                        <form action="{{route('departement.destroy',$departement->id)}}" method="post">
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
                                                {{$departement->id}}
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
                        <td>No departments to display</td>
                    @endif
                    </tbody>
                </table>


            </div>
        </div>
    </div>
@endsection
