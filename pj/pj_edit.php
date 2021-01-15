<?php include('../path.php'); ?>
<?php include(ROOT_PATH . "/controllers/pj.php");
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
                    <h3 class="admin-title">update project</h3>
                    <div class="admin-bars">
                        <i class="fas fa-bars"></i>
                    </div>
                </div>
                <form action="pj_edit.php" method="post" enctype="multipart/form-data" class="form-manage form">
                    <?php include(ROOT_PATH . "/helper/formErrors.php") ?>
                    <input type="hidden" name="project_id" value="<?php echo $pj_id ?>">
                    <div class="row row  p-0 m-0">
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="">Start Date</label>
                            <input type="date" name="project_begin" id="" class="form-control form-input" aria-describedby="helpId" value="<?php echo $pj_start ?>">
                        </div>
                        <div class="form-group flex-grow-1">
                            <label for="">End Date</label>
                            <input type="date" name="project_end" id="" class="form-control form-input" aria-describedby="helpId" value="<?php echo $pj_end ?>">
                        </div>
                    </div>
                    <div class="row p-0 m-0">
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="">Name</label>
                            <input type="text" name="project_name" id="" class="form-control form-input" aria-describedby="helpId" value="<?php echo $pj_name ?>">
                        </div>
                        <div class="form-group flex-grow-1">
                            <label for="">Link</label>
                            <input type="text" name="project_link" id="" class="form-control form-input" aria-describedby="helpId" <?php echo $pj_link ?>></input>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea type="text" name="project_description" id="" class="form-control form-input" aria-describedby="helpId"><?php echo $pj_des ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <div class="pj-img-box">
                        <input type="hidden" name="test"value="<?php echo $_FILES['project_img']['name'] ?>">
                            <div class="pj-img mr-2">
                                <img src="<?php echo '../Img/' . $_FILES['project_img']['name'] ?>" alt="" id="avatar-img">
                            </div>
                            <input type="file" name="project_img" accept="image/png, image/jpeg" class="input-avt flex-grow-1" onchange="displayImg(this)" aria-describedby="helpId"></input>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-manage" name="btn-pj_edit">Save<div class="btn-manage-box"></div></button>
                </form>
                <a class="btn btn-primary btn-back" href="pj_index.php"><i class="fas fa-chevron-circle-left"></i></a>
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
    <script src="../script_admin.js"></script>
</body>

</html>