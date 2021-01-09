<?php
include('./path.php');
session_start();
unset($_SESSION['account_name']);
unset($_SESSION['account_id']);
session_destroy();
header('location: ' . BASE_URL . "/index.php");