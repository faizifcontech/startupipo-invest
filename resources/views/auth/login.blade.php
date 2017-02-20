<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <title>Sign In</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css') }}"/>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('assets/lib/material-design-icons/css/material-design-iconic-font.min.css') }} "/>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css"/>
</head>
<body class="be-splash-screen">
<div class="be-wrapper be-login">
    <div class="be-content">
        <div class="main-content container-fluid">
            <div class="splash-container">
                @if(Session::has('error'))
                    <div class="form-group ">
                        <div role="alert" class="alert alert-danger alert-icon alert-dismissible">
                            <div class="icon"><span class="mdi mdi-close-circle-o"></span></div>
                            <div class="message text-center">
                                <button type="button" data-dismiss="alert" aria-label="Close" class="close"><span aria-hidden="true"
                                                                                                                  class="mdi mdi-close"></span>
                                </button>{{ session('error') }}
                            </div>
                        </div>
                    </div>
                @endif
                <div class="panel panel-default panel-border-color panel-border-color-primary">
                    <div class="panel-heading"><img src="{{ asset('logo-xx.png') }}" alt="logo" width="338" height="70"
                                                    class="logo-img"><span class="splash-description">Please enter your user information.</span>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="POST" action="{{ url('/login') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="login-form">
                                <div class="form-group">
                                    <input id="email" type="email" class="form-control" placeholder="Your email" name="email" value="{{ old('email') }}" required autofocus>
                                    @if ($errors->has('email'))
                                        <div style="color: #c12e2a;padding-top: 5px;">
                                            <strong>{{ $errors->first('email') }}</strong>
                                          </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input id="password" placeholder="Password" type="password" class="form-control" name="password" required>
                                    @if ($errors->has('password'))
                                        <div style="color: #c12e2a;padding-top: 5px;">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group row login-tools">
                                    <div class="col-xs-6 login-remember">
                                        <div class="be-checkbox">
                                            <input type="checkbox" name="remember" id="remember">
                                            <label for="remember">Remember Me</label>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 login-forgot-password"> <a  href="{{ url('/password/reset') }}">
                                            Forgot Your Password?
                                        </a></div>
                                </div>
                                <div class="form-group row login-submit">
                                    <div class="col-xs-23">
                                        <button type="submit" class="btn btn-primary btn-xl">Sign
                                            in
                                        </button>
                                    </div>
                                </div>
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
<script src="{{ asset('assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/main.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/lib/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        //initialize the javascript
        App.init();
    });
</script>
</body>
</html>
