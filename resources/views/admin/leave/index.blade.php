@extends('admin.layouts.master')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Tous les Congés</div>
{{--            {{$leaves}}<br>--}}
{{--                    {{$l}}--}}
                    <div class="card-body">
                        <table class="table mt-5 table-borderless datatable"  >

                            <thead>
                            <tr>
                                <th scope="col">Nom</th>
                                <th scope="col">Date de Sortie</th>
                                <th scope="col">Date de Reprise</th>
                                <th scope="col">Description</th>
                                <th scope="col">type</th>
                                <th scope="col">Reponse</th>
                                <th scope="col">Status</th>

                                <th scope="col">Accepter/Rejeter</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($leaves as $leave)
                                <tr>
                                    <td>{{$leave->user->name}}</td>
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
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal{{$leave->id}}">
                                           Accepter/Rejeter !
                                        </a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{$leave->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" >
                                                <form action="{{route('leave.acceptreject',$leave->id)}}" method="post">
                                                    @csrf

                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title fs-5" id="exampleModalLabel"> Confirmer congés</h5>
                                                            <button type="button" lass="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label>Status</label>
                                                                <select class="form-select" name="status" required="">
                                                                    <option value="">Accepter/Rejeter</option>
                                                                    <option value="0">En attente</option>
                                                                    <option value="1">Accepter</option>
                                                                    <option value="2">Rejeter</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Message</label>
                                                                <textarea name="message" class="form-control" required="champ obligatoire" ></textarea>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-danger">Valider</button>
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
        </div>
    </div>
@endsection

