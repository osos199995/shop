@extends('layouts.admin')
@section('styles')
    <link href="{{asset('assets/plugins/bootstrap-table/css/bootstrap-table.min.css')}}" rel="stylesheet" type="text/css" />
@stop
@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @elseif(Session::has('danger'))
        <div class="alert alert-danger">{{ Session::get('danger') }}</div>
    @endif

    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title"><strong>Contacts No: </strong>{{$contacts->count()}}</h4>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="card-box">
            <h4 class="m-t-0 header-title">Messages :</h4>
            <table data-toggle="table"
                   data-page-list="[5, 10, 20]"
                   data-page-size="5"
                   data-pagination="true" class="table-bordered ">
                <thead>
                <tr>
                    <th>title</th>
                    <th>description</th>
                    <th>facebook</th>
                    <th>twitter</th>
                    <th>google</th>
                    <th>pihance</th>
                    <th>feature</th>
                    <th data-field="Actions" data-align="center">Action</th>
                </tr>
                </thead>

                <tbody>

                @foreach($contacts as $contact)

                <tr>
                    <td>{{$contact->name}}</td>
                    <td>{{$contact->description}}</td>
                    <td>{{$contact->facebook}}</td>
                    <td>{{$contact->twitter}}</td>
                    <td>{{$contact->google}}</td>
                    <td>{{$contact->pihance}}</td>
                    <td>{{$contact->feature}}</td>
                    <td>
                        <a data-toggle="modal" class="btn btn-danger" data-target=".{{$contact['id'].'delete'}}" >Delete</a>
                    </td>
                </tr>
                {{--Modal for user delete--}}
                <div class="modal fade {{$contact['id'].'delete'}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title mt-0" style="color: red">Do You Wanna Delete This Message</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                {!! Form::open(['method'=>'Delete','action'=>['AdminContacusController@destroy',$contact['id']]]) !!}
                                <button class="btn btn-danger">Delete</button>
                                <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                                {!! Form::close() !!}
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                {{--End Modal for user delete--}}
                </tbody>
            </table>
        </div>
    </div>
        @endforeach


@stop

@section('scripts')
    <script src="{{asset('assets/plugins/bootstrap-table/js/bootstrap-table.js')}}"></script>
    <script src="{{asset('assets/pages/jquery.bs-table.js')}}"></script>
@stop
