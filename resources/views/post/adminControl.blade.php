{{-- calling layouts \ app.blade.php --}}
@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Academy of Culinary Arts Student Data (CRUD => Ajax)</h1>
        </div>
    </div>

    <div class="row">
        <div class="table table-responsive">
            <table class="table table-bordered" id="table">
                <tr>
                    <th width="10px">No</th>
                    <th >Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Happy</th>
                    <th>Ratings</th>
                    <th>Year</th>
                    {{--                    <th>Create At</th>--}}
                    <th class="text-center" width="150px">
                        Edit Panel

{{--                        dont know how the button functions of below--}}
{{--                        <a href="#" class="create-modal btn btn-success btn-sm">--}}
{{--                            <i class="glyphicon glyphicon-plus"></i>--}}
{{--                        </a>--}}
                    </th>
                </tr>
                {{ csrf_field() }}
                <?php  $no=1; ?>
                @foreach ($post as $value)
                    <tr class="post{{$value->id}}">
                        <td>{{ $no++ }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->email }}</td>
                        <td>secure</td>

                        {{--                        this here shows password in encrypted form but is removed as per told by supervisor--}}
{{--                        <td>{{ $value->password}}</td>--}}
                        <td>{{ $value->happy }}</td>
                        <td>{{ $value->rating }}</td>
                        <td>{{ $value->year_id }}</td>

                        {{--                        <td>{{ $value->created_at }}</td>--}}
                        <td>
                            <a href="#" class="show-modal btn btn-info btn-sm" data-id="{{$value->id}}" data-title="{{$value->name}}" data-body="{{$value->email}}">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="#" class="edit-modal btn btn-warning btn-sm" data-id="{{$value->id}}" data-title="{{$value->name}}" data-body="{{$value->email}}">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </a>
                            <a href="#" class="delete-modal btn btn-danger btn-sm" data-id="{{$value->id}}" data-title="{{$value->title}}" data-body="{{$value->body}}">
                                <i class="glyphicon glyphicon-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        {{$post->links()}}
    </div>
    {{-- Modal Form Create Post --}}
    <div id="create" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group row add">
                            <label class="control-label col-sm-2" for="title">Name :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="names"
                                       placeholder="Please enter name" required>
                                <p class="error text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="body">email :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="email" name="email"
                                       placeholder="Please enter email" required>
                                <p class="error text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="body">phone:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="password" name="password"
                                       placeholder="Phone number is passcode" required>
                                <p class="error text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-warning" type="submit" id="add">
                        <span class="glyphicon glyphicon-plus"></span>Save Data
                    </button>
                    <button class="btn btn-warning" type="button" data-dismiss="modal">
                        <span class="glyphicon glyphicon-remobe"></span>Close
                    </button>
                </div>
            </div>
        </div>
    </div></div>
    {{-- Modal Form Show POST --}}
    <div id="show" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">ID :</label>
                        <b id="i"/>
                    </div>
                    <div class="form-group">
                        <label for="">Name :</label>
                        <b id="ti"/>
                    </div>
                    <div class="form-group">
                        <label for="">Email :</label>
                        <b id="by"/>
                    </div>
                    <div class="form-group">
                        <label for="">Pass : Secure</label>
                        <b id="pa"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Form Edit and Delete Post --}}
    <div id="myModal"class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="modal">
                        <div class="form-group">
                            <label class="control-label col-sm-2"for="id">ID</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="fid" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2"for="title">Name</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="t">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2"for="body">Email</label>
                            <div class="col-sm-10">
                                <textarea type="name" class="form-control" id="b"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2"for="body">Password</label>
                            <div class="col-sm-10">
                                <textarea type="name" class="form-control" id="p"></textarea>
                            </div>
                        </div>
{{--                        for year--}}
{{--                        other functions are to be in layouts->app.blade.php inside scripts--}}
                        <div class="form-group">
                            <label class="control-label col-sm-2"for="body">Year</label>
                            <div class="col-sm-10">
                                <textarea type="name" class="form-control" id="y"></textarea>
                            </div>
                        </div>
                    </form>
                    {{-- Form Delete Post --}}
                    <div class="deleteContent">
                        Are You sure want to delete <span class="title"></span>?
                        <span class="hidden id"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn actionBtn" data-dismiss="modal">
                        <span id="footer_action_button" class="glyphicon"></span>
                    </button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                        <span class="glyphicon glyphicon"></span>close
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
