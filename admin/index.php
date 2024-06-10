<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Theatre Assistant | Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  <!-- Custom CSS -->
  <style>
    body {
      background: linear-gradient(45deg, #3c8dbc, #f39c12);
      font-family: 'Source Sans Pro', sans-serif;
    }
    .login-box {
      margin: 7% auto;
      width: 360px;
      padding: 15px;
      border-radius: 10px;
      background: #fff;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .login-logo a {
      color: #444;
      font-size: 24px;
      text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
    }
    .login-box-body {
      padding: 20px;
      border-radius: 5px;
      background: #f7f7f7;
    }
    .login-box-msg {
      margin: 0;
      text-align: center;
      font-weight: bold;
      color: #555;
    }
    .form-group .form-control {
      border-radius: 20px;
      box-shadow: none;
      border-color: #ddd;
    }
    .form-group .form-control:focus {
      border-color: #3c8dbc;
      box-shadow: 0 0 8px rgba(60,141,188,0.2);
    }
    .form-group .glyphicon {
      color: #777;
    }
    .btn-danger {
      background: #d9534f;
      border: none;
      border-radius: 20px;
      padding: 10px 20px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      transition: background 0.3s ease;
    }
    .btn-danger:hover {
      background: #c9302c;
    }
    .links {
      text-align: center;
      margin-top: 10px;
    }
    .links a {
      color: #3c8dbc;
      text-decoration: none;
    }
    .links a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a>Main<b> &nbsp; Admin Panel</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <?php session_start(); include('../msgbox.php');?>
    <p class="login-box-msg">Please login to start your session</p>
    <form action="pages/process_login.php" method="post">
      <div class="form-group has-feedback">
        <input name="Email" type="text" size="25" placeholder="Username" class="form-control"/>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="Password" type="password" size="25" placeholder="Password" class="form-control" />
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-danger btn-block">Login</button>
      </div>
    </form>
    <div class="links">
      <a href="../theatre/index.php">Go To Theatre Panel</a><br>
      <a href="../forgot_password.php">Forgot Password</a>
    </div>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
