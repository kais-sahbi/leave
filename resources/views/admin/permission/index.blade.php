@extends('admin.layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="row ">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">All Permission</li>
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
                        <th>Edit</th>
                        <th>Delete</th>

                    </tr>

                    </thead>
                    <tbody

                    @if(count($permissions)>0)
                        @foreach($permissions as $key=>$per)
                            <tr>

                                <td>{{$key+1}}</td>
                                <td>{{$per->role->name}}</td>  <!--role c'est la fonction dans permission.php
                                Afficher les roles dans les permlissions parexp : role tech n a pas de permission -> n affiche pas
                                Auth()->user()->role->permission['name']['department']['can-edit'] afficher tous les permission de 1 role
                                elle returne 1 c a d une permission sont exacte allow for me
                                -->



                                <td>

                                    @if(isset(Auth()->user()->role->permission['name']['permission']['can-edit']))
                                    <a href="{{route('permission.edit',$per->id)}}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @endif
                                </td>
                                <td>
                                    @if(isset(Auth()->user()->role->permission['name']['permission']['can-delete']))
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal{{$per->id}}">

                                        <i class="fas fa-trash"></i>
                                    </a>
                                    @endif
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{$per->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" >
                                            <form action="{{route('permission.destroy',$per->id)}}" method="post">
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
                                                        {{$per->id}}
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

                                </td>


                            </tr>
                        @endforeach
                    @else
                        <td>No Permission to display</td>
                    @endif
                    </tbody>
                </table>


            </div>
        </div>
    </div>
@endsection
