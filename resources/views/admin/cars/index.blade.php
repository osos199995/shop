@extends('layouts.admin')

@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @elseif(Session::has('danger'))
        <div class="alert alert-danger">{{ Session::get('danger') }}</div>
    @endif
    <div class="row">
        <div class="col-sm-6 ">
            {!! Form::open(['method'=>'post','action'=>'AdminCarsController@store','files'=>true]) !!}

            <div class="form-group">
                {!! Form::label('name','cars:') !!}
                {!! Form::text('name',null,['class'=>'form-control','required']) !!}
            </div>

            <div>
                {!! Form::label('price','price:') !!}
                {!! Form::text('price',null,['class'=>'form-control','required']) !!}
            </div>
            <div>
                {!! Form::label('description','description:') !!}
                {!! Form::textarea('description',null,['class'=>'form-control','required','id'=>'elm1']) !!}
            </div>
            <div>
                {!! Form::label('model','model:') !!}
                {!! Form::selectRange('model', 1950, 2018) !!}

            </div>
            <div class="form-group">
                {!! Form::label('category','category') !!}
                <select name="category_id"   class="form-control">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>

            <div>
                {!! Form::label('image','Image:') !!}
                {!! Form::file('image',null,['class'=>'form-control','required']) !!}
                {!! Form::submit('Create',['class'=>'btn btn-primary']) !!}
            </div>
        </div>



        {!! Form::close() !!}
    </div>
    </div>
    <div class="col-sm-12 card-box ">

        <h4 class="m-t-0 header-title"><b>All Categories: {{$cars->count()}}</b></h4>

        @if($cars->count()!==0)
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
                    <th data-field="name" >cars</th>
                    <th data-field="price" >price</th>
                    <th data-field="model" >model</th>
                    <th data-field="description" >description</th>
                    <th data-field="category" >category</th>
                    <th data-field="Actions" data-align="center">Actions</th>
                </tr>
                </thead>


                <tbody>
                @foreach($cars as $car)
                    <tr>
                        <td><img style=" width: 200px" src="{{asset('cars/'.$car->image)}}" alt=""></td>
                        <td>{{$car->name}}</td>
                        <td>{{$car->price}}</td>
                        <td>{{$car->model}}</td>
                        <td>{{$car->description}}</td>
                        @if(isset($car->categories->name))
                        <td>{{$car->categories->name}}</td>
                        @else
                        <td></td>
                        @endif
                        <td class="actions">
                            <a class="btn btn-primary" data-toggle="modal" data-target=".{{$car['id'].'edit'}}" >Edit</a>
                            <a class="btn btn-danger" data-toggle="modal" data-target=".{{$car['id'].'delete'}}" >delete</a>
                        </td>
                    </tr>
                    Modal for City delete
                    <div class="modal fade {{$car['id'].'delete'}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title mt-0" style="color: red">Do You Wanna Delete This Category</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                    {!! Form::open(['method'=>'Delete','action'=>['AdminCarsController@destroy',$car['id']]]) !!}
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                    <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    {!! Form::close() !!}
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                    End Modal for city delete
                    Modal for City edit

                    <div class="modal fade {{$car['id'].'edit'}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                    {!! Form::model($car,['method'=>'PATCH','action'=>['AdminCarsController@update',$car['id']],'files'=>true]) !!}
                                    <div class="form-group">
                                        {!! Form::label('name','cars:') !!}
                                        {!! Form::text('name',null,['class'=>'form-control','required']) !!}
                                    </div>

                                    <div>
                                        {!! Form::label('price','price:') !!}
                                        {!! Form::text('price',null,['class'=>'form-control','required']) !!}
                                    </div>
                                    <div>
                                        {!! Form::label('description','description:') !!}
                                        {!! Form::textarea('description',null,['class'=>'form-control','required','id'=>'elm1']) !!}
                                    </div>
                                    <div>
                                        {!! Form::label('model','model:') !!}
                                        {!! Form::selectRange('model', 1950, 2018) !!}

                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('category','category') !!}
                                        <select name="category_id"   class="form-control">
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
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
                    End Modal for city edit

                @endforeach
                </tbody>
            </table>

        @endif
    </div>
    </div>
@stop



@section('scripts')
    <!-- Wysiwig js-->
    <script src="{{asset('assets/plugins/bootstrap-table/js/bootstrap-table.js')}}"></script>
    <script src="{{asset('assets/pages/jquery.bs-table.js')}}"></script>
    <script src="{{asset('admin_assets/plugins/tinymce/tinymce.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            if($("#elm1").length > 0){
                tinymce.init({
                    selector: "textarea#elm1",
                    theme: "modern",
                    height:300,
                    plugins: [
                        "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                        "save table contextmenu directionality emoticons template paste textcolor"
                    ],
                    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
                    style_formats: [
                        {title: 'Bold text', inline: 'b'},
                        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                        {title: 'Example 1', inline: 'span', classes: 'example1'},
                        {title: 'Example 2', inline: 'span', classes: 'example2'},
                        {title: 'Table styles'},
                        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                    ]
                });
            }
        });
    </script>


@stop