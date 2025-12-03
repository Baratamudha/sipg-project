<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Login</title>

  <link rel='stylesheet' href='http://codepen.io/assets/libs/fullpage/jquery-ui.css'>

    <link rel="stylesheet" href="{{asset('assets/css/stylelogin.css')}}" media="screen" type="text/css" />

</head>

<body style="margin-top: 100px; background-color: #8FBC8F;">

  <div class="login-card">
    <h1>Log-in</h1><br>
  <!-- <form role="form" method="POST" action="{{url(action('LoginController@postLogin'))}}"> -->
    <input type="hidden" name="_token" value="<?php echo csrf_token();?>" >
    <input type="text" name="user" placeholder="Username">
    <input type="password" name="pass" placeholder="Password">
    <input type="submit" name="login" class="login login-submit" value="login">
  </form>

</div>

<!-- <div id="error"><img src="https://dl.dropboxusercontent.com/u/23299152/Delete-icon.png" /> Your caps-lock is on.</div> -->

  <script src='http://codepen.io/assets/libs/fullpage/jquery_and_jqueryui.js'></script>

</body>

</html>
