<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>Please sign the digital signature</title>
    <meta name="description" content="startupipo"/>
    <meta name="keywords" content="signature, newsig, siggy"/>
    <meta name="author" content="paihz"/>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- vector map CSS -->
    <link href="{{ asset('super/vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css') }}"
          rel="stylesheet" type="text/css"/>
    <!-- Custom CSS -->
    <link href="{{ asset('super/dist/css/style.css') }}" rel="stylesheet" type="text/css">
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
            background-color: darkgrey;
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
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="wrapper pa-0">
    <!-- Main Content -->
    <div class="page-wrapper pa-0 ma-0">
        <div class="container-fluid">
            <!-- Row -->
            <div class="table-struct full-width full-height">
                <div class="table-cell vertical-align-middle">
                    <div class="row">
                        <div class="col-lg-6 col-lg-offset-3">
                            <div class="panel panel-default card-view">
                                <div class="panel-heading">
                                    <div class="pull-left">
                                        <h6 class="panel-title txt-dark">Update your signature</h6>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="panel-wrapper collapse in">
                                    <div class="panel-body">
                                        <div id="signatureparent">
                                            <div id="signature"></div>
                                        </div>
                                        <button class="btn btn-space btn-default" type="button"
                                                onclick="$('#signature').jSignature('clear')">Clear
                                        </button>
                                        <button class="btn btn-space btn-default" type="button" id="btnSave">
                                            Confirm
                                        </button>
                                    </div>
                                </div>
                                <div id="scrollgrabber"></div>
                            </div>
                            {!! Form::open(['action' => 'AgentController@siggyAgentUpdate', 'method' => 'put']) !!}
                            <input type="hidden" id="digital_signature" name="digital_signature"/>
                            <button  type="submit" class="pull-right btn  btn-primary">Update Now</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Row -->
</div>
<!-- /#wrapper -->
<!-- JavaScript -->
<!-- jQuery -->
<script src="{{ asset('super/vendors/bower_components/jquery/dist/jquery.min.js') }}"></script>
@include('_partials_.signature')
<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('super/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('super/vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js') }}"></script>

<!-- Fancy Dropdown JS -->
<script src="{{ asset('super/dist/js/dropdown-bootstrap-extended.js') }}"></script>

</body>
</html>
