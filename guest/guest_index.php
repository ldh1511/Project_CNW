<?php include('../path.php');?>
<?php include(ROOT_PATH."/controllers/contact.php"); ?>
<!doctype html>
<html lang="en">

<head>
    <title>OurCV</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>
      <body>
    <div class="main-container">
        <div class="content-box">
            <?php include(ROOT_PATH . "/includes/left_menu.php") ?>
            <div class="content-right admin-container">
                <!--  resume -->
                <h4>Danh sách khách hàng</h4>
                <div class="col-md-12 ">
                    <?php
                        $conn= mysqli_connect('localhost','root','','login');
                        if(!$conn){
                            die('Connect Fail'.mysqli_connect_error());
                        }
                        $sql="select * from customers";
                        $result = mysqli_query($conn,$sql);
                        $list = mysqli_fetch_all($result);
                    ?>
                <table class="table table-striped">
                    <thead>
                        <th>ID</th>
                        <th>Tên khách hàng</th>
                        <th>Email</th>
                        <th>Tiêu đề thư</th>
                        <th>Nội dung</th>
                        <th>Thời gian</th>
                    </thead>
                    <tbody>
                        <?php foreach($list as $kh){ 
                                echo'<tr>';
                                echo'<td>'.$kh[0].'</td>';
                                echo'<td>'.$kh[1].'</td>';
                                echo'<td>'.$kh[2].'</td>';
                                echo'<td>'.$kh[3].'</td>';
                                echo'<td>'.$kh[4].'</td>';
                                echo'<td>'.$kh[5].'</td>';
                                echo'</tr>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>