<?php
include($_SERVER['DOCUMENT_ROOT'] . "/project/database/db.php");
include($_SERVER['DOCUMENT_ROOT'] . "/project/helper/middleware.php");

if (isset($_SESSION['account_id'])) {
    $acc = selectOne('account', ['id' => $_SESSION['account_id']]);
    $acc_id = $acc['id'];
}
$list_edu = selectAll('education', ['id' => $acc_id]);
$errors = array();

// READ
if (isset($_GET['detail_id'])) {
    $education_id = $_GET['detail_id'];
    $sql = "select * from education where education_id = $education_id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $education_id = $row['education_id'];
        $edu_start = $row['start'];
        $edu_finish = $row['finish'];
        $edu_name = $row['name'];
        $edu_des = $row['description'];
    }
}
// INSERT
if (isset($_POST['edu_add'])) {
    adminOnly();
    if (empty($_POST['edu_start'])) {
        array_push($errors, 'Enter start date');
    }
    if (empty($_POST['edu_name'])) {
        array_push($errors, 'Enter name of school');
    }
    if (empty($_POST['edu_des'])) {
        array_push($errors, 'Enter description');
    }
    if (count($errors) === 0) {
        $edu_start = $_POST['edu_start'];
        $edu_finish = $_POST['edu_finish'];
        $edu_name = $_POST['edu_name'];
        $edu_des = $_POST['edu_des'];
        $sql = "insert into education (start, finish, name, description, id) values ('$edu_start','$edu_finish','$edu_name','$edu_des','$acc_id')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $_SESSION['message'] = 'Education added successfully';
            $_SESSION['type'] = 'success';
            header('location: ' . BASE_URL . "/edu/edu_index.php");
            exit();
        }
    } else {
        $edu_start = $_POST['edu_start'];
        $edu_finish = $_POST['edu_finish'];
        $edu_des = $_POST['edu_des'];
        $edu_name = $_POST['edu_name'];
    }
}
// EDIT
if (isset($_GET['edit_id'])) {
    $education_id = $_GET['edit_id'];
    $sql = "select * from education where education_id = $education_id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $education_id = $row['education_id'];
        $edu_start = $row['start'];
        $edu_finish = $row['finish'];
        $edu_name = $row['name'];
        $edu_des = $row['description'];
        $editer = $row['id'];
    }
}
if (isset($_POST['edu_save'])) {
    adminOnly();
    if (empty($_POST['edu_start'])) {
        array_push($errors, 'Enter start date');
    }
    if (empty($_POST['edu_name'])) {
        array_push($errors, 'Enter name of school');
    }
    if (empty($_POST['edu_des'])) {
        array_push($errors, 'Enter description');
    }
    if (count($errors) === 0) {
        $education_id = $_POST['education_id'];
        $edu_start = $_POST['edu_start'];
        $edu_finish = $_POST['edu_finish'];
        $edu_des = $_POST['edu_des'];
        $edu_name = $_POST['edu_name'];
        $sql = "update education set finish='$edu_finish',start='$edu_start',description='$edu_des', name='$edu_name' where education_id = '$education_id' and id='$acc_id'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $_SESSION['message'] = 'Education updated successfully';
            $_SESSION['type'] = 'success';
            header('location: ' . BASE_URL . "/edu/edu_index.php");
            exit();
        }
    } else {
        $education_id = $_POST['education_id'];
        $edu_start = $_POST['edu_start'];
        $edu_finish = $_POST['edu_finish'];
        $edu_des = $_POST['edu_des'];
        $edu_name = $_POST['edu_name'];
    }
}
// DELETE
if (isset($_GET['delete_id'])) {
    adminOnly();
    $delete_id = $_GET['delete_id'];
    $sql = "delete from education where education_id = $delete_id";
    mysqli_query($conn, $sql);
    $_SESSION['message'] = 'Education deleted successfully';
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . "/edu/edu_index.php");
    exit();
}
// SEARCH
if (isset($_REQUEST['term'])) {
    adminOnly();
    $param_term = mysqli_real_escape_string($conn, $_REQUEST['term']);
    if (strlen($param_term) > 0) {
        $sql = "select * from education where (id='" . $acc_id . "') and (start LIKE '%" . $param_term . "%' or finish LIKE '%" . $param_term . "%' or name LIKE '%" . $param_term . "%' or description LIKE '%" . $param_term . "%')";
        $data = mysqli_query($conn, $sql);
        $resultSearch = mysqli_fetch_all($data);
    } else {
        $resultSearch = selectAll('education', ['id' => $acc_id]);
    }
    echo "<thead>";
    echo "<tr>";
    echo "<th>Number</th>";
    echo "<th>Start date</th>";
    echo "<th class='col-hidden'>Finish date</th>";
    echo "<th>School</th>";
    echo "<th class='col-hidden'>Description</th>";
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
        echo "<td class='col-hidden'>" . $key[2] . "</td>";
        echo "<td>" . $key[3] . "</td>";
        echo "<td class='col-hidden'>" . html_entity_decode(substr($key[4], 0, 35) . "...") . "</td>";
        echo "<td><a href='edu_detail.php?detail_id=" . $key[0] . "'><i class='fas fa-book-reader'></i></a></td>";
        echo "<td><a href='edu_edit.php?edit_id=" . $key[0] . "'><i class='far fa-edit'></i></a></td>";
        echo "<td><a href='edu_edit.php?delete_id=" . $key[0] . "'><i class='far fa-trash'></i></a></td>";
        echo "</tr>";
        $i++;
    }
    echo "</tbody>";
}
// IMPORT
if (isset($_POST['edu_preview'])) {
    adminOnly();
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)) {
        if (is_uploaded_file($_FILES['file']['tmp_name'])) {
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            fgetcsv($csvFile);
            $array = array();
            $sql = '';
            while (($line = fgetcsv($csvFile)) !== FALSE) {
                $sql = $sql . "insert into education(start,finish,name,description,id) values('" . $line[0] . "','" . $line[1] . "','" . $line[2] . "','" . $line[3] . "','" . $acc_id . "');";
                array_push($array, $line);
            }
        }
    } else {
        array_push($errors, 'Enter your file');
    }
}

if (isset($_POST['edu_import_prv'])) {
    adminOnly();
    $sql = $_POST['array_import'];
    $sql = trim($sql, "\t");
    $newArr = explode(';', $sql);
    foreach ($newArr as $key => $value) {
        if ($value !== '') {
            insertWithData($value);
        }
    }
    $_SESSION['message'] = 'Education imported successfully';
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . "/edu/edu_index.php");
    exit();
}