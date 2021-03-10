<!doctype html>
<html>
<head>
    <title>Import CSV Data to MySQL database with Laravel</title>
</head>
<body>
<!-- Message -->
@if(Session::has('message'))
    <p >{{ Session::get('message') }}</p>
@endif

<!-- Form -->
<form method='post' action='/uploadFile' enctype='multipart/form-data' >
    {{ csrf_field() }}
    <input type='file' name='file' >
    <input type='submit' name='submit' value='Import'>
</form>
</body>
</html>
