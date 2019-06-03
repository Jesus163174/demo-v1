{{--<!DOCTYPE html>
<html lang="en">
<head>
    <title>Inusual Admin</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="https://image.flaticon.com/icons/svg/1069/1069102.svg"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="template_login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="template_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="template_login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="template_login/vendor/animate/animate.css">
    <!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="template_login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="template_login/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="template_login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="template_login/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="template_login/css/util.css">
    <link rel="stylesheet" type="text/css" href="template_login/css/main.css">
    <!--===============================================================================================-->
</head>
<body>

    <div class="limiter">
        <div class="container-login100" >
            <div class="wrap-login100" style="box-shadow: 1px 1px 5px  #000 !important">
                <div class="login100-form-title" style="background-image: url(http://refaccionesitalika.com.mx/imagenes/logo.jpg);">
                    <span class="login100-form-title-1">
                        ACCEDER AL SISTEMA
                    </span>
                </div>

                <form method="POST" action="{{ route('login') }}" class="login100-form validate-form">
                    @csrf
                    <div class="wrap-input100 validate-input m-b-26" data-validate="El correo es requerido">
                        <span class="label-input100">Correo</span>
                        <input class="input100 {{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" name="email" value="{{ old('email') }}" autofocus placeholder="Ingresa tu correo">
                        <span class="focus-input100"></span>
                    </div>
                    @if ($errors->has('email'))
                        <span style=" color: red;  font-size: 12px;" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif

                    <div class="wrap-input100 validate-input m-b-18" data-validate="La contraseña es requerido">
                        <span class="label-input100">Contraseña</span>
                        <input class="input100" type="password" name="password" placeholder="Ingresa tu contraseña">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="flex-sb-m w-full p-b-30">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                            <label class="label-checkbox100" for="ckb1">
                                Recuerdame
                            </label>
                        </div>

                        <div>
                            <a href="#" class="txt1">
                             ¿Olvidaste tu contraseña?
                         </a>
                     </div>
                 </div>

                 <div class="container-login100-form-btn" >
                    <button style="width: 100%;" type="submit" class="login100-form-btn">
                        Acceder
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--===============================================================================================-->
<script src="template_login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="template_login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="template_login/vendor/bootstrap/js/popper.js"></script>
<script src="template_login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="template_login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="template_login/vendor/daterangepicker/moment.min.js"></script>
<script src="template_login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="template_login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="template_login/js/main.js"></script>

</body>
</html>--}}
<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="UTF-8">
        <title>Acceder | Inusual Admin</title>
        <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
        <link rel="stylesheet" href="template_login/css/style.css">
    </head>
    <body>
        <div class="form">
            <ul class="tab-group">
                <li class="tab active"><a href="#signup">Acerca de</a></li>
                <li class="tab"><a href="#login">Acceder</a></li>
            </ul>
            <div class="tab-content">
                <div id="signup">
                    <h1>Inusual Admin v2.0</h1>
                    
                </div>
                <div id="login">
                    <h1>Bienvenido a Inusual Admin!</h1>
                    <form method="POST" action="{{ route('login') }}" class="login100-form validate-form">
                        @csrf
                        <div class="field-wrap">
                            <label>
                            Direccion de correo<span class="req">*</span>
                            </label>
                            <input type="email" name="email" value="{{ old('email') }}" required autocomplete="off"/>
                            @if ($errors->has('email'))
                                <span style=" color: red;  font-size: 12px;" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="field-wrap">
                            <label>
                            Contraseña<span class="req">*</span>
                            </label>
                            <input type="password" name="password" required autocomplete="off"/>
                        </div>
                        <p class="forgot"><a href="#">¿Olvidaste tu contraseña?</a></p>
                        <button type="submit" class="button button-block"/>Acceder</button>
                    </form>
                </div>
            </div>
            <!-- tab-content -->
        </div>
        <!-- /form -->
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script  src="template_login/js/index.js"></script>
    </body>
</html>





