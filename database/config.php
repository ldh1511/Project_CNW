<?php
$conn = mysqli_connect('localhost', 'root', '', 'cv');
mysqli_set_charset($conn, 'UTF8');
if (!$conn) {
    die('error');
}
// $sql = 'select * from account';
// $data = mysqli_query($conn, $sql);
// $result = mysqli_fetch_all($data);
// foreach ($result as $key) {
//     $pass = password_hash($key[1], PASSWORD_DEFAULT);
//     $sql = "update account set password='$pass' where id= $key[2]";
//     $data = mysqli_query($conn, $sql);
// }
