@extends('layouts.admin')

@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @elseif(Session::has('danger'))
        <div class="alert alert-danger">{{ Session::get('danger') }}</div>
    @endif
    <div class="row">
        <div class="col-sm-4 ">
            {!! Form::open(['method'=>'post','action'=>'AdminCategoriesController@store','files'=>true]) !!}

            <div class="form-group">
                {!! Form::label('name','Category:') !!}
                {!! Form::text('name',null,['class'=>'form-control','required']) !!}
            </div>

                {!! Form::label('image','Image:') !!}
                {!! Form::file('image',null,['class'=>'form-control','required']) !!}
            </div>



    </div>

            {!! Form::label('image','Image:') !!}

            </div>

            <div class="form-group">
                {!! Form::submit('Create',['class'=>'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}



    <div class="col-sm-8 card-box ">

            <h4 class="m-t-0 header-title"><b>All Categories: {{$categories->count()}}</b></h4>

            @if($categories->count()!==0)
                <table data-toggle="table"
                       data-search="true"
                       data-show-columns="true"
                       data-sort-name="id"
                       data-page-list="[5, 10, 20]"
                       data-page-size="5"
                       data-pagination="true" data-show-pagination-switch="true" class="table-bordered">
                    <thead>
                    <tr>
                        <th data-field="image" >image</th>
                        <th data-field="category" >Category</th>

                        <th data-field="Actions" data-align="center">Actions</th>
                    </tr>
                    </thead>


                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td><img style=" width: 200px" src="{{asset('categories/'.$category->image)}}" alt=""></td>
                            <td>{{$category->name}}</td>

                            <td class="actions">
                                <a class="btn btn-primary" data-toggle="modal" data-target=".{{$category['id'].'edit'}}" >Edit</a>
                                <a class="btn btn-danger" data-toggle="modal" data-target=".{{$category['id'].'delete'}}" >delete</a>
                            </td>
                        </tr>
                        {{--Modal for City delete--}}
                        <div class="modal fade {{$category['id'].'delete'}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title mt-0" style="color: red">Do You Wanna Delete This Category</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">
                                        {!! Form::open(['method'=>'Delete','action'=>['AdminCategoriesController@destroy',$category['id']]]) !!}
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                        <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                                        {!! Form::close() !!}
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        {{--End Modal for city delete--}}
                        {{--Modal for City edit--}}

                        <div class="modal fade {{$category['id'].'edit'}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">
                                        {!! Form::model($category,['method'=>'PATCH','action'=>['AdminCategoriesController@update',$category['id']],'files'=>true]) !!}
                                        <div class="form-group">
                                            {!! Form::label('category','Category:') !!}
                                            {!! Form::text('name',null,['class'=>'form-control'],'required') !!}
                                        </div>

                                        <div class="form-group">
                                            {!! Form::label('Image','Image:') !!}
                                            {!! Form::file('image',null,['class'=>'form-control'],'required') !!}
                                        </div>

                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                                        {!! Form::close() !!}
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        {{--End Modal for city edit--}}

                    @endforeach
                    </tbody>
                </table>

            @endif
        </div>
    </div>
@stop
@section('scripts')
    <script src="{{asset('assets/plugins/bootstrap-table/js/bootstrap-table.js')}}"></script>
    <script src="{{asset('assets/pages/jquery.bs-table.js')}}"></script>
@stop


