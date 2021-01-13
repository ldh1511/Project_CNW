<?php
include(ROOT_PATH . "/database/db.php");
if (isset($_SESSION['account_id'])) {
    $acc = selectOne('account', ['id' => $_SESSION['account_id']]);
}
$general_info = selectAll('general_info');
foreach ($general_info as $key) {
    $gi_bg = $key[2];
    $gi_avt = $key[1];
    $gi_id = $key[0];
}
$errors = array();

if (isset($_POST['banner_save'])) {
    if (isset($_FILES['general_banner'])) {
        if ($_FILES['general_banner']['error'] > 0) {
            array_push($errors, 'File upload failed something went wrong');
        } else {
            $profileImage = $_FILES['general_banner']['name'];
            $target = ROOT_PATH . '/Img/' . $profileImage;
            move_uploaded_file($_FILES['general_banner']['tmp_name'], $target);
            update('general_info', $gi_id, ['general_banner' => $profileImage], 'general_id');
            // $_SESSION['message'] = "Team's avatar changed successfully";
            // $_SESSION['type'] = 'success';
            header('location: ' . BASE_URL . "/gi/gi_bg.php");
        }
    }
}

if (isset($_POST['gi_avt_save'])) {
    if (isset($_FILES['general_ava'])) {
        if ($_FILES['general_avt']['error'] > 0) {
            array_push($errors, 'File upload failed something went wrong');
        } else {
            $profileImage = $_FILES['general_ava']['name'];
            $target = ROOT_PATH . '/Img/' . $profileImage;
            move_uploaded_file($_FILES['general_ava']['tmp_name'], $target);
            update('general_info', $gi_id, ['general_ava' => $profileImage], 'general_id');
            header('location: ' . BASE_URL . "/gi/gi_avt.php");
            // $_SESSION['message'] = "Banner changed successfully";
            // $_SESSION['type'] = 'success';
        }
    }
}
