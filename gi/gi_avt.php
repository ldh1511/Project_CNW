<?php include('../path.php'); ?>
<?php include(ROOT_PATH . "/controllers/gi.php"); ?>
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
            <?php include(ROOT_PATH . "/includes/left_menu.php") ?>
            <div class="content-right admin-container">

                <div class="title-box">
                    <h3 class="admin-title">Update Team Avatar</h3>
                </div>
                <?php include(ROOT_PATH . "/includes/message.php") ?>
                <form action="gi_avt.php" method="post" class="form-manage form form-info" enctype="multipart/form-data">
                    <div class="form-group">
                        <?php include(ROOT_PATH . "/helper/formErrors.php") ?>
                        <label for="">Team Avatar</label>
                        <div class="info-avt">
                            <img src="<?php echo '../Img/' . $gi_avt ?>" alt="" id="avatar-img">
                        </div>
                        <input type="file" id="avatar" name="general_ava" accept="image/png, image/jpeg" onchange="displayImg(this)" class="input-avt">
                        <button class="btn btn-primary btn-manage" name="gi_avt_save">Save <div class="btn-manage-box"></div></button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        function displayImg(e) {
            if (e.files[0]) {
                let reader = new FileReader();
                reader.onload = (e) => {
                    document.querySelector('#avatar-img').setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(e.files[0]);
            }
        }
    </script>
</body>

</html>