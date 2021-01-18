<?php
include($_SERVER['DOCUMENT_ROOT'] . "/project/database/db.php");
include($_SERVER['DOCUMENT_ROOT'] . "/project/helper/middleware.php");

if (isset($_SESSION['account_id'])) {
    $acc = selectOne('account', ['id' => $_SESSION['account_id']]);
    $acc_id = $acc['id'];
}
$list_ca = selectAll('certificate', ['id' => $acc_id]);
$errors = array();
// <!-- Read certificate -->

if (isset($_GET['detail_id'])) {
    $certificate_id = $_GET['detail_id'];
    $sql = "select * from certificate where certificate_id = $certificate_id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $certificate_id = $row['certificate_id'];
        $date = $row['date'];
        $certificate_name = $row['certificate_name'];
        $description = $row['description'];
    }
}


// <!-- Add certificate -->

if (isset($_POST['ca_add'])) {
    adminOnly();
    $ca_name = $_POST['ca_name'];
    $count = 0;
    if (empty($_POST['ca_date'])) {
        array_push($errors, 'Enter date');
    }
    if (empty($_POST['ca_name'])) {
        array_push($errors, 'Enter name');
    }
    if (empty($_POST['ca_description'])) {
        array_push($errors, 'Enter description');
    }
    foreach ($list_ca as $key) {
        if ($key[1] === $ca_name) {
            $count++;
        }
    }
    if ($count > 0) {
        array_push($errors, 'Error: namesake');
    }
    if (count($errors) === 0) {
        $ca_date = $_POST['ca_date'];
        $ca_name = $_POST['ca_name'];
        $ca_des = $_POST['ca_description'];
        $ca_id = $acc_id;
        $sql = "insert into certificate (date, certificate_name, description, id) 
          values ('$ca_date','$ca_name','$ca_des','$ca_id')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $_SESSION['message'] = 'Certificate added successfully';
            $_SESSION['type'] = 'success';
            header('location: ' . BASE_URL . "/ca/ca_index.php");
            exit();
        }
    } else {
        $ca_date = $_POST['ca_date'];
        $ca_name = $_POST['ca_name'];
        $ca_des = $_POST['ca_description'];
        $ca_id = $acc_id;
    }
}

if (isset($_GET['edit_id'])) {
    $certificate_id = $_GET['edit_id'];
    $sql = "select * from certificate where certificate_id = $certificate_id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $certificate_id = $row['certificate_id'];
        $ca_name = $row['certificate_name'];
        $ca_date = $row['date'];
        $ca_des = $row['description'];
        $editer = $row['id'];
    }
}
// <!-- Update certificate -->
if (isset($_POST['ca_save'])) {
    adminOnly();
    $changeArr = array();
    $ca_name = $_POST['certificate_name'];
    $count = 0;
    $certificate_id = $_POST['certificate_id'];
    $condition = "id='$acc_id' and certificate_id!='$certificate_id' ";
    $list_ca = selectCol('*', 'certificate', $condition);
    if (empty($_POST['date'])) {
        array_push($errors, 'Enter date');
    }
    if (empty($_POST['certificate_name'])) {
        array_push($errors, 'Enter name');
    }
    if (empty($_POST['description'])) {
        array_push($errors, 'Enter description');
    }
    foreach ($list_ca as $key) {
        if ($key[1] === $ca_name) {
            $count++;
        }
    }
    if ($count > 0) {
        array_push($errors, 'Error: namesake');
    }
    if (count($errors) === 0) {
        $certificate_id = $_POST['certificate_id'];
        $ca_name = $_POST['certificate_name'];
        $ca_date = $_POST['date'];
        $ca_des = $_POST['description'];
        $sql = "update certificate set date='$ca_date',certificate_name='$ca_name',description='$ca_des' where certificate_id = $certificate_id";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $_SESSION['message'] = 'Certificate updated successfully';
            $_SESSION['type'] = 'success';
            header('location: ' . BASE_URL . "/ca/ca_index.php");
            exit();
        }
    } else {
        $certificate_id = $_POST['certificate_id'];
        $ca_name = $_POST['certificate_name'];
        $ca_date = $_POST['date'];
        $ca_des = $_POST['description'];
    }
}
// <!-- Delete certificate -->

if (isset($_GET['delete_id'])) {
    adminOnly();
    $delete_id = $_GET['delete_id'];
    $sql = "delete from certificate where certificate_id = $delete_id";
    mysqli_query($conn, $sql);
    $_SESSION['message'] = 'Certificate deleted successfully';
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . "/ca/ca_index.php");
    exit();
}

if (isset($_REQUEST['term'])) {
    adminOnly();
    $param_term = mysqli_real_escape_string($conn, $_REQUEST['term']);
    if (strlen($param_term) > 0) {
        $sql = "select * from certificate where (id='" . $acc_id . "') and (certificate_name LIKE '%" . $param_term . "%' or date LIKE '%" . $param_term . "%' or description LIKE '%" . $param_term . "%')";
        $data = mysqli_query($conn, $sql);
        $resultSearch = mysqli_fetch_all($data);
    } else {
        $resultSearch = selectOne('account', ['id' => $_SESSION['account_id']]);
    }
    echo "<thead>";
    echo "<tr>";
    echo "<th>Number</th>";
    echo "<th>Date</th>";
    echo "<th>Name</th>";
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
        echo "<td>" . $key[0] . "</td>";
        echo "<td>" . $key[1] . "</td>";
        echo "<td><a href='ca_detail.php?detail_id=" . $key[3] . "'><i class='fas fa-book-reader'></i></a></td>";
        echo "<td><a href='ca_edit.php?edit_id=" . $key[3] . "'><i class='far fa-edit'></i></a></td>";
        echo "<td><a href='ca_edit.php?delete_id=" . $key[3] . "'><i class='far fa-trash'></i></a></td>";
        echo "</tr>";
        $i++;
    }
    echo "</tbody>";
}

if (isset($_POST['ca_preview'])) {
    adminOnly();
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)) {
        if (is_uploaded_file($_FILES['file']['tmp_name'])) {
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            fgetcsv($csvFile);
            $array = array();
            $sql = '';
            while (($line = fgetcsv($csvFile)) !== FALSE) {
                $sql = $sql . "insert into certificate(date,certificate_name,description,id) values('" . $line[0] . "','" . $line[1] . "','" . $line[2] . "','" . $acc_id . "');";
                array_push($array, $line);
            }
            $count = 0;
            foreach ($list_ca as $key) {
                foreach ($array as $key2) {
                    if ($key[1] === $key2[1]) {
                        $count++;
                    }
                }
            }
        }
    } else {
        array_push($errors, 'Enter your file');
    }
}

if (isset($_POST['ca_import_prv'])) {
    adminOnly();
    if ($_POST['array_error'] == '0') {
        $sql = $_POST['array_import'];
        $sql = trim($sql, "\t");
        $newArr = explode(';', $sql);
        foreach ($newArr as $key => $value) {
            if ($value !== '') {
                insertWithData($value);
            }
        }
        $_SESSION['message'] = 'Certificate imported successfully';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . "/ca/ca_index.php");
        exit();
    } else {
        array_push($errors, 'Can not update duplicate name');
    }
}
