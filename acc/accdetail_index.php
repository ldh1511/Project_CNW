<?php include('../path.php'); ?>
<?php include(ROOT_PATH . "/controllers/acc.php");
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
                    <h3 class="admin-title">Personal Information</h3>
                    <div class="admin-bars">
                        <i class="fas fa-bars"></i>
                    </div>
                </div>
                <div class="container">
                    <?php include(ROOT_PATH . "/includes/message.php") ?>
                    <div class="row  p-0 m-0">
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="">Full name</label>
                            <input type="text" name="service_name" id="" class="form-control input-read" aria-describedby="helpId" value="<?php echo $info['name'] ?>" disabled>
                        </div>
                        <div class="form-group mr-2">
                            <label for="">Age</label>
                            <input type="text" name="price" id="" class="form-control input-read" aria-describedby="helpId" value="<?php echo $info['age'] ?>" disabled>
                        </div>
                        <div class="form-group ">
                            <label for="">Gender</label>
                            <input type="text" name="price" id="" class="form-control input-read" aria-describedby="helpId" value="<?php echo $info['gender'] ?>" disabled>
                        </div>
                    </div>
                    <div class="row  p-0 m-0">
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="">Email</label>
                            <input type="text" name="price" id="" class="form-control input-read" aria-describedby="helpId" value="<?php echo $info['email'] ?>" disabled>
                        </div>
                        <div class="form-group flex-grow-1">
                            <label for="">Phone number</label>
                            <input type="text" name="price" id="" class="form-control input-read" aria-describedby="helpId" value="<?php echo $info['phone_number'] ?>" disabled>
                        </div>
                    </div>
                    <div class="row  p-0 m-0">
                        <div class="form-group form-group flex-grow-1 mr-2">
                            <label for="">Target</label>
                            <input type="text" name="target" class="form-control input-read" aria-describedby="helpId" value="<?php echo $info['target'] ?>">
                        </div>
                        <div class="form-group form-group flex-grow-1">
                            <label for="">Hobby</label>
                            <input type="text" name="hobby" class="form-control input-read" aria-describedby="helpId" value="<?php echo $info['hobby'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Sumary</label>
                        <textarea type="text" name="service_description" id="" class="form-control input-read" aria-describedby="helpId" disabled><?php echo $info['sumary'] ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Address</label>
                        <input type="text" name="price" id="" class="form-control input-read" aria-describedby="helpId" value="<?php echo $info['address'] ?>" disabled>
                    </div>
                    <a href="accdetail_edit.php?edit_id=<?php echo $info['id'] ?>"><i class="far fa-edit h5"></i></a>
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