<?php
require(ROOT_PATH . "/database/db.php");
?>

 <!-- Read certificate -->
<?php
    if(isset($_GET['skill_id'])){
        $skill_id = $_GET['skill_id'];
        $sql = "select * from skill where skill_id = $skill_id";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result)){
            $skill_id=$row['skill_id'];
            $skill_name=$row['skill_name'];
            $skill_des=$row['skill_description'];
            $skill_date=$row['skill_date'];
        }
    }
?>

 <!-- Add certificate -->
 <?php
if(isset($_POST['skill_add'])){
    $name = $_POST['skill_name'];
    $des = $_POST['skill_des'];   
    $sql="insert into skill(skill_name, skill_description) 
          values ('$name','$des')";
    $result= mysqli_query($conn,$sql);
                  if ($result){
                    header("Location: skill_index.php");
                  }
                  else{
                    echo 'error';
                  } 
}
?>

<!-- Update skill -->
<?php
    if(isset($_POST['skill_save'])){
      $skill_id = $_POST['skill_id'];
      $skill_name = $_POST['skill_name'];
      $skill_des = $_POST['skill_des'];
      $sql = "update skill set skill_description='$skill_des', skill_name='$skill_name'  
              where skill_id = $skill_id";
      $result= mysqli_query($conn,$sql);
                  if ($result){
                    header("Location: skill_index.php");
                  }
                  else{
                    echo 'error';
                  } 
      }
?>

<!-- Delete skill -->
<?php
    $delete_id = $_GET['delete_id'];
    if(isset($_GET['delete_id'])){
        $sql = "delete from skill where skill_id = $delete_id";
        mysqli_query($conn,$sql);
        header('Location: skill_index.php');
    }
?>