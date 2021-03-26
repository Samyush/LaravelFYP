<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ACA FYP</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-default navbar-ststic-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{route('post.index')}}">Final Year Project, ACA 18030828</a>
        </div>
    </div>
</nav>
<div class="container">
    @yield('content')
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript">
    {{-- ajax Form Add Post--}}
    $(document).on('click','.create-modal', function() {
        $('#create').modal('show');
        $('.form-horizontal').show();
        $('.modal-title').text('Add Post');
    });
    $("#add").click(function() {
        $.ajax({
            type: 'POST',
            url: 'addPost',
            data: {
                '_token': $('input[name=_token]').val(),
                'name': $('input[name=names]').val(),
                'email': $('input[name=email]').val(),
                'password': $('input[name=password]').val(),

            },
            success: function(data){
                if ((data.errors)) {
                    $('.error').removeClass('hidden');
                    $('.error').text(data.errors.title);
                    $('.error').text(data.errors.body);
                } else {
                    $('.error').remove();
                    $('#table').append("<tr class='post" + data.id + "'>"+
                        "<td>" + data.id + "</td>"+
                        "<td>" + data.name + "</td>"+
                        "<td>" + data.email + "</td>"+
                        "<td>" + data.password + "</td>"+
                        "<td> </td>"+
                        "<td> </td>"+
                        "<td><button class='show-modal btn btn-info btn-sm' data-id='" + data.id + "' data-title='" + data.title + "' data-body='" + data.body + "'><span class='fa fa-eye'></span></button> <button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-title='" + data.title + "' data-body='" + data.body + "'><span class='glyphicon glyphicon-pencil'></span></button> <button class='delete-modal btn btn-danger btn-sm' data-id='" + data.id + "' data-title='" + data.title + "' data-body='" + data.body + "'><span class='glyphicon glyphicon-trash'></span></button></td>"+
                        "</tr>");
                }
            },
        });
        $('#name').val('');
        $('#email').val('');
        $('#password').val('');

    });

    // function Edit POST
    $(document).on('click', '.edit-modal', function() {
        $('#footer_action_button').text(" Update Post");
        $('#footer_action_button').addClass('glyphicon-check');
        $('#footer_action_button').removeClass('glyphicon-trash');
        $('.actionBtn').addClass('btn-success');
        $('.actionBtn').removeClass('btn-danger');
        $('.actionBtn').addClass('edit');
        $('.modal-title').text('Post Edit');
        $('.deleteContent').hide();
        $('.form-horizontal').show();
        $('#fid').val($(this).data('id'));
        $('#t').val($(this).data('name'));
        $('#b').val($(this).data('email'));
        $('#p').val($(this).data('password'));
        $('#myModal').modal('show');
    });

    $('.modal-footer').on('click', '.edit', function() {
        $.ajax({
            type: 'POST',
            url: 'editPost',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $("#fid").val(),
                'name': $('#t').val(),
                'email': $('#b').val(),
                'password': $('#p').val(),

            },
            success: function(data) {
                $('.post' + data.id).replaceWith(" "+
                    "<tr class='post" + data.id + "'>"+
                    "<td>" + data.id + "</td>"+
                    "<td>" + data.name + "</td>"+
                    "<td>" + data.email + "</td>"+
                    "<td>" + data.password + "</td>"+
                    "<td>" + data.happy + "</td>"+
                    "<td>" + data.rating + "</td>"+
                    "<td><button class='show-modal btn btn-info btn-sm' data-id='" + data.id + "' data-title='" + data.title + "' data-body='" + data.body + "'><span class='fa fa-eye'></span></button> <button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-title='" + data.title + "' data-body='" + data.body + "'><span class='glyphicon glyphicon-pencil'></span></button> <button class='delete-modal btn btn-danger btn-sm' data-id='" + data.id + "' data-title='" + data.title + "' data-body='" + data.body + "'><span class='glyphicon glyphicon-trash'></span></button></td>"+
                    "</tr>");
            }
        });
    });

    // form Delete function
    $(document).on('click', '.delete-modal', function() {
        $('#footer_action_button').text(" Delete");
        $('#footer_action_button').removeClass('glyphicon-check');
        $('#footer_action_button').addClass('glyphicon-trash');
        $('.actionBtn').removeClass('btn-success');
        $('.actionBtn').addClass('btn-danger');
        $('.actionBtn').addClass('delete');
        $('.modal-title').text('Delete Post');
        $('.id').text($(this).data('id'));
        $('.deleteContent').show();
        $('.form-horizontal').hide();
        $('.title').html($(this).data('title'));
        $('#myModal').modal('show');
    });

    $('.modal-footer').on('click', '.delete', function(){
        $.ajax({
            type: 'POST',
            url: 'deletePost',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('.id').text()
            },
            success: function(data){
                $('.post' + $('.id').text()).remove();
            }
        });
    });

    // Show function
    $(document).on('click', '.show-modal', function() {
        $('#show').modal('show');
        $('#i').text($(this).data('id'));
        $('#ti').text($(this).data('title'));
        $('#by').text($(this).data('body'));
        $('#pa').text($(this).data('password'));

        $('.modal-title').text('Show Post');
    });
</script>

<script>
    const msg = '{{Session::get('alert')}}';
    const exist = '{{Session::has('alert')}}';
    if(exist){
        alert(msg);
    }
</script>
</body>
</html>
