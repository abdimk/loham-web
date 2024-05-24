<?php

function logout(){
    session_start();
    session_unset();
    session_destroy();
    header('Location: ../Login.php');
}
sleep(2);
logout();

?>