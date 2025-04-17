<?php
    session_start();
    session_destroy();
    header('Location: http://localhost/_hotel-management/index.php');
    exit();
?>