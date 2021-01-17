<?php
include($_SERVER['DOCUMENT_ROOT'] . "/project/database/db.php");
include($_SERVER['DOCUMENT_ROOT'] . "/project/helper/middleware.php");

if (isset($_SESSION['account_id'])) {
    $acc = selectOne('account', ['id' => $_SESSION['account_id']]);
    $acc_id = $acc['id'];
}
$list_exp = selectAll('experience', ['id' => $acc_id]);
$errors = array();

// READ
if (isset($_GET['detail_id'])) {
    $exp_id = $_GET['detail_id'];
    $sql = "select * from experience where exp_id = $exp_id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $exp_id = $row['exp_id'];
        $exp_start = $row['start'];
        $exp_finish = $row['finish'];
        $company = $row['company'];
        $exp_des = $row['description'];
    }
}
// INSERT
if (isset($_POST['exp_add'])) {
    if (empty($_POST['exp_start'])) {
        array_push($errors, 'Enter start date');
    }
    if (empty($_POST['company'])) {
        array_push($errors, 'Enter company');
    }
    if (empty($_POST['exp_des'])) {
        array_push($errors, 'Enter description');
    }
    if (count($errors) === 0) {
        $exp_start = $_POST['exp_start'];
        $exp_finish = $_POST['exp_finish'];
        $company = $_POST['company'];
        $exp_des = $_POST['exp_des'];
        $sql = "insert into experience (start, finish, company, description, id) values ('$exp_start','$exp_finish','$company','$exp_des','$acc_id')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $_SESSION['message'] = 'Experience added successfully';
            $_SESSION['type'] = 'success';
            header('location: ' . BASE_URL . "/exp/exp_index.php");
            exit();
        } 
    } else {
        $exp_start = $_POST['exp_start'];
        $exp_finish = $_POST['exp_finish'];
        $company = $_POST['company'];
        $exp_des = $_POST['exp_des'];
    }
}
// EDIT
if (isset($_GET['edit_id'])) {
    $exp_id = $_GET['edit_id'];
    $sql = "select * from experience where exp_id = $exp_id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $exp_id = $row['exp_id'];
        $exp_start = $row['start'];
        $exp_finish = $row['finish'];
        $company = $row['company'];
        $exp_des = $row['description'];
        $editer = $row['id'];
    }
}
if (isset($_POST['exp_save'])) {
    if (empty($_POST['exp_start'])) {
        array_push($errors, 'Enter start date');
    }
    if (empty($_POST['company'])) {
        array_push($errors, 'Enter company');
    }
    if (empty($_POST['exp_des'])) {
        array_push($errors, 'Enter description');
    }
    if (count($errors) === 0) {
        $exp_id = $_POST['exp_id'];
        $exp_start = $_POST['exp_start'];
        $exp_finish = $_POST['exp_finish'];
        $company = $_POST['company'];
        $exp_des = $_POST['exp_des'];
        $sql = "update experience set finish='$exp_finish',start='$exp_start',description='$exp_des', company='$company', id='$acc_id' where exp_id = $exp_id";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $_SESSION['message'] = 'Experience updated successfully';
            $_SESSION['type'] = 'success';
            header('location: ' . BASE_URL . "/exp/exp_index.php");
            exit();
        }
    } else {
        $exp_id = $_POST['exp_id'];
        $exp_start = $_POST['exp_start'];
        $exp_finish = $_POST['exp_finish'];
        $company = $_POST['company'];
        $exp_des = $_POST['exp_des'];
    }
}
// DELETE
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $sql = "delete from experience where exp_id = $delete_id";
    mysqli_query($conn, $sql);
    $_SESSION['message'] = 'Experience deleted successfully';
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . "/exp/exp_index.php");
    exit();
}
// SEARCH
if (isset($_REQUEST['term'])) {
    adminOnly();
    $param_term = mysqli_real_escape_string($conn, $_REQUEST['term']);
    if (strlen($param_term) > 0) {
        $sql = "select * from experience where (id='" . $acc_id . "') and (start LIKE '%" . $param_term . "%' or finish LIKE '%" . $param_term . "%' or company LIKE '%" . $param_term . "%' or description LIKE '%" . $param_term . "%')";
        $data = mysqli_query($conn, $sql);
        $resultSearch = mysqli_fetch_all($data);
    } else {
        $resultSearch = selectAll('experience', ['id' => $acc_id]);
    }
    echo "<thead>";
    echo "<tr>";
    echo "<th>Number</th>";
    echo "<th>Start date</th>";
    echo "<th>End date</th>";
    echo "<th>Name of Company</th>";
    echo "<th>Detail</th>";
    echo "<th>Edit</th>";
    echo "<th>Delete</th>";
    echo "</tr>";
    echo "</thead>";
    echo " <tbody>";
    $i = 1;
    foreach ($resultSearch as $key) {
        echo "<tr>";
        echo "<td>" . $i . "</td>";
        echo "<td>" . $key[1] . "</td>";
        echo "<td>" . $key[2] . "</td>";
        echo "<td>" . $key[3] . "</td>";
        echo "<td><a href='exp_detail.php?detail_id=" . $key[0] . "'><i class='fas fa-book-reader'></i></a></td>";
        echo "<td><a href='exp_edit.php?edit_id=" . $key[0] . "'><i class='far fa-edit'></i></a></td>";
        echo "<td><a href='exp_edit.php?delete_id=" . $key[0] . "'><i class='far fa-trash'></i></a></td>";
        echo "</tr>";
        $i++;
    }
    echo "</tbody>";
}
// IMPORT
if (isset($_POST['exp_preview'])) {
    adminOnly();
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)) {
        if (is_uploaded_file($_FILES['file']['tmp_name'])) {
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            fgetcsv($csvFile);
            $array = array();
            $sql = '';
            while (($line = fgetcsv($csvFile)) !== FALSE) {
                $sql = $sql . "insert into experience(start,finish,company,description,id) values('" . $line[0] . "','" . $line[1] . "','" . $line[2] . "','" . $line[3] . "','" . $acc_id . "');";
                array_push($array, $line);
            }
        }
    } else {
        array_push($errors, 'Enter your file');
    }
}

if (isset($_POST['exp_import_prv'])) {
    adminOnly();
    $sql = $_POST['array_import'];
    $sql = trim($sql, "\t");
    $newArr = explode(';', $sql);
    foreach ($newArr as $key => $value) {
        if ($value !== '') {
            insertWithData($value);
        }
    }
    $_SESSION['message'] = 'Experience imported successfully';
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . "/exp/exp_index.php");
    exit();
}