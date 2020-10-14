<?php
/*

** License **
Copyright © 2020 DS Media Group
Author : Salvatore Cahyo
License: MIT

*/
session_start();
require "autoload.php";
date_default_timezone_set($_ENV["TIMEZONE"]);
function checklogin()
{
    if (!isset($_SESSION["logged-in"]) and !isset($_SESSION["username"]) and !isset($_SESSION["avatar"]) and !isset($_SESSION["tire"])) {
        header('Location: ..\..\signout');
    }
}
