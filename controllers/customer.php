<?php
include($_SERVER['DOCUMENT_ROOT'] . "/project/database/db.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/project/helper/mail/class.phpmailer.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/project/helper/mail/class.smtp.php");
include($_SERVER['DOCUMENT_ROOT'] . "/project/helper/middleware.php");
if (isset($_SESSION['account_id'])) {
    $acc = selectOne('account', ['id' => $_SESSION['account_id']]);
}
$customer = selectAll('customers');
$errors = array();
$reply_email = '';
$reply_subject = '';
$reply_content = '';

if (isset($_REQUEST['term'])) {
    adminOnly();
    $param_term = mysqli_real_escape_string($conn, $_REQUEST['term']);
    if (strlen($param_term) > 0) {
        $sql = "SELECT * FROM customers where customers.customer_name like '%" . $param_term . "%' or customers.customer_email like '%" . $param_term . "%' or customers.email_subject like '%" . $param_term . "%' or customers.email_message like '%" . $param_term . "%' or customers.email_time like '%" . $param_term . "%' or customers.status like '%" . $param_term . "%'";
        $data = mysqli_query($conn, $sql);
        $resultSearch = mysqli_fetch_all($data);
    } else {
        $resultSearch = selectAll('customers');
    }
    echo "<thead>";
    echo "<tr>";
    echo "<th>Number</th>";
    echo "<th class='col-hidden'>Name</th>";
    echo "<th>Email</th>";
    echo "<th>Title</th>";
    echo "<th class='col-hidden'>Content</th>";
    echo "<th class='col-hidden'>Sending time</th>";
    echo "<th>Status</th>";
    echo "</tr>";
    echo "</thead>";
    echo " <tbody>";
    $i = 1;
    foreach ($resultSearch as $key) {
        echo "<tr>";
        echo "<td>" . $i . "</td>";
        echo "<td class='col-hidden'>" . $key[1] . "</td>";
        echo "<td>" . $key[2] . "</td>";
        echo "<td>" . $key[3] . "</td>";
        echo "<td class='col-hidden'>" . $key[4] . "</td>";
        echo "<td class='col-hidden'>" . $key[5] . "</td>";
        echo "<td>";
        $id = $key[0];
        if ($key[6] === 'Waiting') {
            echo "<a class='btn-status bg-warning' href='customer_reply.php?repId=" . $id . "'>" . $key[6] . "</a>";
        } else {
            echo "<a class='btn-status bg-success' href='customer_detail.php?detail_Id=" . $id . "'>" . $key[6] . "</a>";
        }
        echo "</td>";
        echo "</tr>";
        $i++;
    }
    echo "</tbody>";
}

if (isset($_GET['repId'])) {
    $id = $_GET['repId'];
    $customer_info = selectOne('customers', ['customer_id' => $_GET['repId']]);
    $reply_email = $customer_info['customer_email'];
}
if (isset($_POST['customer_reply'])) {
    adminOnly();
    if (empty($_POST['reply_subject'])) {
        array_push($errors, 'Enter email subject');
    }
    if (empty($_POST['reply_content'])) {
        array_push($errors, 'Enter email content');
    }
    if (count($errors) === 0) {
        $reply_email = $_POST['customer_email'];
        $reply_subject = $_POST['reply_subject'];
        $reply_content = $_POST['reply_content'];
        $email = '' . $reply_email . '';
        $subject = '' . $reply_subject . '';
        $body = '' . $reply_content . '';

        unset($_POST['customer_reply'], $_POST['customer_email']);
        insert('reply_info', $_POST);
        update('customers', $_POST['customer_id'], ['status' => 'Replied'], 'customer_id');

        $mail = new PHPMailer();
        $mail->SMTPDebug = 3;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com;';
        $mail->SMTPAuth = true;
        $mail->Username = 'duyen2882@gmail.com';
        $mail->Password = 'mfiwowkmcbabnhcf';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom('duyen2882@gmail.com');
        $mail->addAddress($email);
        $mail->addReplyTo('duyen2882@gmail.com');
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;
        if ($mail->send()) {
            $_SESSION['message'] = 'Message sended successfully';
            $_SESSION['type'] = 'success';
            header('location: ' . BASE_URL . "/customers/customer_index.php");
            exit();
        }
    } else {
        $reply_email = $_POST['customer_email'];
        $reply_subject = $_POST['reply_subject'];
        $reply_content = $_POST['reply_content'];
        $id = $_POST['customer_id'];
    }
}

if (isset($_GET['detail_Id'])) {
    adminOnly();
    $id = $_GET['detail_Id'];
    $detail = selectOneWithCol('reply_info.*, customer_email, account.name', 'reply_info, customers, account', [0 => 'reply_info.customer_id=customers.customer_id', 1 => 'reply_info.id=account.id', 2 => "reply_info.customer_id=$id"]);
    $reply_email = $detail['customer_email'];
    $reply_subject = $detail['reply_subject'];
    $reply_content = $detail['reply_content'];
    $sender = $detail['name'];
    $sending_time = $detail['time_send'];
}
