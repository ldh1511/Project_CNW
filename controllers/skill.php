<?php
include($_SERVER['DOCUMENT_ROOT'] . "/project/database/db.php");
include($_SERVER['DOCUMENT_ROOT'] . "/project/helper/middleware.php");
if (isset($_SESSION['account_id'])) {
    $acc = selectOne('account', ['id' => $_SESSION['account_id']]);
    $acc_id = $acc['id'];
}
$skill = selectCol('*', 'skill, skill_account', "skill_account.skill_id=skill.skill_id and skill_account.id=$acc_id");
$skill_name = selectCol('*', 'skill', "skill_id not in (select skill_id from skill_account where id='$acc_id')");
$errors = array();
// READ
if (isset($_GET['detail_id'])) {
    $result = selectOne('skill', ['skill_id' => $_GET['detail_id']]);
    $name = $result['skill_name'];
    $des = $result['skill_description'];
}
// INSERT
if (isset($_POST['skill_add'])) {
    if (empty($_POST['skill_id'])) {
        array_push($errors, 'You must choose skill');
    }
    if (count($errors) === 0) {
        unset($_POST['skill_add']);
        insert('skill_account', $_POST);
        $_SESSION['message'] = 'Skill added successfully';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . "/skill/skill_index.php");
        exit();
    }
}
// DELETE
if (isset($_GET['delete_id'])) {
    $skill_id = $_GET['delete_id'];
    $sql = "delete from skill_account where skill_id='$skill_id' and id='$acc_id'";
    mysqli_query($conn, $sql);
    $_SESSION['message'] = 'Skill deleted successfully';
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . "/skill/skill_index.php");
    exit();
}
// SEARCH
if (isset($_REQUEST['term'])) {
    adminOnly();
    $param_term = mysqli_real_escape_string($conn, $_REQUEST['term']);
    if (strlen($param_term) > 0) {
        $sql = "select *from skill, skill_account where (skill_account.skill_id=skill.skill_id and skill_account.id=$acc_id) and (skill_name LIKE '%" . $param_term . "%' or skill_description LIKE '%" . $param_term . "%')";
        $data = mysqli_query($conn, $sql);
        $resultSearch = mysqli_fetch_all($data);
    } else {
        $resultSearch = selectCol('*', 'skill, skill_account', "skill_account.skill_id=skill.skill_id and skill_account.id=$acc_id");
    }
    echo "<thead>";
    echo "<tr>";
    echo "<th>Number</th>";
    echo "<th>Name</th>";
    echo "<th>Description</th>";
    echo "<th>Detail</th>";
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
        echo "<td><a href='skill_detail.php?detail_id=" . $key[0] . "'><i class='fas fa-book-reader'></i></a></td>";
        echo "<td><a href='skill_detail.php?delete_id=" . $key[0] . "'><i class='far fa-trash'></i></a></td>";
        echo "</tr>";
        $i++;
    }
    echo "</tbody>";
}
