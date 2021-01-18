<?php
include($_SERVER['DOCUMENT_ROOT'] . "/project/database/db.php");
include($_SERVER['DOCUMENT_ROOT'] . "/project/helper/middleware.php");
if (isset($_SESSION['account_id'])) {
    $acc = selectOne('account', ['id' => $_SESSION['account_id']]);
    $acc_id=$_SESSION['account_id'];
}
$projects = selectAll('projects',['id'=>$acc_id]);
$pj_start = '';
$pj_end = '';
$pj_name = '';
$pj_des = '';
$pj_link = '';
$errors = array();

if (isset($_REQUEST['term'])) {
    adminOnly();
    $param_term = mysqli_real_escape_string($conn, $_REQUEST['term']);
    if (strlen($param_term) > 0) {
        $sql = "SELECT * FROM projects where projects.project_begin like '%" . $param_term . "%' or projects.project_end like '%" . $param_term . "%' or projects.project_name like '%" . $param_term . "%' or projects.project_description like '%" . $param_term . "%' or projects.project_img like '%" . $param_term . "%' or projects.project_link like '%" . $param_term . "%'";
        $data = mysqli_query($conn, $sql);
        $resultSearch = mysqli_fetch_all($data);
    } else {
        $resultSearch = selectAll('projects');
    }
    echo "<thead>";
    echo "<tr>";
    echo "<th>Number</th>";
    echo "<th>Start Date</th>";
    echo "<th class='col-hidden'>End Date</th>";
    echo "<th>Name</th>";
    echo "<th class='col-hidden'>Description</th>";
    echo "<th>Image</th>";
    echo "<th>Detail</th>";
    echo "<th>Edit</th>";
    echo "<th>Delete</th>";
    echo "</tr>";
    echo "</thead>";
    echo " <tbody>";
    $i = 1;
    foreach ($resultSearch as $key) {
        echo "<tr>";
        echo "<td class='align-middle'>" . $i . "</td>";
        echo "<td class='align-middle'>" . $key[1] . "</td>";
        echo "<td class='align-middle col-hidden'>" . $key[2] . "</td>";
        echo "<td class='align-middle'>" . $key[3] . "</td>";
        echo "<td class='align-middle col-hidden'>" . html_entity_decode(substr($key[4], 0, 35) . "...") . "</td>";
        echo "<td class='align-middle'><img class='img-col' src='../Img/" . $key[5] . "' alt=''></td>";
        echo "<td class='align-middle'><a href='pj_detail.php?pj_id=" . $key[0] . "'><i class='fas fa-book-reader'></i></a></td>";
        echo "<td class='align-middle'><a href='pj_edit.php?edit_id=" . $key[0] . "'><i class='far fa-edit'></i></a></td>";
        echo "<td class='align-middle'><a href='pj_edit.php?delete_id=" . $key[0] . "'><i class='far fa-trash'></i></a></td>";
        echo "</tr>";
        $i++;
    }
    echo "</tbody>";
}

if (isset($_GET['pj_id'])) {
    $pj = selectOne('projects', ['project_id' => $_GET['pj_id']]);
    $pj_start = $pj['project_begin'];
    $pj_end = $pj['project_end'];
    $pj_name = $pj['project_name'];
    $pj_des = $pj['project_description'];
    $pj_img = $pj['project_img'];
    $pj_link = $pj['project_link'];
}

