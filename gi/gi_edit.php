<?php include('../path.php'); ?>
<?php include(ROOT_PATH . "/controllers/gi.php");
adminOnly();
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
                    <h3 class="admin-title">Update team's info</h3>
                    <div class="admin-bars">
                        <i class="fas fa-bars"></i>
                    </div>
                    <div class="search-box" style="justify-content: flex-end;">
                        <div class="header-btn-container">
                            <div class="header-button">
                                <a href="gi_history.php" class="btn-import"><i class="fas fa-history"></i> History</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <?php include(ROOT_PATH . "/includes/message.php") ?>
                    <form action="gi_edit.php" method="post" class="form-manage form">
                        <?php include(ROOT_PATH . "/helper/formErrors.php") ?>
                        <input type="hidden" name="general_id" id="" class="form-control form-input" aria-describedby="helpId" value="<?php echo $gi_id ?>">
                        <div class="row  p-0 m-0">
                            <div class="form-group flex-grow-1 mr-2">
                                <label for="">Address</label>
                                <input type="text" name="general_address" id="" class="form-control form-input" aria-describedby="helpId" value="<?php echo $gi_address ?>">
                            </div>
                            <div class="form-group flex-grow-1">
                                <label for="">Email</label>
                                <input type="text" name="general_mail" id="" class="form-control form-input" aria-describedby="helpId" value="<?php echo $gi_email ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Intro</label>
                            <textarea type="text" name="general_intro" id="" class="form-control form-input" aria-describedby="helpId"><?php echo $gi_intro ?></textarea>
                        </div>
                        <button class="btn btn-primary btn-manage" name="gi_edit">Save<div class="btn-manage-box"></div></button>
                    </form>
                    <a class="btn btn-primary btn-back" href="gi_index.php"><i class="fas fa-chevron-circle-left"></i></a>
                </div>
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