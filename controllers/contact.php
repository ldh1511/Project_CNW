<?php
include(ROOT_PATH . "/database/db.php");
require_once(ROOT_PATH . "/helper/mail/class.phpmailer.php");
require_once(ROOT_PATH . "/helper/mail/class.smtp.php");

if (isset($_POST['btn-send'])) {
    $name = $_POST['Username'];
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

