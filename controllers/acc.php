<?php
include(ROOT_PATH . "/database/db.php");
include(ROOT_PATH."/helper/middleware.php");
$errors = array();
$id = '';
$name = '';
$sumary = '';
$target = '';
$hobby = '';
$age = '';
$birthday = '';
$address = '';
$email = '';
$phone_number = '';
$gender = '';
if (isset($_SESSION['account_id'])) {
    $info = selectOne('infomation', ['id' => $_SESSION['account_id']]);
    $acc = selectOne('account', ['id' => $_SESSION['account_id']]);
    $acc_id=$_SESSION['account_id'];
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
            $_SESSION['message'] = 'Login sucessfully';
            $_SESSION['type'] = 'success';
            header('location: ' . BASE_URL . "/acc/accdetail_index.php");
            exit();
        } else {
            array_push($errors, 'Incorrect Password');
        }
    }
}

if (isset($_POST['updatePass'])) {
    adminOnly();
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
            array_push($errors, 'Current password is incorrect');
        } else {
            $id = $_POST['id'];
            $password_New = password_hash($_POST['pass_new'], PASSWORD_DEFAULT);
            update('account', $id, ['password' => $password_New], 'id');
            $_SESSION['message'] = 'Password updated successfully';
            $_SESSION['type'] = 'success';
            header('location: ' . BASE_URL . "/acc/acc_update.php");
            exit();
        }
    } else {
        $password = $_POST['pass_old'];
    }
}

if (isset($_POST['avt_save'])) {
    adminOnly();
    if (isset($_FILES['avatar'])) {
        if ($_FILES['avatar']['error'] > 0) {
            array_push($errors, 'File upload failed something went wrong');
        } else {
            $profileImage = $_FILES['avatar']['name'];
            $target = ROOT_PATH . '/Img/' . $profileImage;
            move_uploaded_file($_FILES['avatar']['tmp_name'], $target);
            update('account', $acc['id'], ['avatar' => $profileImage], 'id');
            $_SESSION['message'] = 'Avatar changed sucessfully';
            $_SESSION['type'] = 'success';
            header('location: ' . BASE_URL . "/acc/acc_avt.php");
            exit();
        }
    }
}
if (isset($_POST['background_save'])) {
    adminOnly();
    if (isset($_FILES['background'])) {
        if ($_FILES['background']['error'] > 0) {
            array_push($errors, 'File upload failed something went wrong');
        } else {
            $profileImage = $_FILES['background']['name'];
            $target = ROOT_PATH . '/Img/' . $profileImage;
            move_uploaded_file($_FILES['background']['tmp_name'], $target);
            update('account', $acc['id'], ['background' => $profileImage], 'id');
            $_SESSION['message'] = 'Background changed successfully';
            $_SESSION['type'] = 'success';
            header('location: ' . BASE_URL . "/acc/acc_background.php");
            exit();
        }
    }
}

if (isset($_GET['edit_id'])) {
    $acc_info = selectOne('infomation', ['id' => $_GET['edit_id']]);
    $id = $acc_info['id'];
    $name = $acc_info['name'];
    $sumary = $acc_info['sumary'];
    $target = $acc_info['target'];
    $hobby = $acc_info['hobby'];
    $age = $acc_info['age'];
    $birthday = $acc_info['birthday'];
    $address = $acc_info['address'];
    $email = $acc_info['email'];
    $phone_number = $acc_info['phone_number'];
    $gender = $acc_info['gender'];
}

if (isset($_POST['acc_infoUpdate'])) {
    adminOnly();
    if (empty($_POST['name'])) {
        array_push($errors, 'Name is required');
    }
    if (empty($_POST['sumary'])) {
        array_push($errors, 'Sumary is required');
    }
    if (empty($_POST['target'])) {
        array_push($errors, 'Target is required');
    }
    if (empty($_POST['hobby'])) {
        array_push($errors, 'Hobby is required');
    }
    if (empty($_POST['age'])) {
        array_push($errors, 'Age is required');
    }
    if (empty($_POST['address'])) {
        array_push($errors, 'Address is required');
    }
    if (empty($_POST['email'])) {
        array_push($errors, 'Email is required');
    }
    if (empty($_POST['phone_number'])) {
        array_push($errors, 'Phone number is required');
    }
    if (empty($_POST['gender'])) {
        array_push($errors, 'Gender is required');
    }
    if (empty($_POST['birthday'])) {
        array_push($errors, 'Birthday is required');
    }
    if (count($errors) === 0) {
        $id = $_POST['id'];
        unset($_POST['acc_infoUpdate'], $_POST['id']);
        update('infomation', $id, $_POST, 'id');
        $_SESSION['message'] = 'Information changed successfully';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . "/acc/accdetail_index.php");
        exit();
    } else {
        $name = $_POST['name'];
        $sumary = $_POST['sumary'];
        $target = $_POST['target'];
        $hobby=$_POST['hobby'];
        $age = $_POST['age'];
        $birthday = $_POST['birthday'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $gender=$_POST['gender'];
    }
}
