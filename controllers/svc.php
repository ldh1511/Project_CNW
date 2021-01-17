<?php 
include($_SERVER['DOCUMENT_ROOT'] . "/project/database/db.php");
include($_SERVER['DOCUMENT_ROOT'] . "/project/helper/middleware.php");

if (isset($_SESSION['account_id'])) {
    $acc = selectOne('account', ['id' => $_SESSION['account_id']]);
    $acc_id = $acc['id'];
}
$Columns = 'service_id,service_name,price, service_description, account.name';
$tables = 'service, account';
$condition = 'service.id=account.id';
$errors = array();
$svc = selectCol($Columns, $tables, $condition);
$svc_id = '';
$svc_name = '';
$svc_des = '';
$svc_price = '';
$svc_acc = '';
$history = selectCol('history_service.*, account.name', 'history_service, account', 'history_service.id=account.id');

// INSERT
if (isset($_POST['svc_add'])) {
    adminOnly();
    $svc_name = $_POST['service_name'];
    $count = 0;
    if (empty($_POST['service_name'])) {
        array_push($errors, 'Enter service name');
    }
    if (empty($_POST['price'])) {
        array_push($errors, 'Enter price');
    }
    if (empty($_POST['service_description'])) {
        array_push($errors, 'Enter service description');
    }
    foreach ($svc as $key) {
        if ($key[1] === $svc_name) {
            $count++;
        }
    }
    if ($count > 0) {
        array_push($errors, 'Error: namesake');
    }
    if (count($errors) === 0) {
        unset($_POST['svc_add']);

        $check = true;
        foreach ($svc as $key) {
            if ($_POST['service_name'] == $key[1]) {
                $check = false;
                break;
            } else {
                $check = true;
            }
        }
        if ($check === true) {
            insert('service', $_POST);
            $_SESSION['message'] = 'Service added successfully';
            $_SESSION['type'] = 'success';
            header('location: ' . BASE_URL . "/svc/svc_index.php");
            exit();
        } else {
            $_SESSION['message'] = 'Can not insert duplicate title';
            $_SESSION['type'] = 'error';
            header('location: ' . BASE_URL . "/svc/svc_index.php");
            exit();
        }
    } else {
        $svc_name = $_POST['service_name'];
        $svc_des = $_POST['service_description'];
        $svc_price = $_POST['price'];
    }
}

