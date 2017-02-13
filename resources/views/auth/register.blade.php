<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <title>Register new account</title>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css') }}"/>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('assets/lib/material-design-icons/css/material-design-iconic-font.min.css') }} "/>

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css"
          href="{{ asset('assets/lib/datetimepicker/css/bootstrap-datetimepicker.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css"/>
    <style type="text/css">
        div {
            margin-top: 1em;
            margin-bottom: 1em;
        }

        input {
            padding: .5em;
            margin: .5em;
        }

        select {
            padding: .5em;
            margin: .5em;
        }

        #signatureparent {
            color: darkblue;
            background-color: #eeeeee;
            /*max-width:600px;*/
            padding: 20px;
        }

        /*This is the div within which the signature canvas is fitted*/
        #signature {
            border: 2px dotted black;
            background-color: lightgrey;
        }

        /* Drawing the 'gripper' for touch-enabled devices */
        html.touch #content {
            float: left;
            width: 92%;
        }

        html.touch #scrollgrabber {
            float: right;
            width: 4%;
            margin-right: 2%;
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAAFCAAAAACh79lDAAAAAXNSR0IArs4c6QAAABJJREFUCB1jmMmQxjCT4T/DfwAPLgOXlrt3IwAAAABJRU5ErkJggg==)
        }

        html.borderradius #scrollgrabber {
            border-radius: 1em;
        }

    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
</head>
<body class="be-splash-screen">
<div class="be-wrapper be-login be-signup">
    <div class="be-content">
        <div class="main-content container-fluid">
            <div class="splash-container sign-up">
                <div class="panel panel-default panel-border-color panel-border-color-primary">
                    <div class="panel-heading"><img src="{{ asset('logo-xx.png') }}" alt="logo" width="338" height="70"
                                                    class="logo-img"><span class="splash-description">Please enter your user information.</span>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="POST" action="{{ url('/register') }}">
                            <span class="splash-title xs-pb-20">Sign Up</span>
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="text" name="name" required value="{{ old('name') }}"
                                       placeholder="Full name" autocomplete="off"
                                       class="form-control">
                                @if ($errors->has('name'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <input type="hidden" name="invite_id" value="0"/>
                            <div class="form-group">
                                <input type="email" name="email" value="{{ old('email') }}" required
                                       placeholder="E-mail" autocomplete="off"
                                       class="form-control">
                                @if ($errors->has('email'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <select name="gender" class="form-control">
                                    <option value="" disabled selected>Select your gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                                @if ($errors->has('gender'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group row ">
                                <div class="col-xs-6">
                                    <input type="password" required name="password" class="form-control"
                                           placeholder="Password">

                                </div>
                                <div class="col-xs-6">
                                    <input type="password" required name="password_confirmation" class="form-control"
                                           placeholder="Confirm password">
                                </div>
                            </div>
                            <input type="text" value="{{ $getAgent }}" hidden name="ref_agent">
                            @if ($errors->has('password'))
                                <span class="text-danger">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                            <hr>
                            <div class="form-group">
                                <div id="signatureparent">
                                    <div id="signature"></div>
                                    <button class="btn btn-space btn-default btn-lg" type="button"
                                            onclick="$('#signature').jSignature('clear')">Clear
                                    </button>
                                    <button class="btn btn-space btn-default btn-lg" type="button" id="btnSave">
                                        Save
                                    </button>
                                </div>
                                <input type="hidden" id="digital_signature" name="digital_signature"/>
                            </div>
                            <div id="scrollgrabber"></div>
                            @if ($errors->has('digital_signature'))
                                <span class="text-danger">
                                        <strong>{{ $errors->first('digital_signature') }}</strong>
                                    </span>
                            @endif
                            <div class="form-group xs-pt-10">
                                <div class="be-checkbox">
                                    <input type="checkbox" id="remember" name="terms">
                                    <label for="remember">By creating an account, you agree the <a href="#">terms and
                                            conditions</a>.</label>
                                </div>
                                <br>
                                <br>
                                @if ($errors->has('terms'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('terms') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group xs-pt-10">
                                <button type="submit" class="btn btn-block btn-success btn-xl">Create new account
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="splash-footer">&copy; {{ date('Y') }} {{ config('app.name') }}</div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('assets/lib/jquery/jquery.min.js') }}" type="text/javascript"></script>
@include('_partials_.signature')
<script src="{{ asset('assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js') }}"
        type="text/javascript"></script>
<script src="{{ asset('assets/js/main.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/lib/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/lib/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/lib/jquery.nestable/jquery.nestable.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/lib/moment.js/min/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/lib/datetimepicker/js/bootstrap-datetimepicker.min.js') }}"
        type="text/javascript"></script>
<script src="{{ asset('assets/lib/select2/js/select2.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/lib/bootstrap-slider/js/bootstrap-slider.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/app-form-elements.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        //initialize the javascript
        App.init();
        App.formElements();
    });
</script>
</body>
</html>
