@extends('template.app')

@section('content')

{{--    <script>--}}
{{--        var msg = '{{Session::get('alert')}}';--}}
{{--        var exist = '{{Session::has('alert')}}';--}}
{{--        if(exist){--}}
{{--            alert(msg);--}}
{{--        }--}}
{{--    </script>--}}


{{--is partially working below one--}}
{{--    @if(Session::has('message'))--}}
{{--        <p >{{ Session::get('message') }}</p>--}}
{{--    @endif--}}





    <div class="login">
    <form method="post" action="/webLogin">
        <div class="login-screen">
            <div class="app-title">
                <h1>Welcome To</h1>
                <h2>Academy of Culinary Arts</h2>
            </div>

            <div class="login-form">
                <div class="control-group">
                    @csrf<input type="text" class="login-field" name="username" value="" placeholder="username" id="login-name"/>
                    <label class="login-field-icon fui-user" for="login-name"></label>
                </div>

                <div class="control-group">
                    @csrf<input type="password" class="login-field" name="password" value="" placeholder="password" id="login-pass"/>
                    <label class="login-field-icon fui-lock" for="login-pass"></label>
                </div>

{{--                @if ($input->username == "samyush" && $input->password == '123123')--}}
{{--               error one <a class="btn btn-primary btn-large btn-block"  type="submit">login</a>--}}
                <input type="submit"/>
{{--                <a class="btn btn-primary btn-large btn-block"  href='/uploadFilePage'>login</a>--}}
                <a class="login-link" href="mailto:samyush@samyush.com.np?subject=Forgot Password">Forgot password?</a>
            </div>
        </div>
    </form>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

        @if(Session::has('jsAlert'))

            <script type="text/javascript" >
                alert({{ session()->get('jsAlert') }});
            </script>

        @endif
    </div>


