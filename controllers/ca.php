<?php
require(ROOT_PATH . "/database/db.php");
?>

 <!-- Read certificate -->
<?php
    if(isset($_GET['certificate_id'])){
        $certificate_id = $_GET['certificate_id'];
        $sql = "select * from certificate where certificate_id = $certificate_id";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result)){
            $certificate_id=$row['certificate_id'];
            $date=$row['date'];
            $certificate_name=$row['certificate_name'];
            $description=$row['description'];
        }
    }
?>

 <!-- Add certificate -->
 <?php
if(isset($_POST['ca_add'])){
    $ca_date = $_POST['ca_date'];
    $ca_name = $_POST['ca_name'];
    $ca_des = $_POST['ca_description'];    
    $ca_id = $_POST['ca_id'];
    $sql="insert into certificate (date, certificate_name, description, id) 
          values ('$ca_date','$ca_name','$ca_des','$ca_id')";
    $result= mysqli_query($conn,$sql);
                  if ($result){
                    header("Location: ca_index.php");
                  }
                  else{
                    echo 'error';
                  } 
}
?>

<!-- Read certificate -->
<?php
    if(isset($_GET['certificate_id'])){
        $certificate_id = $_GET['certificate_id'];
        $sql = "select * from certificate where certificate_id = $certificate_id";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result)){
            $certificate_id=$row['certificate_id'];
            $ca_name = $row['certificate_name'];
            $ca_date = $row['date'];
            $ca_des = $row['description'];
            $editer = $row['id'];
        }
      }
?>

<!-- Update certificate -->
<?php
    if(isset($_POST['ca_save'])){
      $certificate_id = $_POST['certificate_id'];
      $ca_name = $_POST['certificate_name'];
      $ca_date = $_POST['date'];
      $ca_des = $_POST['description'];
        
      $sql = "update certificate set date='$ca_date',certificate_name='$ca_name',description='$ca_des' where certificate_id = $certificate_id";
      $result= mysqli_query($conn,$sql);
                  if ($result){
                    header("Location: ca_index.php");
                  }
                  else{
                    echo 'error';
                  } 
      }
?>

<!-- Delete certificate -->
<?php
    $delete_id = $_GET['delete_id'];
    if(isset($_GET['delete_id'])){
        $sql = "delete from certificate where certificate_id = $delete_id";
        mysqli_query($conn,$sql);
        header('Location: ca_index.php');
    }
?>