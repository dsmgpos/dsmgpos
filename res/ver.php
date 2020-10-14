<?php
/*

** License **
Copyright © 2020 DS Media Group
Author : Salvatore Cahyo
License: MIT

*/
require "dashboard/lib/autoload.php";
if (isset($_POST["username"])) {
    if (isset($_POST['token'])) {
        if (hash_equals($_SESSION['token'], $_POST['token'])) {
             date_default_timezone_set($_ENV["TIMEZONE"]);
             $randomid = rand();
             $idcookie = "accid";
             $username = $_POST["username"];
             $password = $_POST["password"];
             $sessid   = session_id();
             $query = mysqli_query($connect, "SELECT * FROM `user` WHERE `userna_me` = '" . $username . "';");
             $rows = mysqli_num_rows($query);
             if ($rows == 1) {
                 $user = mysqli_fetch_assoc($query);
                 if (password_verify($password, $user["pa_ssword"])) {
                     $file = 'log.txt';
                     $logdata = date("Y-m-d") . "," . date("h:i:sa") . "," . $sessid . "," . $username . "," . $_SERVER['REMOTE_ADDR'] . "\n";
                     file_put_contents($file, $logdata, FILE_APPEND);
                     $_SESSION["user"] = $user["userna_me"];
                     $_SESSION["profile"] = $user["avatar"];
                     $_SESSION["tier"] = $user["jabatan"];
                     $_SESSION["logged-in"] = TRUE;
                     header("Location: dashboard");
                     exit();
                 }else{
                     $stat="passwrr";
                     echo '<meta http-equiv="refresh"
             content="2; url=signout">';
                 }
             } else {
                 $stat="usererr";
                 echo '<meta http-equiv="refresh"
             content="2; url=signout">';
             }
        } else {
             header('HTTP/1.0 403 Forbidden');
             echo "CSRF Token Miss Match!";
             echo '<meta http-equiv="refresh"
             content="5; url=signout">';
             die();
        }
    }else{
        header("Location: signout");
    }
   
}
