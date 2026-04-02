<?php
session_start();

    if( isset($_SESSION['adm']) ):
        unset($_SESSION['adm']);
        session_destroy();
        header('Location:../index.php');
    endif; 