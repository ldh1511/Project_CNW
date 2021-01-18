<?php
include($_SERVER['DOCUMENT_ROOT'] . "/project/database/db.php");
include($_SERVER['DOCUMENT_ROOT'] . "/project/helper/middleware.php");

if (isset($_SESSION['account_id'])) {
    $acc = selectOne('account', ['id' => $_SESSION['account_id']]);
    $acc_id = $acc['id'];
}
$social = selectAll('social_links', ['id' => $acc_id]);
$errors = array();
$name = '';
$link = '';
$id = '';
// INSERT
if (isset($_POST['social_add'])) {
    if (empty($_POST['social_name'])) {
        array_push($errors, 'Enter name');
    }
    if (empty($_POST['link'])) {
        array_push($errors, 'Enter link');
    }
    if (count($errors) === 0) {
        print_r(($_POST));
        unset($_POST['social_add']);
        insert('social_links', $_POST);
        $_SESSION['message'] = 'Social link added successfully';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . "/social/social_index.php");
        exit();
    } else {
        $name = $_POST['social_name'];
        $link = $_POST['link'];
    }
}
// EDIT
if (isset($_GET['edit_Id'])) {
    $result = selectOne('social_links', ['social_id' => $_GET['edit_Id']]);
    $name = $result['social_name'];
    $link = $result['link'];
    $id = $result['social_id'];
}
if (isset($_POST['social_edit'])) {
    if (empty($_POST['social_name'])) {
        array_push($errors, 'Enter name');
    }
    if (empty($_POST['link'])) {
        array_push($errors, 'Enter link');
    }
    if (count($errors) === 0) {
        unset($_POST['social_edit']);
        update('social_links', $_POST['social_id'], $_POST, 'social_id');
        $_SESSION['message'] = 'Social link updated successfully';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . "/social/social_index.php");
        exit();
    } else {
        $name = $_POST['social_name'];
        $link = $_POST['link'];
        $id = $_POST['social_id'];
    }
}
// DELETE
if (isset($_GET['delete_Id'])) {
    delete('social_links', $_GET['delete_Id'], 'social_id');
    $_SESSION['message'] = 'Social link deleted successfully';
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . "/social/social_index.php");
    exit();
}
// LIVE SEARCH
if (isset($_REQUEST['term'])) {
    adminOnly();
    $param_term = mysqli_real_escape_string($conn, $_REQUEST['term']);
    if (strlen($param_term) > 0) {
        $sql = "select * from social_links where id='".$acc_id."' and (social_name LIKE '%" . $param_term . "%' or link LIKE '%" . $param_term . "%')";
        $data = mysqli_query($conn, $sql);
        $resultSearch = mysqli_fetch_all($data);
    } else {
        $resultSearch = selectAll('social_links', ['id' => $acc_id]);
    }
    echo "<thead>";
    echo "<tr>";
    echo "<th>Number</th>";
    echo "<th class='col-hidden'>Name</th>";
    echo "<th>Link</th>";
    echo "<th>Edit</th>";
    echo "<th>Delete</th>";
    echo "</tr>";
    echo "</thead>";
    echo " <tbody>";
    $i = 1;
    foreach ($resultSearch as $key) {
        echo "<tr>";
        echo "<td>" . $i . "</td>";
        echo "<td class='col-hidden'>" . $key[1] . "</td>";
        echo "<td>" . $key[2] . "</td>";
        echo "<td><a href='social_edit.php?edit_Id=" . $key[0] . "'><i class='far fa-edit'></i></a></td>";
        echo "<td><a href='social_edit.php?delete_Id=" . $key[0] . "'><i class='far fa-trash'></i></a></td>";
        echo "</tr>";
        $i++;
    }
    echo "</tbody>";
}
// IMPORT FILE
if (isset($_POST['social_preview'])) {
    adminOnly();
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)) {
        if (is_uploaded_file($_FILES['file']['tmp_name'])) {
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            fgetcsv($csvFile);
            $array = array();
            $sql = '';
            while (($line = fgetcsv($csvFile)) !== FALSE) {
                $sql = $sql . "insert into social_links(social_name,link,id) values('" . $line[0] . "','" . $line[1] . "','" . $acc_id . "');";
                array_push($array, $line);
            }
        }
    } else {
        array_push($errors, 'Enter your file');
    }
}

if (isset($_POST['social_import_prv'])) {
    adminOnly();
    $sql = $_POST['array_import'];
    $sql = trim($sql, "\t");
    $newArr = explode(';', $sql);
    foreach ($newArr as $key => $value) {
        if ($value !== '') {
            insertWithData($value);
        }
    }
    $_SESSION['message'] = 'Link imported successfully';
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . "/social/social_index.php");
    exit();
}
