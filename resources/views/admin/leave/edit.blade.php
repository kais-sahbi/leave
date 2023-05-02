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
                <form action="{{route('leave.update',$leave->id)}}" method="post" enctype="multipart/form-data">
                    @method("PUT")
                    @csrf
                    <div class="row justify-content-center">

                        <div class="card">
                            <div class="card-header">Demander un congés</div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Date de Sorite</label>
                                    <input type="date" name="from" class="form-control  @error('from') is-invalid @enderror"  value="{{$leave->from}}" />
                                    @error('from')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                 </span>
                                    @enderror

                                </div>
                                <br>
                                <div class="form-group">
                                    <label>Date de Reprise</label>

                                    <input type="date" name="to" class="form-control  @error('to') is-invalid @enderror "value="{{$leave->to}}"   />
                                    @error('to')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                 </span>
                                    @enderror

                                </div>
                                <br>
                                <div class="form-group">
                                    <label>Type de Congés</label>
                                    <select class="form-select" name="type" required="" >
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
                                    <textarea name="description" class="form-control  @error('description') is-invalid @enderror" value="{{$leave->description}}" ></textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                 </span>
                                    @enderror

                                </div>
                                <br>
                                <div class="form-group">
                                    <button class="btn btn-primary " type="submit">Editer</button>
                                </div>
                            </div>
                        </div>


                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
