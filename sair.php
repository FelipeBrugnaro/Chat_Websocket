<?php
session_start();

iF(session_destroy()){
    header('location: index.php');
}

?>