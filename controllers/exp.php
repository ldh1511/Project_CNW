<?php
require(ROOT_PATH . "/database/db.php");
?>

 <!-- Read certificate -->
<?php
    if(isset($_GET['exp_id'])){
        $exp_id = $_GET['exp_id'];
        $sql = "select * from experience where exp_id = $exp_id";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result)){
            $exp_id=$row['exp_id'];
            $exp_start=$row['start'];
            $exp_finish=$row['finish'];
            $company=$row['company'];
            $exp_des=$row['description'];
            $editer=$row['id'];
        }
    }
?>

 <!-- Add certificate -->
 <?php
if(isset($_POST['exp_add'])){
    $exp_start = $_POST['exp_start'];
    $exp_finish = $_POST['exp_finish'];
    $company = $_POST['company'];
    $exp_des = $_POST['exp_des'];    
    $editer = $_POST['editer'];
    $sql="insert into experience (start, finish, company, description, id) 
          values ('$exp_start','$exp_finish','$company','$exp_des','$editer')";
    $result= mysqli_query($conn,$sql);
                  if ($result){
                    header("Location: exp_index.php");
                  }
                  else{
                    echo 'error';
                  } 
}
?>


<!-- Update exp -->
<?php
    if(isset($_POST['exp_save'])){
      $exp_id = $_POST['exp_id'];
      $exp_start = $_POST['exp_start'];
      $exp_finish = $_POST['exp_finish'];
      $company = $_POST['company'];
      $exp_des = $_POST['exp_des'];
      $editer = $_POST['editer'];
      $sql = "update experience set finish='$exp_finish',start='$exp_start',description='$exp_des', company='$company', id='$editer'  
              where exp_id = $exp_id";
      $result= mysqli_query($conn,$sql);
                  if ($result){
                    header("Location: exp_index.php");
                  }
                  else{
                    echo 'error';
                  } 
      }
?>

<!-- Delete exp -->
<?php
    $delete_id = $_GET['delete_id'];
    if(isset($_GET['delete_id'])){
        $sql = "delete from experience where exp_id = $delete_id";
        mysqli_query($conn,$sql);
        header('Location: exp_index.php');
    }
?>