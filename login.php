<?php include('./path.php');
include(ROOT_PATH . "/controllers/acc.php");
$service = selectAll('service');
$general_info = selectOne('general_info', ['general_id' => '1']);
$acc_info = selectAll('infomation');
$acc = selectCol('*', 'account, infomation', 'account.id=infomation.id');
$skill = selectAll('skill');
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
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="main-container">
        <div class="content-box">
            <nav class="main-nav">
                <div class="nav-icon nav-icon-left">
                    <i class="fas fa-bars"></i>
                </div>
                <div class="nav-icon nav-icon-right">
                    <i class="fas fa-bars"></i>
                </div>
            </nav>
            <?php include(ROOT_PATH . "/includes/cv_left_menu.php"); ?>
            <div class="content-right contact-container">
                <!--  resume -->
                <div class="container">

                    <form action="login.php" method="post" class="form form-login">
                        <h2>login</h2>
                        <?php include(ROOT_PATH . "/helper/formErrors.php") ?>
                        <div class="form-group">
                            <label>User name</label>
                            <input type="text" name="name" class="form-control form-input login-input" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control form-input login-input" aria-describedby="helpId">
                        </div>
                        <button class="btn btn-add" name="btn-login">
                            Login <i class="fas fa-chevron-right"></i>
                            <div class="circle-btn"></div>
                        </button>
                    </form>
                </div>
            </div>
            <div class="menu-right">
                <div class="menu-right-box">
                    <div class="right-box-bars">
                        <i class="fas fa-bars"></i>
                    </div>
                    <div class="right-box-content">
                        <h5 class="right-box-title">MANAGE</h5>
                        <?php include(ROOT_PATH . "/includes/right_menu.php"); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>

</html>