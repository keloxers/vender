<!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>VirasoroVirtual</title>

    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500' rel='stylesheet' type='text/css'>

    <!-- uikit -->
    <link rel="stylesheet" href="bower_components/uikit/css/uikit.almost-flat.min.css"/>

    <!-- altair admin login page -->
    <link rel="stylesheet" href="assets/css/login_page.min.css" />

</head>
<body class="login_page">

    <div class="login_page_wrapper">
        <div class="md-card" id="login_card">
            <div class="md-card-content large-padding" id="login_form">
                <div class="login_heading">
                    <div class="user_avatar"></div>
                </div>
                <form method="POST" action="/login">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="uk-form-row">
                        <label for="login_username">Email</label>
                        <input class="md-input" type="text" id="email" name="email" />
                    </div>
                    <div class="uk-form-row">
                        <label for="login_username">Password</label>
                        <input class="md-input" type="password" id="password" name="password" />
                    </div>
                    <div class="uk-margin-medium-top">
                        <button type="submit" class="md-btn md-btn-primary md-btn-block md-btn-large">Ingresar</button>
                    </div>
                    <div class="uk-margin-top">
                        <span class="icheck-inline">
                            <!-- <input type="checkbox" name="remember" id="remember" data-md-icheck />
                            <label for="login_page_stay_signed" class="inline-label">Recordar</label> -->

                            <a href="/register">Eres nuevo ? registrate gratis !</a>

                        </span>
                    </div>
                </form>
            </div>
            <div class="md-card-content large-padding uk-position-relative" id="login_help" style="display: none">
                <button type="button" class="uk-position-top-right uk-close uk-margin-right uk-margin-top" id="login_help_close"></button>
                <h2 class="heading_b uk-text-success">No puedes iniciar sesión ?</h2>
                <p>Aquí está la información para que todo vuelva a funcionar lo antes posible.</p>
                <p>En primer lugar, trate de lo más sencillo: si usted recuerda su contraseña, pero no está funcionando, asegúrese de que Bloq Mayús este apagado, y que su nombre de usuario este escrito correctamente, y vuelva a intentarlo.</p>
                <p>Si la contraseña sigue sin funcionar, es el momento de <a href="#" id="login_password_reset_show">Restablecer su contraseña</a>.</p>
            </div>
            <div class="md-card-content large-padding" id="login_password_reset" style="display: none">
                <h2 class="heading_a uk-margin-large-bottom">Restablecer su contraseña</h2>
                <form method="POST" action="/password/email">
                    <div class="uk-form-row">
                        <label for="login_email_reset">Su direccion de email</label>
                        <input class="md-input" type="text" id="login_email_reset" name="login_email_reset" />
                    </div>
                    <div class="uk-margin-medium-top">
                        <button class="md-btn md-btn-primary md-btn-block">Restablecer su contraseña</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="uk-margin-top">
            <a href="#" id="login_help_show">Necesitas ayuda?</a>
        </div>
    </div>

    <!-- common functions -->
    <script src="assets/js/common.min.js"></script>
    <!-- altair core functions -->
    <script src="assets/js/altair_admin_common.min.js"></script>

    <!-- altair login page functions -->
    <script src="assets/js/pages/login_page.min.js"></script>

</body>
</html>
