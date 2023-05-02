@extends('admin.layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="row ">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        {{--{{Auth()->user()->role}}<br>
                       {{Auth()->user()->role->permission}}--}}
                       {{-- {{Auth()->user()->role->permission['name']['department']['can-edit']}} <!--===> elle returne 1 c a d une permission sont exacte allow for me-->--}}
                        <li class="breadcrumb-item active" aria-current="page">All users</li>
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
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Departement</th>
                        <th>Post</th>
                        <th>Start Date</th>
                        <th>Address</th>
                        <th>Matricule</th>
                        <th>Edit</th>
                        <th>Delete</th>

                    </tr>

                    </thead>
                    <tbody>
                    @if(count($users)>0)
                        @foreach($users as $key=>$user)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td><img src="{{asset('profile')}}/{{$user->image}}" width="40%"/></td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td><span class="badge bg-success">{{$user->role->name ?? 'default'}}</span></td>
                                <td>{{$user->departement->name ?? 'default'}}</td> {{--if there is no departement (?? 'default')--}}
                                <td>{{$user->designation}}</td>
                                <td>{{$user->start_from}}</td>
                                <td>{{$user->adresse}}</td>
                                <td>{{$user->phone_number}}</td>
                                <td>
                                    @if(isset(Auth()->user()->role->permission['name']['user']['can-edit']))
                                    <a href="{{route('user.edit',$user->id)}}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @endif
                                </td>
                                <td>
                                    @if(isset(Auth()->user()->role->permission['name']['user']['can-delete']))
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal{{$user->id}}">

                                        <i class="fas fa-trash"></i>
                                    </a>
                                    @endif
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" >
                                            <form action="{{route('user.destroy',$user->id)}}" method="post">
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
                                                        {{$user->id}}
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
                        <td>No users to display</td>
                    @endif
                    </tbody>
                </table>


            </div>
        </div>
    </div>
@endsection
