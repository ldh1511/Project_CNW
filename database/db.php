<?php
session_start();
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

function update($table, $id, $data){
    global $conn;
    $sql="update $table set ";
    $i=0;
    foreach ($data as $key => $value) {
        if($i===0){
            $sql=$sql." $key='$value'";
        }
        else{
            $sql=$sql.", $key='$value'";
        }
        $i++;
    }
    $sql=$sql." where id='$id'";
    mysqli_query($conn, $sql);
}

