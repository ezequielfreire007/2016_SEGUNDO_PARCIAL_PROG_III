<?php    session_start();    if (!(isset($_SESSION['uls'])) || ($_SESSION['uls']->id != $_GET['id']->id)) {        header('Location: login.php?uss='.$_GET['esta']);    }    session_destroy();