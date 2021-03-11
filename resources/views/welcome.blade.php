@extends('template.app')

@section('content')

    <div class="login">
        <div class="login-screen">
            <div class="app-title">
                <h1>Welcome To</h1>
                <h2>Academy of Culinary Arts</h2>
            </div>

            <div class="login-form">
                <div class="control-group">
                    <input type="text" class="login-field" value="" placeholder="username" id="login-name"/>
                    <label class="login-field-icon fui-user" for="login-name"></label>
                </div>

                <div class="control-group">
                    <input type="password" class="login-field" value="" placeholder="password" id="login-pass"/>
                    <label class="login-field-icon fui-lock" for="login-pass"></label>
                </div>

                <a class="btn btn-primary btn-large btn-block"  href='/uploadFilePage'>login</a>
                <a class="login-link" href="mailto:samyush@samyush.com.np?subject=Forgot Password">Forgot password?</a>
            </div>
        </div>
    </div>

