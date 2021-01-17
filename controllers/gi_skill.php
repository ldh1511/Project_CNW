<?php
include($_SERVER['DOCUMENT_ROOT'] . "/project/database/db.php");
include($_SERVER['DOCUMENT_ROOT'] . "/project/helper/middleware.php");

if (isset($_SESSION['account_id'])) {
    $acc = selectOne('account', ['id' => $_SESSION['account_id']]);
    $acc_id = $acc['id'];
}
$list_skill = selectCol('skill.*, account.name', 'skill,account', 'skill.id=account.id');
$errors = array();
$name = '';
$des = '';
// READ
if (isset($_GET['detail_id'])) {
    $skill_id = $_GET['detail_id'];
    $sql = "select * from skill where skill_id = $skill_id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $skill_id = $row['skill_id'];
        $skill_name = $row['skill_name'];
        $skill_des = $row['skill_description'];
        $skill_date = $row['add_at'];
    }
}
//INSERT
if (isset($_POST['skill_add'])) {
    if (empty($_POST['skill_name'])) {
        array_push($errors, 'Enter name');
    }
    if (empty($_POST['skill_des'])) {
        array_push($errors, 'Enter describle');
    }
    if (count($errors) === 0) {
        $name = $_POST['skill_name'];
        $des = $_POST['skill_des'];
        $sql = "insert into skill(skill_name, skill_description, id) values ('$name','$des','$acc_id')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $_SESSION['message'] = 'Skill added successfully';
            $_SESSION['type'] = 'success';
            header('location: ' . BASE_URL . "/gi_skill/skill_index.php");
            exit();
        }
    } else {
        $name = $_POST['skill_name'];
        $des = $_POST['skill_des'];
    }
}
// EDIT
if (isset($_GET['edit_id'])) {
    $skill_id = $_GET['edit_id'];
    $sql = "select * from skill where skill_id = $skill_id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $skill_id = $row['skill_id'];
        $skill_name = $row['skill_name'];
        $skill_des = $row['skill_description'];
        $skill_date = $row['add_at'];
    }
}
if (isset($_POST['skill_save'])) {
    if (empty($_POST['skill_name'])) {
        array_push($errors, 'Enter name');
    }
    if (empty($_POST['skill_des'])) {
        array_push($errors, 'Enter describle');
    }
    if (count($errors) === 0) {
        $skill_id = $_POST['skill_id'];
        $skill_name = $_POST['skill_name'];
        $skill_des = $_POST['skill_des'];
        $sql = "update skill set skill_description='$skill_des', skill_name='$skill_name' where skill_id = $skill_id";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $_SESSION['message'] = 'Skill updated successfully';
            $_SESSION['type'] = 'success';
            header('location: ' . BASE_URL . "/gi_skill/skill_index.php");
            exit();
        }
    } else {
        $skill_id = $_POST['skill_id'];
        $skill_name = $_POST['skill_name'];
        $skill_des = $_POST['skill_des'];
    }
}
// DELETE
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    delete('skill_account',$delete_id,'skill_id');
    $sql = "delete from skill where skill_id = $delete_id";
    mysqli_query($conn, $sql);
    $_SESSION['message'] = 'Skill deleted successfully';
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . "/gi_skill/skill_index.php");
    exit();
}
// SEARCH
if (isset($_REQUEST['term'])) {
    adminOnly();
    $param_term = mysqli_real_escape_string($conn, $_REQUEST['term']);
    if (strlen($param_term) > 0) {
        $sql = "select skill.*, account.name from skill, account where (skill.id=account.id) and (skill_name LIKE '%" . $param_term . "%' or skill_description LIKE '%" . $param_term . "%' or add_at LIKE '%" . $param_term . "%' or account.name LIKE '%" . $param_term . "%')";
        $data = mysqli_query($conn, $sql);
        $resultSearch = mysqli_fetch_all($data);
    } else {
        $resultSearch = selectCol('skill.*, account.name', 'skill,account', 'skill.id=account.id');
    }
    echo "<thead>";
    echo "<tr>";
    echo "<th>Number</th>";
    echo "<th>Name</th>";
    echo "<th>Description</th>";
    echo "<th>Date</th>";
    echo "<th>Add by</th>";
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
        echo "<td>" . html_entity_decode(substr($key[2], 0, 35) . "...") . "</td>";
        echo "<td>" . $key[3] . "</td>";
        echo "<td>" . $key[5] . "</td>";
        echo "<td><a href='skill_detail.php?detail_id=" . $key[0] . "'><i class='fas fa-book-reader'></i></a></td>";
        echo "<td><a href='skill_edit.php?edit_id=" . $key[0] . "'><i class='far fa-edit'></i></a></td>";
        echo "<td><a href='skill_edit.php?delete_id=" . $key[0] . "'><i class='far fa-trash'></i></a></td>";
        echo "</tr>";
        $i++;
    }
    echo "</tbody>";
}
// IMPORT
if (isset($_POST['skill_preview'])) {
    adminOnly();
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)) {
        if (is_uploaded_file($_FILES['file']['tmp_name'])) {
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            fgetcsv($csvFile);
            $array = array();
            $sql = '';
            while (($line = fgetcsv($csvFile)) !== FALSE) {
                $sql = $sql . "insert into skill(skill_name,skill_description,id) values('" . $line[0] . "','" . $line[1] . "','" . $acc_id . "');";
                array_push($array, $line);
            }
        }
    } else {
        array_push($errors, 'Enter your file');
    }
}

if (isset($_POST['skill_import_prv'])) {
    adminOnly();
    $sql = $_POST['array_import'];
    $sql = trim($sql, "\t");
    $newArr = explode(';', $sql);
    foreach ($newArr as $key => $value) {
        if ($value !== '') {
            insertWithData($value);
        }
    }
    $_SESSION['message'] = 'Skill imported successfully';
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . "/gi_skill/skill_index.php");
    exit();
}