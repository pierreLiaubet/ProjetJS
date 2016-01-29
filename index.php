<?php
    session_start();
    require_once('Config/Config.php');
    require_once('Config/Autoload.php');
    Autoload::load();

    $controller = new Front();