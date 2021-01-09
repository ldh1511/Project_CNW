<?php
require(ROOT_PATH . "/database/db.php")
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
    $sql="insert into certificate (date, certificate_name, description) values ('$ca_date','$ca_name','$ca_des')";
    $result= mysqli_query($conn,$sql);
                  if ($result){
                    header("Location: ca_index.php");
                  }
                  else{
                    echo 'error';
                  } 
}
?>


