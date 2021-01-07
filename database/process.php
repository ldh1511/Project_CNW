<?php
require('config.php');
function selectAll($table, $conditions = [])
{
    global $conn;
    $sql = "select * from $table";
    if (empty($conditions)) {
        $data = mysqli_query($conn, $sql);
        $result = mysqli_fetch_all($data);
        return $result;
    } else {
        $i = 0;
        foreach ($conditions as $key => $value) {
            if ($i === 0) {
                $sql = $sql . " where $key='$value'";
            } else {
                $sql = $sql . " and $key='$value'";
            }
            $i++;
        }
        $data = mysqli_query($conn, $sql);
        $result = mysqli_fetch_all($data);
        return $result;
    }
}
function selectOne($table, $conditions)
{
    global $conn;
    $sql = "select * from $table";
    $i = 0;
    foreach ($conditions as $key => $value) {
        if ($i === 0) {
            $sql = $sql . " where $key='$value'";
        } else {
            $sql = $sql . " and $key='$value'";
        }
        $i++;
    }
    $data = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($data);
    return $result;
}

if (isset($_POST['btn-login'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $result = selectOne('account', ['name' => $name, 'password' => $password]);
    if ($result) {
        header('location: ' . BASE_URL . "/acc/accdetail_index.php");
    } else {
        header('location: ' . BASE_URL . "/index.php");
    }
}
