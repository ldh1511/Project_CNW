<?php
require(ROOT_PATH . "/database/db.php");
?>

 <!-- Read certificate -->
<?php
    if(isset($_GET['education_id'])){
        $education_id = $_GET['education_id'];
        $sql = "select * from education where education_id = $education_id";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result)){
            $education_id=$row['education_id'];
            $edu_start=$row['start'];
            $edu_finish=$row['finish'];
            $type=$row['type'];
            $edu_des=$row['description'];
            $editer=$row['id'];
        }
    }
?>

 <!-- Add certificate -->
 <?php
if(isset($_POST['edu_add'])){
    $edu_start = $_POST['edu_start'];
    $edu_finish = $_POST['edu_finish'];
    $type = $_POST['type'];
    $edu_des = $_POST['edu_des'];    
    $edit_id = $_POST['edit_id'];
    $sql="insert into education (start, finish, type, description, id) 
          values ('$edu_start','$edu_finish','$type','$edu_des','$edit_id')";
    $result= mysqli_query($conn,$sql);
                  if ($result){
                    header("Location: edu_index.php");
                  }
                  else{
                    echo 'error';
                  } 
}
?>

<!-- Read education -->
<?php
    if(isset($_GET['education_id'])){
        $education_id = $_GET['education_id'];
        $sql = "select * from education where education_id = $education_id";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result)){
            $education_id=$row['education_id'];
            $edu_start = $row['start'];
            $edu_finish = $row['finish'];
            $type=$row['type'];
            $edu_des = $row['description'];
            $editer = $row['id'];
        }
      }
?>

<!-- Update education -->
<?php
    if(isset($_POST['edu_save'])){
      $education_id = $_POST['education_id'];
      $edu_start = $_POST['edu_start'];
      $edu_finish = $_POST['edu_finish'];
      $type = $_POST['type'];
      $edu_des = $_POST['edu_des'];
      $editer = $_POST['editer'];
      $sql = "update education set finish='$edu_finish',start='$edu_start',description='$edu_des', type='$type', id='$editer'  
              where education_id = $education_id";
      $result= mysqli_query($conn,$sql);
                  if ($result){
                    header("Location: edu_index.php");
                  }
                  else{
                    echo 'error';
                  } 
      }
?>

<!-- Delete education -->
<?php
    $delete_id = $_GET['delete_id'];
    if(isset($_GET['delete_id'])){
        $sql = "delete from education where education_id = $delete_id";
        mysqli_query($conn,$sql);
        header('Location: edu_index.php');
    }
?>