@extends('template.app')

@section('content')

    <div class="login">
        <form method="post" action="/">
            <div class="login-screen">
                <div class="app-title">
                    <h1>Delete Success</h1>
                    <h3 style="color: #C9302C">Re-login</h3>
                    <h4>
                        <a class="" href="/" style="font-size: x-large;">Click Me </a>
                    </h4>
                </div>

            </div>
        </form>
        @if ($errors?? '')
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


    </div>
@endsection

