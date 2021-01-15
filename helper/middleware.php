<?php
function adminOnly(){
    if(empty($_SESSION['account_id']) || empty($_SESSION['account_name'])){
        $_SESSION['message']='You are not authorized';
        $_SESSION['type']='error';
        header('location: '.BASE_URL.'/index.php');
        exit(0);
    }
}