<?php
include(ROOT_PATH . "/database/db.php");
include(ROOT_PATH . "/helper/middleware.php");
require_once(ROOT_PATH . "/helper/mail/class.phpmailer.php");
require_once(ROOT_PATH . "/helper/mail/class.smtp.php");
$errors = array();
if (isset($_POST['btn-send'])) {
    $name = $_POST['Username'];
    if (empty($_POST['Username'])) {
        array_push($errors, 'Enter your name');
    }
    if (empty($_POST['Email'])) {
        array_push($errors, 'Enter your email');
    }
    if (empty($_POST['Subject'])) {
        array_push($errors, 'Enter subject');
    }
    if (empty($_POST['Message'])) {
        array_push($errors, 'Enter message');
    }
    if (count($errors) === 0) {
        $email = $_POST['Email'];
        $subject = $_POST['Subject'];
        $mess = $_POST['Message'];
        $sql = "insert into customers (customer_name,customer_email,email_subject,email_message) values('$name','$email','$subject','$mess')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header('location: ' . BASE_URL . "/index.php");
        } else {
            echo 'error';
        }
    }
    else{
        $email = $_POST['Email'];
        $subject = $_POST['Subject'];
        $mess = $_POST['Message'];
    }
}
