<?php
include(ROOT_PATH . "/database/db.php");
$errors = array();
if(isset($_SESSION['account_id'])){
    $info=selectOne('infomation',['id'=>$_SESSION['account_id']]);
}


if (isset($_POST['btn-login'])) {
    if (empty($_POST['name'])) {
        array_push($errors, 'Enter your account name');
    }
    if (empty($_POST['password'])) {
        array_push($errors, 'Enter your password');
    }
    if (count($errors) === 0) {
        $name = $_POST['name'];
        $result = selectOne('account', ['name' => $name]);
        if ($result && password_verify($_POST['password'], $result['password'])) {
            $_SESSION['account_name'] = $name;
            $_SESSION['account_id'] = $result['id'];
            header('location: ' . BASE_URL . "/acc/accdetail_index.php");
        } else {
            array_push($errors, 'Mật khẩu không chính xác');
        }
    }
}

if (isset($_POST['updatePass'])) {
    if (empty($_POST['pass_old'])) {
        array_push($errors, 'Password is required');
    }
    if (empty($_POST['pass_new'])) {
        array_push($errors, 'New password is required');
    }
    if (empty($_POST['pass_conf'])) {
        array_push($errors, 'Password confirm is required');
    }
    if (count($errors) === 0) {
        $check = selectOne('account', ['id' => $_POST['id']]);
        if (!$check || !password_verify($_POST['pass_old'], $check['password'])) {
            array_push($errors, 'Password is false');
        } else {
            $id = $_POST['id'];
            $password_New = password_hash($_POST['pass_new'], PASSWORD_DEFAULT);
            update('account', $id, ['password' => $password_New]);
        }
    } else {
        $password = $_POST['pass_old'];
    }
}
