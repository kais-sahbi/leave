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
        <form action="{{route('leave.store')}}" method="post" enctype="multipart/form-data">@csrf

            <div class="row justify-content-center">

                    <div class="card">
                        <div class="card-header">Demander un congés</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Date de Sorite</label><br>
                                <input type="date" name="from" class="form-control-sm  @error('from') is-invalid @enderror"   />
                                @error('from')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                 </span>
                                @enderror

                            </div>
                            <br>
                            <div class="form-group">
                                <label>Date de Reprise</label>
                                <br>
                                <input type="date" name="to" class="form-control-sm   @error('to') is-invalid @enderror "   />
                                @error('to')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                 </span>
                                @enderror

                            </div>
                            <br>
                            <div class="form-group">
                                <label>Type de Congés</label><br>
                                <select class="form-select-sm" name="type" required="">
                                    <option value="">Selectionner le type de congés</option>

                                        <option value="annuelle">Congés annuelle</option>
                                        <option value="maladie">Congés de Maladie</option>
                                       <option value="parental">Parentaux </option>
                                        <option value="autre">Autre</option>

                                </select>
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control  @error('description') is-invalid @enderror" ></textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                 </span>
                                @enderror

                            </div>
                            <br>
                            <div class="form-group">
                                <button class="btn btn-primary " type="submit">Submit</button>
                            </div>
                        </div>
                    </div>


            </div>
        </form>
            <table class="table mt-5 table-borderless datatable">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date de Sortie</th>
                    <th scope="col">Date de Reprise</th>
                    <th scope="col">Description</th>
                    <th scope="col">type</th>
                    <th scope="col">Reponse</th>
                    <th scope="col">Status</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($leaves as $leave)
                    <tr>
                        <th scope="row">1</th>
                        <td>{{$leave->from}}</td>
                        <td>{{$leave->to}}</td>
                        <td>{{$leave->description}}</td>
                        <td>{{$leave->type}}</td>
                        <td>{{$leave->message}}</td>
                        <td>
                            @if($leave->status==0)
                                <span class="btn btn-success">en attente</span>

                            @elseif($leave->status==2)
                                <span class="btn btn-danger">Rejeté</span>
                            @else
                                <span class="btn btn-info">accepté</span>
                            @endif
                        </td>

                        <td>

                            <a href="{{route('leave.edit',[$leave->id])}}"><i class="fas fa-edit"></i></a>
                        </td>
                        <td>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal{{$leave->id}}">
                                <i class="fas fa-trash"></i>
                            </a>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{$leave->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" >
                                    <form action="{{route('leave.destroy',$leave->id)}}" method="post">
                                        @method("DELETE")
                                        @csrf

                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title fs-5" id="exampleModalLabel">Delete Confirm</h5>
                                                <button type="button" lass="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

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

                </tbody>
            </table>
            </div>
        </div>
    </div>

@endsection