if (isset($_POST['pj_add'])) {
    adminOnly();
    if (empty($_POST['project_begin'])) {
        array_push($errors, 'Enter day start');
    }
    if (empty($_POST['project_end'])) {
        array_push($errors, 'Enter day end');
    }
    if (empty($_POST['project_name'])) {
        array_push($errors, 'Enter name of Project');
    }
    if (empty($_POST['project_description'])) {
        array_push($errors, 'Enter description of Project');
    }
    if (count($errors) === 0) {
        if (isset($_FILES['project_img'])) {
            if ($_FILES['project_img']['error'] > 0) {
                array_push($errors, 'File upload failed something went wrong');
                $pj_start = $_POST['project_begin'];
                $pj_end = $_POST['project_end'];
                $pj_name = $_POST['project_name'];
                $pj_des = $_POST['project_description'];
                $pj_link = $_POST['project_link'];
            } else {
                $profileImage = $_FILES['project_img']['name'];
                $target = ROOT_PATH . '/Img/' . $profileImage;
                move_uploaded_file($_FILES['project_img']['tmp_name'], $target);
                $newArr = ['project_img' => $profileImage, 'id' => $acc['id']];
                unset($_POST['pj_add']);
                $_POST = array_merge($_POST, $newArr);
                insert('projects', $_POST);
                $_SESSION['message'] = 'Poject added successfully';
                $_SESSION['type'] = 'success';
                header('location: ' . BASE_URL . "/pj/pj_index.php");
                exit();
            }
        }
    } else {
        $pj_start = $_POST['project_begin'];
        $pj_end = $_POST['project_end'];
        $pj_name = $_POST['project_name'];
        $pj_des = $_POST['project_description'];
        $pj_link = $_POST['project_link'];
    }
}

if (isset($_GET['edit_id'])) {
    $pj = selectOne('projects', ['project_id' => $_GET['edit_id']]);
    $pj_start = $pj['project_begin'];
    $pj_id = $pj['project_id'];
    $pj_end = $pj['project_end'];
    $pj_name = $pj['project_name'];
    $pj_des = $pj['project_description'];
    $pj_img = $pj['project_img'];
    $pj_link = $pj['project_link'];
    $_FILES['project_img']['name'] = $pj_img;
}

if (isset($_POST['btn-pj_edit'])) {
    adminOnly();
    unset($_POST['btn-pj_edit']);
    if (empty($_POST['project_begin'])) {
        array_push($errors, 'Enter day start');
    }
    if (empty($_POST['project_end'])) {
        array_push($errors, 'Enter day end');
    }
    if (empty($_POST['project_name'])) {
        array_push($errors, 'Enter name of Project');
    }
    if (empty($_POST['project_description'])) {
        array_push($errors, 'Enter description of Project');
    }
    if (count($errors) === 0) {
        if ($_FILES['project_img']['size'] === 0) {
            unset($_POST['test']);
            update('projects', $_POST['project_id'], $_POST, 'project_id');
            $_SESSION['message'] = 'Poject information changed successfully';
            $_SESSION['type'] = 'success';
            header('location: ' . BASE_URL . "/pj/pj_index.php");
            exit();
        } else if ($_FILES['project_img']['error'] > 0) {
            array_push($errors, 'File upload failed something went wrong');
        } else {
            unset($_POST['test']);
            $profileImage = $_FILES['project_img']['name'];
            $target = ROOT_PATH . '/Img/' . $profileImage;
            move_uploaded_file($_FILES['project_img']['tmp_name'], $target);
            $newArr = ['project_img' => $profileImage];
            $_POST = array_merge($_POST, $newArr);
            update('projects', $_POST['project_id'], $_POST, 'project_id');
            $_SESSION['message'] = 'Poject information changed successfully';
            $_SESSION['type'] = 'success';
            header('location: ' . BASE_URL . "/pj/pj_index.php");
            exit();
        }
    } else {
        $pj_start = $_POST['project_begin'];
        $pj_end = $_POST['project_end'];
        $pj_name = $_POST['project_name'];
        $pj_des = $_POST['project_description'];
        $pj_link = $_POST['project_link'];
        $pj_img = $_POST['test'];
        $pj_id = $_POST['project_id'];
        $_FILES['project_img']['name'] = $_POST['test'];
    }
}
if (isset($_GET['delete_id'])) {
    adminOnly();
    $id = $_GET['delete_id'];
    delete('projects', $id, 'project_id');
    $_SESSION['message'] = 'Poject deleted successfully';
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . "/pj/pj_index.php");
    exit();
}
