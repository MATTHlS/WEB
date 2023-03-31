<?php
session_start();

function isLoggedIn(){
    if(isset($_SESSION['username']))
        return TRUE;
    else
        return FALSE;
    
}
