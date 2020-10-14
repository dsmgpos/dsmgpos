<?php
/*

** License **
Copyright © 2020 DS Media Group
Author : Salvatore Cahyo
License: MIT

*/
require "vendor/autoload.php";

session_start();
$VERSION = "v15.1.0-online";
setcookie("VERSION", $VERSION, time() + (86400 * 30), "/");

if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}
$token = $_SESSION['token'];

if (isset($_SESSION["logged-in"])) {
    /*$sessid   = session_id();
    require __DIR__ . "/dashboard/lib/db.php";
    $connect = mysqli_connect($host, $username, $password, $dbname);
    $query = mysqli_query($connect, "SELECT * FROM `session` WHERE `id` = '" . $sessid . "';");
    $rows = mysqli_num_rows($query);
    if ($rows == 1) {
        $sescheck = mysqli_fetch_assoc($query);
        if ($sescheck["status"] !== "TRUE") {
            header('Location: ..\..\signout');
        }
    }
    $connect->close();*/
    header('Location: dashboard');
}
error_reporting(1);
require_once("config/connect.php");
$error == "false";

$ip = $_SERVER['REMOTE_ADDR'];

require("res/ver.php");

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DSMG POS | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="dashboard/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dashboard/dist/css/adminlte.min.css">
    <link href="dashboard/assets/plugins/alertify/css/alertify.css" type="text/css">
    <link rel="stylesheet" href="dashboard/plugins/pace-progress/themes/blue/pace-theme-flat-top.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <img src="//static.dsgroupmedia.com/logo/dsmg-pos-blk.png" width="200px">
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="" method="post" id="login-form">
                    <div class="input-group mb-3">
                    <input type="text" class="form-control" name="token" value="<?php echo $token; ?>" hidden>
                        <input type="text" class="form-control" name="username" placeholder="Username" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-users"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <!-- /.col -->
                        <div class="col-12">
                            <button id="bload" class="btn btn-primary btn-block" type="submit">
                                Login
                            </button>
                            <button id="load" class="btn btn-primary btn-block" type="button" disabled>
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                Loading...
                            </button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="dashboard/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dashboard/dist/js/adminlte.min.js"></script>
    <script src="dashboard/assets/plugins/alertify/js/alertify.js"></script>
    <script src="dashboard/plugins/pace-progress/pace.min.js"></script>
    <script>
    $(document).ready(function() {
        $('form').parsley();
    });
    </script>
    <script>
    $('#load').hide();
    $('#bload').show();

    function bload() {
        $('#bload').show();
        $('#load').hide();
    }

    $("#bload").click(function() {
        if ($("#login-form input:invalid").length) {
            //The popup appeared
            $('#bload').show();
            $('#load').hide();
        } else {
            //The popup did not appear
            $('#bload').hide();
            $('#load').show();

        }
    });
    </script>
    <div onload="">
        <?php
        if (isset($stat)) {
            if ($stat == "usrerr") { ?>
        <script>
        alertify.error('Error: Username / Password Salah');
        </script>
        <?php
            } else if($stat=="passwrr"){ ?>
        <script>
        alertify.error('Error Password Salah!');
        </script>
        <?php } ?>
        <?php } ?>
    </div>

</body>

</html>