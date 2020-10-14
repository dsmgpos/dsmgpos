<?php
/*

** License **
Copyright © 2020 DS Media Group
Author : Salvatore Cahyo
License: MIT

*/
include __DIR__ . "/../../vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__, '/../../env.dsmg.sec');
$dotenv->load();