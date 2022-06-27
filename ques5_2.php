<?php
    session_start();
    $count = 0;
    $_SESSION["key1"] = 2;
    $_SESSION["key2"] = 4;
    session_destroy();
    $count = count($_SESSION);
    echo $count;
?>