// READ
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = selectOneWithCol($Columns, $tables, [0 => $condition, 1 => "service_id=$id"]);
    $svc_name = $result['service_name'];
    $svc_des = $result['service_description'];
    $svc_price = $result['price'];
    $svc_acc = $result['name'];
}
// EDIT
if (isset($_GET['editId'])) {
    $id = $_GET['editId'];
    $result = selectOneWithCol($Columns, $tables, [0 => $condition, 1 => "service_id=$id"]);
    $svc_id = $result['service_id'];
    $svc_name = $result['service_name'];
    $svc_des = $result['service_description'];
    $svc_price = $result['price'];
}
if (isset($_POST['svc_edit'])) {
    adminOnly();
    $changeArr = array();
    $svc_name = $_POST['service_name'];
    $count = 0;
    $svc_id = $_POST['svc_id'];
    $svc=selectCol('*','service',"service_id !=$svc_id");
    if (empty($_POST['service_name'])) {
        array_push($errors, 'Enter service name');
    }
    if (empty($_POST['price'])) {
        array_push($errors, 'Enter price');
    }
    if (empty($_POST['service_description'])) {
        array_push($errors, 'Enter service description');
    }
    foreach ($svc as $key) {
        if ($key[1] === $svc_name) {
            echo $svc_name;
            echo $key[1];
            $count++;
        }
    }
    if ($count > 0) {
        array_push($errors, 'Error: namesake');
    }
    if (count($errors) === 0) {
        $result = selectOne('service', ['service_id' => $_POST['svc_id']]);
        unset($_POST['svc_edit'], $_POST['svc_id']);
        if ($_POST['service_name'] != $result['service_name']) {
            array_push($changeArr, 'name');
        }
        if ($_POST['price'] != $result['price']) {
            array_push($changeArr, 'price');
        }
        if ($_POST['service_description'] != $result['service_description']) {
            array_push($changeArr, 'description');
        }
        update('service', $svc_id, $_POST, 'service_id');
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
            $sql = "insert into history_service(content,id,service_id) values('$content', '$acc_id','$svc_id')";
            insertWithData($sql);
        }
        $_SESSION['message'] = 'Service updated successfully';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . "/svc/svc_index.php");
        exit();
    } else {
        $svc_name = $_POST['service_name'];
        $svc_des = $_POST['service_description'];
        $svc_price = $_POST['price'];
        $svc_id = $_POST['svc_id'];
        print_r($errors);
    }
}
// DELETE
if (isset($_GET['delete_Id'])) {
    adminOnly();
    $id = $_GET['delete_Id'];
    delete('history_service', $_GET['delete_Id'], 'service_id');
    delete('service', $_GET['delete_Id'], 'service_id');
    $_SESSION['message'] = 'Service deleted successfully';
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . "/svc/svc_index.php");
    exit();
}
// SEARCH
if (isset($_REQUEST['term'])) {
    adminOnly();
    $param_term = mysqli_real_escape_string($conn, $_REQUEST['term']);
    if (strlen($param_term) > 0) {
        $sql = "select service_id,service_name,price, service_description, account.name from service, account where (service.id=account.id) and (service_name LIKE '%" . $param_term . "%' or service.price LIKE '%" . $param_term . "%' or service.service_description LIKE '%" . $param_term . "%' or account.name LIKE '%" . $param_term . "%')";
        $data = mysqli_query($conn, $sql);
        $resultSearch = mysqli_fetch_all($data);
    } else {
        $resultSearch = selectCol($Columns, $tables, $condition);
    }
    echo "<thead>";
    echo "<tr>";
    echo "<th>Number</th>";
    echo "<th>Name</th>";
    echo "<th>Price</th>";
    echo "<th>Description</th>";
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
        echo "<td>" . $key[2] . "</td>";
        echo "<td>" . html_entity_decode(substr($key[3], 0, 35) . "...") . "</td>";
        echo "<td>" . $key[4] . "</td>";
        echo "<td><a href='svc_detail.php?id=" . $key[0] . "'><i class='fas fa-book-reader'></i></a></td>";
        echo "<td><a href='svc_edit.php?editId=" . $key[0] . "'><i class='far fa-edit'></i></a></td>";
        echo "<td><a href='svc_edit.php?delete_Id=" . $key[0] . "'><i class='far fa-trash'></i></a></td>";
        echo "</tr>";
        $i++;
    }
    echo "</tbody>";
}
// IMPORT
if (isset($_POST['svc_preview'])) {
    adminOnly();
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)) {
        if (is_uploaded_file($_FILES['file']['tmp_name'])) {
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            fgetcsv($csvFile);
            $array = array();
            $sql = '';
            while (($line = fgetcsv($csvFile)) !== FALSE) {
                $sql = $sql . "insert into service(service_name,price,service_description,id) values('" . $line[0] . "','" . $line[1] . "','" . $line[2] . "','" . $acc_id . "');";
                array_push($array, $line);
            }
            $count = 0;
            foreach ($svc as $key) {
                foreach ($array as $key2) {
                    if ($key[1] === $key2[0]) {
                        $count++;
                    }
                }
            }
        }
    } else {
        array_push($errors, 'Enter your file');
    }
}

if (isset($_POST['svc_import_prv'])) {
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
        $_SESSION['message'] = 'Service imported successfully';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . "/svc/svc_index.php");
        exit();
    } else {
        array_push($errors, 'Can not update duplicate name');
    }
}
// HISTORY
if (isset($_GET['history_id'])) {
    delete('history_service', $_GET['history_id'], 'history_svc_id');
    $_SESSION['message'] = 'Service history deleted successfully';
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . "/svc/svc_history.php");
    exit();
}
