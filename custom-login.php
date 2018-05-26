<?php

// Personalizar login
function my_custom_login_page_css() {
  echo '
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
      <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <script>
      $(function(){
        $("#user_login").prop("type", "email");
        $("#user_login").prop("required", true);
        $("#rememberme").prop("checked", true);
        $("#user_login").prop("placeholder", "Correo electrónico");
        $("#user_pass").prop("placeholder", "Contraseña");
        $("#user_pass").prop("required", true);
      });
    </script>
      <style>
      * { box-shadow: none !important; outline: none !important; text-shadow: none !important; text-decoration: none; background: #ffffff !important;}
      body { color: #444444; }
      p#nav, .wp-core-ui .button-primary, #backtoblog, .login .message, label[for=rememberme], input[type=checkbox] { display: none !important;}
      .login #login_error { border-left-color: transparent; color: red !important; }
      #login h1 a { text-transform: capitalize; height: auto; background-image: none !important; text-indent: unset; width: max-content; }
      input[type=text], input[type=password], input[type=email] { border-width: 0px 0px 1px 0px; border-color: #999; width: 100%; font-size: 15px !important;}
      input[type=text]:focus, input[type=password]:focus, input[type=email]:focus { border-color: #999999; }
      ::-webkit-input-placeholder { color: #999999; font-size: 15px;}
      :-moz-placeholder { color: #999999; opacity: 1; font-size: 15px;}
      ::-moz-placeholder { color: #999999; opacity: 1; font-size: 15px;}
      :-ms-input-placeholder { color: #999999; font-size: 15px;}
      ::-ms-input-placeholder { color: #999999; font-size: 15px;}
      #login { width: 400px; max-width: 100%; margin:100px auto; }
      input#user_login, input#user_pass { height: 30px; position: relative; margin-top: -25px; display: block; margin-bottom: 50px; position: relative; z-index: 2;}
      label[for=user_login], label[for=user_pass] { color: transparent; }
      label[for=user_login]:before, label[for=user_pass]:before { color: #666; font-family: Fontawesome; margin-left: -20px;}
      label[for=user_login]:before { content: "\f1fa"; }
      label[for=user_pass]:before { content: "\f084"; }
  </style>';
}
add_action('login_head', 'my_custom_login_page_css');

// Remove lost password
function disable_lost_password() {
    if (isset( $_GET['action'] )){
        if ( in_array( $_GET['action'], array('lostpassword', 'retrievepassword') ) ) {
            wp_redirect( wp_login_url(), 301 );
            exit;
        }
    }
}
add_action( "login_init", "disable_lost_password" );

/* Change login errors */
function ddw_log_err_msg() {
return 'Datos incorrectos, por favor, vuelva a intentarlo en unos minutos';
}
add_filter('login_errors', 'ddw_log_err_msg');

/* Change logo url */
function my_custom_login_url() {
return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'my_custom_login_url' );

/* Change logo name */
function my_custom_login_url_title() {
return get_bloginfo( 'name' );
}
add_filter( 'login_headertitle', 'my_custom_login_url_title' );