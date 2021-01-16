<?php
include('../path.php');
require(ROOT_PATH . "/controllers/exp.php");
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
    <link rel="stylesheet" href="../queries.css">
</head>

<body>
    <div class="main-container">
        <div class="content-box-admin">
            <?php include(ROOT_PATH . "/includes/left_menu.php") ?>
            <div class="content-right admin-container">
                <!--  resume -->
                <div class="title-box">
                    <h3 class="admin-title">Add experience</h3>
                    <div class="admin-bars">
                        <i class="fas fa-bars"></i>
                    </div>
                </div>
                <form action="info_add.php" method="post" class="form-manage form">
                    <div class="form-group">
<<<<<<< HEAD
                        <label for="">Ngày bắt đầu</label>
                        <input type="date" name="exp_start" id="" class="form-control form-input" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="">Ngày kết thúc</label>
                        <input type="date" name="exp_finish" id="" class="form-control form-input" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="">Tên công ty</label>
                        <input type="text" name="company" id="" class="form-control form-input" aria-describedby="helpId"></input>
                    </div>
                    <div class="form-group">
                        <label for="">Mô tả</label>
                        <textarea type="text" name="exp_des" id="" class="form-control form-input" aria-describedby="helpId"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Người thêm</label>
                        <input type="text" name="editer" id="" class="form-control form-input" aria-describedby="helpId"></input>
=======
                        <label for="">Start date</label>
                        <input type="date" name="service_name" id="" class="form-control form-input" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="">End date</label>
                        <input type="date" name="service_name" id="" class="form-control form-input" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="service_description" id="" class="form-control form-input" aria-describedby="helpId"></input>
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea type="text" name="service_description" id="" class="form-control form-input" aria-describedby="helpId"></textarea>
>>>>>>> bc08804253b275e89be6f1723094410de4afb5bc
                    </div>
                    <button class="btn btn-primary btn-manage" name="exp_add">Add <div class="btn-manage-box"></div></button>
                </form>
                <a class="btn btn-primary btn-back" href="exp_index.php"><i class="fas fa-chevron-circle-left"></i></a>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="../script_admin.js"></script>
</body>

</html>