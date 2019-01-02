@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="widget-panel widget-style-2 bg-white">
                    <i class="fa fa-newspaper-o text-primary"></i>
                    <h2 class="m-0 text-danger counter font-600">{{$categories->count()}}</h2>
                    <div class="text-muted m-t-5">categories</div>
                </div>
            </div>

            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="widget-panel widget-style-2 bg-white">
                    <i class="fa fa-pencil-square-o text-custom"></i>
                    <h2 class="m-0 text-danger counter font-600">{{$cars->count()}}</h2>
                    <div class="text-muted m-t-5">subcategories</div>
                </div>
            </div>


            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="widget-panel widget-style-2 bg-white">
                    <i class="fa fa-book text-custom"></i>
                    {{--<h2 class="m-0 text-danger counter font-600">{{$contacts->count()}}</h2>--}}
                    <div class="text-muted m-t-5">contacts</div>
                </div>
            </div>
        </div>







            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="widget-panel widget-style-2 bg-white">
                    <i class="fa fa-users text-custom"></i>
                    {{--<h2 class="m-0 text-danger counter font-600">{{$user->count()}}</h2>--}}
                    <div class="text-muted m-t-5">Clients</div>
                </div>
            </div>
        </div>
    </div>

    {{--@if (Session::has('success'))--}}
        {{--<div class="alert alert-success">{{ Session::get('success') }}</div>--}}
    {{--@elseif(Session::has('danger'))--}}
        {{--<div class="alert alert-danger">{{ Session::get('danger') }}</div>--}}
    {{--@endif--}}
    {{--{!! Form::model(Auth::user(),['method'=>'PATCH','action'=>['AdminUsersController@update',Auth::id()],'files'=>true]) !!}--}}
    {{--<div class="form-group">--}}
        {{--{!! Form::label('Name','name') !!}--}}
        {{--{!! Form::text('name',null,['class'=>'form-control','required']) !!}--}}
    {{--</div>--}}
    {{--<div class="form-group">--}}
        {{--{!! Form::label('Email','E-mail') !!}--}}
        {{--{!! Form::text('email',null,['class'=>'form-control','required']) !!}--}}
    {{--</div>--}}
    {{--<div class="form-group">--}}
        {{--{!! Form::label('password','Password') !!}--}}
        {{--{!! Form::text('password','',['class'=>'form-control','required']) !!}--}}
    {{--</div>--}}

    {{--<button class="btn btn-success">Update</button>--}}
    {{--<button class="btn btn-default" data-dismiss="modal" >Cancel</button>--}}
    {{--{!! Form::close() !!}--}}
@stop

