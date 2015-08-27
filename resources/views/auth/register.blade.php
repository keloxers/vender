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
                <form method="POST" action="/register">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="uk-form-row">
                        <label for="name">Nombre</label>
                        <input class="md-input" type="text" id="name" name="name" />
                    </div>
                    <div class="uk-form-row">
                        <label for="login_username">Email</label>
                        <input class="md-input" type="text" id="email" name="email" />
                    </div>
                    <div class="uk-form-row">
                        <label for="login_username">contraseña</label>
                        <input class="md-input" type="password" id="password" name="password" />
                    </div>
                    <div class="uk-form-row">
                        <label for="login_username">contraseña</label>
                        <input class="md-input" type="password" id="password_confirmation" name="password_confirmation" />
                    </div>
                    <div class="uk-margin-medium-top">
                        <button type="submit" class="md-btn md-btn-primary md-btn-block md-btn-large">Registrarse</button>
                    </div>
                </form>
            </div>
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
