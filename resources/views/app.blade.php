<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />   
    <link rel="shortcut icon" href="assets/img/favicon.ico" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <base href="{{url('/')}}">
    <title>DuoSystem</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="orange" data-image="">
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="" class="simple-text">
                    Controle de Atividades
                </a>
            </div>
            <ul class="nav">                        
                <li class="">
                    <a href="{{ url('/') }}">
                        <i class="pe-7s-note2"></i>
                        <p>Listar Atividades</p>
                    </a>
                </li> 
                <li class="">
                    <a href="{{ url('/') }}/cadastro">
                        <i class="pe-7s-plus"></i>
                        <p>Cadastrar Atividades</p>
                    </a>
                </li>
                <li class="active-pro">
                    <a href="">
                        <i class="pe-7s-hourglass"></i>
                        <p>Pendencias: <strong style="color: red">{{$pendencias}}</strong></p>                        
                    </a>
                </li>                        
            </ul>
        </div>
    </div>

    <div class="main-panel">
       
        @yield('content')

    </div>
</div>
</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Checkbox, Radio & Switch Plugins -->
    <script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

    <!--  Charts Plugin -->
    <script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="assets/js/light-bootstrap-dashboard.js"></script>

    <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
    <script src="assets/js/demo.js"></script>

    <script src="assets/js/app.js"></script>

</html>
