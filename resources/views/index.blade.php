@extends('template.app')
    @section('content')

<div class="login">
<!-- Message -->
@if(Session::has('message'))
    <p style="color: crimson">{{ Session::get('message') }}</p>
@endif

<!-- Form -->
<h1>Hello Admin!!!</h1>
<br>
<h3>Please Upload the CSV File of All our Students</h3>
<form method='post' action='/uploadFile' enctype='multipart/form-data' >
    {{ csrf_field() }}
    <input type='file' name='file' >
    <input type='submit' name='submit' value='Import' style="background-color: #B0CE5F">

</form>

    <form method="get" action="/post" enctype='multipart/form-data'>
        <input type='submit' name='submit' value='See All Data' style="background-color: #E1EDB0">

    </form>

    <form method="post" action="/api/delete" enctype='multipart/form-data'>
{{--        {{ csrf_field() }}--}}
        <i class="glyphicon glyphicon-plus"></i>

        <input type='submit' name='submit' value='Delete All Data' style="background-color: #F0585B">
    </form>



</div>
