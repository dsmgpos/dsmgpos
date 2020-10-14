<?php
/*

** License **
Copyright © 2020 DS Media Group
Author : Salvatore Cahyo
License: MIT

*/
session_start();
$sessid   = session_id();
/*require __DIR__ . "/config/connect.php";
$sessid   = session_id();
$sql = "DELETE FROM session WHERE id='" . $sessid . "'";
$conn->query($sql);*/
unset($_COOKIE["PHPSESSID"]);
setcookie("accid", "");
setcookie("PHPSESSID", "");
session_destroy();


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Logging Out.. | DSMG Secure Page</title>
    <meta http-equiv="refresh" content="2; url=index">
    <link rel="shortcut icon" href="https://static.dsgroupmedia.com/icon.png">
    <script src="https://kit.fontawesome.com/aa09fdd343.js"></script>
    <link href="assets/css/logout.css" rel="stylesheet">
    <style>
    @import url("https://fonts.googleapis.com/css?family=Lato:300,400|Poppins:300,400,800&display=swap");

    * {
        margin: 0;
        padding: 0;
    }

    body,
    html {
        overflow: hidden;
    }

    .container {
        width: 100%;
        height: 100vh;
        background: #262626;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    </style>
</head>
<div class="container">
    <div class="box">

        <img src="loader.gif">

    </div>
</div>
</body>

</html>