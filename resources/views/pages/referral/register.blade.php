<!DOCTYPE html>
<!--[if lt IE 9]>
<html lang="EN" class="web ie8"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="EN" class="web"><!--<![endif]-->
<head>
    <title>Register new account</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet"
          href="{{ asset('assets/css/ref_register.css') }}" type="text/css"
          media="screen" title="default"/>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon"/>
    <script type="text/javascript"
            src="{{ asset('assets/js/ref_register.js') }}"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <![endif]-->
</head>
<body class="theme_default login ">
<div id="wrapper-top">
    <div id="header-content" class="navbar">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="sso_responsive_img header_branded_logo " id="header-logo">
                        <div class="sso_responsive_img_inner"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="jumbotron bg_branded_style bg_font">
            <div id="background-mask"></div>
        </div>
    </div>
    <div class="container dual-container">
        <div class="row">
            <div id="open-column" class="col-md-6 col-sm-5">
                <div id="open-content" style="min-height: 300px;text-align: left;padding-top: 74px;margin-right: 32px;">
                    <h2>You’ve been invite to join us</h2>
                    <p style="color: #959595;font-size: 22px;line-height: 30px;margin-top: 16px;">
                        {{ $cariInvCode->name }} invite you to join us and earn monthly profit
                    </p>
                </div>
            </div>
            <div id="panel-column" class="col-md-6 col-sm-7">
                <div id="panel-background" class="">
                    <div id="panel-shadow"></div>
                    <div id="panel-shadow-bottom"></div>
                    <div id="panel-content">
                        <div id="main-accordion">
                            <div id="loginPanel" class="panel">
                                <div id="loginCollapse" class="panel-collapse collapse in" style="height: auto;">
                                    <h2 class="panel-heading">Create new account</h2>
                                    <form  method="POST" action="{{ action('Auth\RegisterController@register') }}">
                                        {{ csrf_field() }}
                                        <div class="panel-body">
                                            <div class="frame-col">
                                                <div class="form-group">
                                                    <div class="embedded-only help-block">
                                                    </div>
                                                    <div class="control-label  ">
                                                        <label for="name">
                                                            Your name
                                                        </label>
                                                    </div>
                                                    <input class="form-control" name="name" placeholder="Glenn Quagmire"
                                                           autofocus/>
                                                    @if ($errors->has('name'))
                                                        <span class="text-danger">
                                                                    <strong>{{ $errors->first('name') }}</strong>
                                                                </span>
                                                    @endif
                                                </div>
                                                <input type="hidden" name="invite_id" value="{{ $cariInvCode->id }}"/>
                                                <div class="form-group">
                                                    <div class="control-label  ">
                                                        <label for="email">
                                                            Account email
                                                        </label>
                                                    </div>
                                                    <input class="form-control" name="email"
                                                           placeholder="yourname@mail.com"
                                                           autofocus/>
                                                    @if ($errors->has('email'))
                                                        <span class="text-danger">
                                                                    <strong>{{ $errors->first('email') }}</strong>
                                                                </span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <div class="control-label  ">
                                                        <label for="gender">
                                                            Gender
                                                        </label>
                                                    </div>
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
                                                <div class="form-group">
                                                    <div class="control-label  ">
                                                        <label for="password">
                                                            Password
                                                        </label>
                                                    </div>
                                                    <input class="form-control " name="password"
                                                           placeholder="Password" type="password"/>
                                                    @if ($errors->has('password'))
                                                        <span class="text-danger">
                                                                    <strong>{{ $errors->first('password') }}</strong>
                                                                </span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <div class="control-label  ">
                                                        <label for="password_confirmation" >
                                                            Password
                                                        </label>
                                                    </div>
                                                    <input class="form-control "
                                                           placeholder="Re-type password" name="password_confirmation" type="password"/>
                                                </div>
                                                <div class="form-group">
                                                    <!-- reCapatcha -->
                                                    <br>
                                                    <div id="capatcha pull-right">
                                                        {!! app('captcha')->display() !!}
                                                        @if ($errors->has('g-recaptcha-response'))
                                                            <span class="text-danger"> <strong>{{ $errors->first('g-recaptcha-response') }}</strong> </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group text-left">
                                                <p class="smallest-text terms text-left" style="margin-top: 10px;">
                                                    <input type="checkbox" id="" name="terms">  I have read and agree to the <a href="#">Privacy Policy</a><br>
                                                    @if ($errors->has('terms'))
                                                        <span class="text-danger">
                                                                    <strong>{{ $errors->first('terms') }}</strong>
                                                                </span>
                                                    @endif
                                                </p>
                                                <button type="submit" class="btn btn-lg btn-block-sm">Create acccount</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="clearfix panel-footer">
                                        <p><b>Already have account?</b><br/>
                                            It's required to access your dashboard.</p>
                                        <a href="{{ route('login') }}">Login</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="wrapper-bottom">
    <div id="footer-content">
        <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div>
                    <div class="pull-left">Powered by&nbsp;</div>
                    <div class="sso_responsive_img sprite1_symantec_logo1 pull-left" id="footer-logo">
                        <div class="sso_responsive_img_inner"></div>
                    </div>
                    <div class="pull-left">&nbsp;&copy;{{ date('Y') }}&nbsp;&nbsp;&nbsp;</div>
                </div>
                <ul id="footer-links">
                    <li>
                        <a target="_blank"
                           href="#">
                            &nbsp;Privacy Policy&nbsp;</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>
