<?php include("../path.php"); ?>
<?php include("process.php"); ?>
<!doctype html>
<html lang="en">

<head>
    <title>MyCV</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="../style.css"> -->
    <link rel="stylesheet" href="per_style.css">
</head>

<body>
    <div class="main-container">
        <div class="content-box">
            <div class="header-menu">
                <div class="menu-icon-left">
                    <i class="fas fa-ellipsis-v"></i>
                </div>
                <div class="menu-icon-right">
                    <i class="fas fa-bars"></i>
                </div>
            </div>
            <div class="main-content">
                <div class="content-left">
                    <div class="left-element">
                        <div class="info-icon-menu">
                            <i class="fas fa-ellipsis-v"></i>
                        </div>
                        <div class="info-box">
                            <div class="info-avt">
                                <img src="../Img/<?php echo $acc['avatar'] ?>" alt="">
                            </div>
                            <div class="info-text">
                                <h4><?php echo $info['name'] ?></h4>
                            </div>

                        </div>
                        <div class="info-content">
                            <div class="info-content-element">
                                <ul>
                                    <li>
                                        <h6><i class="fas fa-map-marker-alt"></i></h6><span><?php echo $info['address'] ?></span>
                                    </li>
                                    <li>
                                        <h6><i class="fas fa-phone"></i></h6><span><?php echo $info['phone_number'] ?></span>
                                    </li>
                                    <li>
                                        <h6><i class="far fa-calendar-alt"></i></h6><span><?php echo $info['birthday'] ?></span>
                                    </li>
                                    <li>
                                        <h6><i class="far fa-envelope"></i></h6><span><?php echo $info['email'] ?></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="info-content-element info-skill">
                                <ul>
                                    <?php foreach ($skill as $key) : ?>
                                        <li><i class="fas fa-check-circle"></i> <?php echo $key[3] ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="info-bottom">
                            <?php foreach ($socialLinks as $key) {
                                if ($key[1] == 'facebook') {
                                    echo "<a href='" . $key[2] . "'><i class='fab fa-facebook'></i></a>";
                                } else if ($key[1] == 'github') {
                                    echo "<a href='" . $key[2] . "'><i class='fab fa-github'></i></a>";
                                } else if ($key[1] == 'linkedin') {
                                    echo "<a href='" . $key[2] . "'><i class='fab fa-linkedin-in'></i></a>";
                                }
                            } ?>

                        </div>
                    </div>
                </div>
                <div class="content-right">
                    <div class="container content-top">
                        <div class="banner per_banner" style="background-image: linear-gradient(rgb(0 0 0 / 28%),rgb(0 0 0 / 61%)), url(../Img/<?php echo $acc['background'] ?>);">
                            <div class="banner-title">
                                Hello, I'm <?php echo $info['name'] ?>
                            </div>
                        </div>
                        <div class="about-me">
                            <h4 class="per-title per-name">About me</h4>
                            <p><?php echo $info['sumary'] ?></p>
                        </div>
                        <div class="education">
                            <div class="container">
                                <div class="row">
                                    <div class="col-6 edu-element left">
                                        <?php foreach ($edu as $key) : ?>
                                            <div class="edu-box">
                                                <div class="edu-title">
                                                    <div class="edu-icon ">
                                                        <i class="fas fa-graduation-cap"></i>
                                                    </div>
                                                    <h6><?php echo $key[1] ?><?php 
                                                    if($key[2]==='0000-00-00'){
                                                        echo " to now";
                                                    }
                                                    else{
                                                        echo " to ".$key[2]."";
                                                    } 
                                                    ?></h6>
                                                </div>
                                                <div class="edu-content">
                                                    <h6 class="edu-name"><?php echo $key[3] ?></h6>
                                                    <span><?php echo $key[4] ?></span>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="col-6 d-flex justify-content-center align-items-center per-title-box edu-element right">
                                        <h4 class="per-title per-name">Education</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="education">
                            <div class="container">
                                <div class="row">
                                    <div class="col-6 d-flex align-items-center per-title-box edu-element left">
                                        <h4 class="per-title per-name">Experience</h4>
                                    </div>
                                    <div class="col-6 edu-element right">
                                        <?php foreach ($exp as $key) : ?>
                                            <div class="edu-box exp-box">
                                                <div class="edu-title exp-title">
                                                    <div class="edu-icon exp-icon">
                                                        <i class="fas fa-briefcase"></i>
                                                    </div>
                                                    <h6><?php echo $key[1] ?><?php 
                                                    if($key[2]==='0000-00-00'){
                                                        echo " to now";
                                                    }
                                                    else{
                                                        echo " to ".$key[2]."";
                                                    } 
                                                    ?></h6>
                                                </div>
                                                <div class="edu-content exp-content">
                                                    <h6 class="edu-name exp-name"><?php echo $key[3] ?></h6>
                                                    <span><?php echo $key[4] ?></span>
                                                </div>
                                            </div>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="education">
                            <div class="container">
                                <div class="row">
                                    <div class="col-6 edu-element left">
                                        <?php foreach ($ca as $key) : ?>
                                            <div class="edu-box">
                                                <div class="edu-title">
                                                    <div class="edu-icon ">
                                                        <i class="fas fa-certificate"></i>
                                                    </div>
                                                    <h6><?php echo $key[0] ?></h6>
                                                </div>
                                                <div class="edu-content">
                                                    <h6 class="edu-name"><?php echo $key[1] ?></h6>
                                                    <span><?php echo $key[2] ?></span>
                                                </div>
                                            </div>
                                        <?php endforeach ?>
                                    </div>
                                    <div class="col-6 d-flex justify-content-center align-items-center per-title-box edu-element right">
                                        <h4 class="per-title per-name">certificate</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="project">
                            <h4 class="per-title per-name">project</h4>
                            <div class="project-container">
                                <div class="project-row">
                                    <?php foreach ($project as $key) : ?>
                                        <div class="project-box">
                                            <a href="<?php echo $key[6] ?>">
                                                <img src="../Img/<?php echo $key[5] ?>" alt="" class="project-img">
                                                <div class="project-title">
                                                    <?php echo $key[3] ?>
                                                </div>
                                            </a>
                                            <div class="project-hover"></div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="contact">
                            <h4 class="per-title per-name">Contact me</h4>
                            <?php include(ROOT_PATH . "/helper/formErrors.php") ?>

                            <form action="per_cv.php" method="post">
                            <input type="hidden" name="id"  value="1">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="name" id="" class="form-control form-input" placeholder="" aria-describedby="helpId">
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" name="mail" id="" class="form-control form-input" placeholder="" aria-describedby="helpId">
                                </div>
                                <div class="form-group">
                                    <label for="">Subject</label>
                                    <input type="text" name="subject" id="" class="form-control form-input" placeholder="" aria-describedby="helpId">
                                </div>
                                <div class="form-group">
                                    <label for="">Message</label>
                                    <textarea class="form-control form-input" name="message" ></textarea>
                                </div>
                                <button class="btn btn-contact" name="btn-send"> Send Message</button>
                            </form>
                        </div>
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
                                <li><a href="../index.php">TEAM</a></li>
                                <li><a href="../login.php">MANAGE</a></li>
                            </ul>
                        </div>
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
    <!-- <script src="../script.js"></script> -->
    <script src="per_script.js"></script>
</body>

</html>