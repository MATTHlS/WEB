<?php
    if(isset($_SESSION['username'])){
        $_SESSION = array();
        session_destroy();
    }
    redirect('/users/login');
?>