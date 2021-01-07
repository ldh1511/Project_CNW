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
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="main-container">
        <div class="content-box">
            <?php include('./left_menu.php') ?>
            <div class="content-right admin-container">
                <!--  resume -->
                <h3 class="admin-title">Cập nhật mật khẩu</h3>
                <form action="accdetail_edit.php" method="post">
                    <div class="container">
                        <div class="form-group">
                            <label for="">Tên đăng nhập</label>
                            <input type="text" name="price" id="" class="form-control input-read" aria-describedby="helpId" disabled>
                        </div>
                        <div class="form-group">
                            <label for="">Mật khẩu</label>
                            <input type="text" name="price" id="" class="form-control input-read" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="">Mật khẩu mới</label>
                            <input type="text" name="price" id="" class="form-control input-read" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="">Nhập lại mật khẩu mới</label>
                            <input type="text" name="price" id="" class="form-control input-read" aria-describedby="helpId">
                        </div>
                        <button class="btn btn-primary btn-manage">Lưu lại</button>
                    </div>
                </form>
                <a class="btn btn-primary btn-back" href="accdetail_index.php">Quay lại</a>
            </div>
            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>