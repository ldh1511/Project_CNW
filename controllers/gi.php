<?php
include(ROOT_PATH . "/database/db.php");
include(ROOT_PATH . "/helper/middleware.php");
if (isset($_SESSION['account_id'])) {
    $acc = selectOne('account', ['id' => $_SESSION['account_id']]);
    $acc_id = $acc['id'];
}
$general_info = selectAll('general_info');
foreach ($general_info as $key) {
    $gi_bg = $key[3];
    $gi_avt = $key[2];
    $gi_id = $key[0];
    $gi_address = $key[4];
    $gi_email = $key[5];
    $gi_intro = $key[1];
}
$history = selectCol('history_general_info.*, account.name','history_general_info, account','history_general_info.id=account.id');
$errors = array();

if (isset($_GET['edit_id'])) {
    $result = selectOne('general_info', ['general_id' => $_GET['edit_id']]);
    $gi_bg = $result['general_banner'];
    $gi_avt = $result['general_ava'];
    $gi_id = $result['general_id'];
    $gi_address = $result['general_address'];
    $gi_email = $result['general_mail'];
    $gi_intro = $result['general_intro'];
}

if (isset($_POST['gi_edit'])) {
    $changeArr = array();
    if (empty($_POST['general_address'])) {
        array_push($errors, 'Enter address');
    }
    if (empty($_POST['general_mail'])) {
        array_push($errors, 'Enter email');
    }
    if (empty($_POST['general_intro'])) {
        array_push($errors, 'Enter intro');
    }
    if (count($errors) === 0) {
        unset($_POST['gi_edit']);
        $result = selectOne('general_info', ['general_id' => $gi_id]);
        if ($_POST['general_address'] !== $result['general_address']) {
            array_push($changeArr, 'general address ');
        }
        if ($_POST['general_mail'] !== $result['general_mail']) {
            array_push($changeArr, 'general mail ');
        }
        if ($_POST['general_intro'] !== $result['general_intro']) {
            array_push($changeArr, 'general intro ');
        }
        update('general_info', $gi_id, $_POST, 'general_id');
        if (count($changeArr) > 0) {
            $content = 'Update ';
            $i = 0;
            foreach ($changeArr as $key => $value) {
                if ($i === 0) {
                    $content = $content . "$value";
                } else {
                    $content = $content . ", $value";
                }
                $i++;
            }
            $sql = "insert into history_general_info(content,id,general_id) values('$content', '$acc_id','$gi_id')";
            insertWithData($sql);
            $_SESSION['message'] = 'General Information changed successfully';
            $_SESSION['type'] = 'success';
            header('location: ' . BASE_URL . "/gi/gi_index.php");
            exit();
        }
    } else {
        $gi_address = $_POST['general_address'];
        $gi_email = $_POST['general_mail'];
        $gi_intro = $_POST['general_intro'];
    }
}

if (isset($_GET['delete_Id'])) {
    $id=$_GET['delete_Id'];
    delete('history_general_info',$id,'history_gi_id');
    $_SESSION['message'] = "General Information history deleted successfully";
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . "/gi/gi_history.php");
    exit();
}

if (isset($_POST['banner_save'])) {
    adminOnly();
    if (isset($_FILES['general_banner'])) {
        if ($_FILES['general_banner']['error'] > 0) {
            array_push($errors, 'File upload failed something went wrong');
        } else {
            $profileImage = $_FILES['general_banner']['name'];
            $target = ROOT_PATH . '/Img/' . $profileImage;
            move_uploaded_file($_FILES['general_banner']['tmp_name'], $target);
            update('general_info', $gi_id, ['general_banner' => $profileImage], 'general_id');
            $_SESSION['message'] = "Team's banner changed successfully";
            $_SESSION['type'] = 'success';
            header('location: ' . BASE_URL . "/gi/gi_bg.php");
            exit();
        }
    }
}

if (isset($_POST['gi_avt_save'])) {
    adminOnly();
    if (isset($_FILES['general_ava'])) {
        if ($_FILES['general_ava']['error'] > 0) {
            array_push($errors, 'File upload failed something went wrong');
        } else {
            $profileImage = $_FILES['general_ava']['name'];
            $target = ROOT_PATH . '/Img/' . $profileImage;
            move_uploaded_file($_FILES['general_ava']['tmp_name'], $target);
            update('general_info', $gi_id, ['general_ava' => $profileImage], 'general_id');
            $_SESSION['message'] = "Team's avatar changed successfully";
            $_SESSION['type'] = 'success';
            header('location: ' . BASE_URL . "/gi/gi_avt.php");
            exit();
        }
    }
}
