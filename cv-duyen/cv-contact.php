<?php

require_once(ROOT_PATH . "/helper/mail/class.phpmailer.php");
require_once(ROOT_PATH . "/helper/mail/class.smtp.php");

if (isset($_POST['Username2'])) {
    //#1
    $name = trim(strip_tags($_POST['Username2']));
    $email = trim(strip_tags($_POST['Email']));
    $subject = trim(strip_tags($_POST['Subject']));
    $message = trim(strip_tags($_POST['Message']));
    $body = "
      <strong>Họ tên: </strong> $name<br/>
      <strong>Email: </strong> $email<br/>
      <strong>Tiêu đề: </strong> $subject<br/>
      <strong>Thông điệp: </strong> $message<br/>";

    //#2
    $mail = new PHPMailer();
    $mail->SMTPDebug = 3;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com;';
    $mail->SMTPAuth = true;
    $mail->Username = 'duyen2882@gmail.com';
    $mail->Password = 'mfiwowkmcbabnhcf';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    //#3
    $mail->setFrom('duyen2882@gmail.com');
    $mail->addAddress('duyen2882@gmail.com');
    $mail->addReplyTo('duyen2882@gmail.com');
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $body;

    //#4
    if ($mail->send()) {
        echo 'Thư đã được gửi.';
    } else {
        echo 'Thư chưa được gửi.';
    }
}
?>