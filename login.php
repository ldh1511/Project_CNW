<?php include('./path.php'); ?>
<?php include('./database/process.php'); ?>
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
            <div class="content-left">
                <div class="left-element">
                    <div class="info-box">
                        <div class="info-avt">
                            <img src="./Img/logo.png" alt="">
                        </div>
                        <h4>Lê Dương Hùng</h4>
                        <h4>Ngô Thị Duyên</h4>
                        <p>Front-end Deweloper</p>
                    </div>
                    <div class="info-content">
                        <div class="info-content-element">
                            <ul>
                                <li>
                                    <h6>Địa chỉ:</h6><span>Đại học Thủy lợi</span>
                                </li>
                                <li>
                                    <h6>Thành phố:</h6><span>Hà Nội</span>
                                </li>
                            </ul>
                        </div>
                        <div class="info-content-element info-skill">
                            <ul>
                                <li><i class="far fa-check-circle"></i> Bootstrap</li>
                                <li><i class="far fa-check-circle"></i> HTML, CSS</li>
                                <li><i class="far fa-check-circle"></i> PHP</li>
                                <li><i class="far fa-check-circle"></i> GIT knowledge</li>
                            </ul>
                        </div>
                        <div class="info-content-element info-skill">
                            <ul>
                                <li><i class="far fa-check-circle"></i> SQL</li>
                                <li><i class="far fa-check-circle"></i> C#</li>
                                <li><i class="far fa-check-circle"></i> C++</li>
                                <li><i class="far fa-check-circle"></i> Python</li>
                            </ul>
                        </div>
                        <div class="info-content-element info-download">
                            <a href="#0">DOWNLOAD CV <i class="fas fa-download"></i></a>
                        </div>

                    </div>
                    <div class="info-bottom">
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-dribbble"></i></a>
                        <a href="#"><i class="fab fa-behance"></i></a>
                        <a href="#"><i class="fab fa-github"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>
            <div class="content-right">
                <!--  resume -->
                <div class="container">
                    <form action="login.php" method="post" class="form">
                        <h2>login</h2>
                        <div class="form-group">
                            <label>Tên đăng nhập</label>
                            <input type="text" name="name" class="form-control form-input login-input" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label>Mật khẩu</label>
                            <input type="text" name="password" class="form-control form-input login-input" aria-describedby="helpId">
                        </div>
                        <button class="btn btn-add" name="btn-login">Đăng nhập</button>
                    </form>
                </div>

            </div>
            <div class="menu-right">
                <div class="menu-right-box">
                    <div class="right-box-bars">
                        <i class="fas fa-bars"></i>
                    </div>
                    <div class="right-box-content">
                        <h5 class="right-box-title">HOME</h5>
                        <ul class="right-menu">
                            <li><a href="index.php">Trang chủ</a></li>
                            <li><a href="#">PORTFOLIO</a><i class="fas fa-chevron-right"></i></li>
                            <li><a href="login.php">Quản lý</a></li>
                            <li><a href="#">BLOG</a><i class="fas fa-chevron-right"></i></li>
                            <li><a href="#">CONTACT</a></li>
                        </ul>
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