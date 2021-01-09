<?php
include('../path.php');
include(ROOT_PATH . "/controllers/ca.php");
?>
<!doctype html>
<html lang="en">

<head>
    <title>OurCV</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="main-container">
        <div class="content-box">
            <?php 
                include(ROOT_PATH . "/includes/left_menu.php")       
            ?>
            <div class="content-right admin-container">
                <h3 class="admin-title">Chi tiết chứng chỉ</h3>
                <div class="form-group">
                    <label for="">Ngày cấp</label>
                    <input type="text" name="ca_date" id="" class="form-control input-read" aria-describedby="helpId" value="<?php echo $date ?> " readonly>
                </div>
                <div class="form-group">
                    <label for="">Tên chứng chỉ</label>
                    <input type="text" name="ca_name" id="" class="form-control input-read" aria-describedby="helpId" disabled value="<?php echo $certificate_name ?> " readonly></input>
                </div>
                <div class="form-group">
                    <label for="">Mô tả</label>
                    <textarea type="text" name="ca_description" id="" class="form-control input-read" aria-describedby="helpId" disabled readonly><?php echo $description ?></textarea>
                </div>

                <a class="btn btn-primary btn-back" href="ca_index.php"><i class="fas fa-chevron-circle-left"></i></a>
            </div>
            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>