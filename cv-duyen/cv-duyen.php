<?php include("../path.php"); ?>
<?php include("cv-data.php"); ?>
<!doctype html>
<html lang="en">
  <head>
    <title>Duyen's resume</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/> 
    <link rel="stylesheet" href="cv-duyen-style.css">  
</head>
  <body>
      <div class="content">
        
        <div class="content-left">
            <div class="profile">
                <div class="photo"><img src="./Img/Duyen.jpeg"/></div>
                <div class="info">
                    <h3 class="name">Ngô Thị Duyên</h3><small class="job">Front-end Web Designer</small>
                </div>
            </div>
            <div class="contact-l">
                <h3>Contact</h3>
                <div class="call"><i class="fa fa-phone"></i><span>(+84) 974 054 749</span></div>
                <div class="address"><i class="fa fa-map-marker"></i><span>Ha Noi, Viet Nam</span></div>
                <div class="email"><i class="fa fa-envelope"></i><span>duyen2882@gmail.com</span></div>
            </div>
            <div class="follow">
                <h3>Follow</h3>
                <div class="row">
                    <div class="col-md-4">
                        <a href="https://www.facebook.com/ngoduyen2808/"><i class="fab fa-facebook-f"></i></a>
                    </div>
                    <div class="col-md-4">
                        <a href="https://www.instagram.com/nd_dddd._/?hl=vi"><i class="fab fa-instagram"></i></a>
                    </div>
                    <div class="col-md-4">
                        <a href="https://github.com/"><i class="fab fa-github"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-right">
            <div class="edu">
                <h3><i class="fa fa-graduation-cap"></i>Education</h3>
                <ul class="timeline">
                    <li>
                    <?php foreach($edu as $e):?>
                        <div class="direction-r">
                            <div class="flag-wrapper">
                                <?php if($e[3]=='University'){?>
                                <span class="flag"><?php echo $e[3];?></span>
                                <span class="time-wrapper"><span class="time"><?php echo $e[1] ?>- <?php echo $e[2] ?></span></span>
                            </div>
                            <div class="desc"><?php echo $e[4];?></div>
                            <?php }?>
                        </div>
                    </li>

                    <li>
                        <div class="direction-l">
                            <div class="flag-wrapper">
                            <?php if($e[3]=='High School'){?>
                                <span class="flag"><?php echo $e[3];?></span>
                                <span class="time-wrapper"><span class="time"><?php echo $e[1] ?>- <?php echo $e[2] ?></span></span>
                            </div>
                            <div class="desc"><?php echo $e[4];?></div>
                            <?php }?>
                        </div>
                    </li>

                    <li>
                        <div class="direction-r">
                            <div class="flag-wrapper">
                            <?php if($e[3]=='Secondary School'){?>
                                <span class="flag"><?php echo $e[3];?></span>
                                <span class="time-wrapper"><span class="time"><?php echo $e[1] ?>- <?php echo $e[2] ?></span></span>
                            </div>
                            <div class="desc"><?php echo $e[4];?></div>
                            <?php }?>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="work">
                <h3><i class="fa fa-briefcase"></i>Work Experience</h3>
                <ul class="timeline">
                <?php foreach ($exp as $e) : ?>
                    <li>
                        <div class="direction-r">
                            <div class="flag-wrapper">
                            <?php if($e[4]=='first'){?>
                                <span class="flag"><?php echo $e[4];?></span>
                                <span class="time-wrapper"><span class="time"><?php echo $e[1] ?>- <?php echo $e[2] ?></span></span>
                            </div>
                            <div class="desc"><?php echo $e[3];?></div>
                            <?php }?>
                        </div>
                    </li>

                    <li>
                        <div class="direction-l">
                            <div class="flag-wrapper">
                            <?php if($e[4]=='second'){?>
                                <span class="flag"><?php echo $e[4];?></span>
                                <span class="time-wrapper"><span class="time"><?php echo $e[1] ?>- <?php echo $e[2] ?></span></span>
                            </div>
                            <div class="desc"><?php echo $e[3];?></div>
                            <?php }?>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="skills-prog">
                <h3><i class="fa fa-code"></i>Programming Skills</h3>
                <p>HTML</p>
                    <div class="container">
                        <div class="skills html">80%</div>
                    </div>

                <p>CSS</p>
                    <div class="container">
                        <div class="skills css">70%</div>
                    </div>

                <p>JavaScript</p>
                    <div class="container">
                        <div class="skills js">50%</div>
                    </div>

                <p>PHP</p>
                    <div class="container">
                        <div class="skills php">80%</div>
                    </div>
            </div>
            <div class="interests">
                <h3><i class="fa fa-star"></i>Interests</h3>
                <div class="interests-items">
                    <div class="movie"><i class="fa fa-film"></i><span>Movie</span></div>
                    <div class="music"><i class="fa fa-headphones"></i><span>Music</span></div>
                    <div class="book"><i class="fas fa-book"></i><span>Book</span></div>
                </div>
            </div>
            <div class="contact">
                <h3><i class="fas fa-envelope-open-text"></i>Contact</h3>
                <div class="contact-form">
                    <form action="cv-contact.php" method="post">
                        <div class="box">
                            <div class="input-group mb-3 contact-element">
                                <i class="fas fa-users contact-icon"></i>
                                <input type="text" class="form-control" placeholder="Your name" aria-label="Username" name="Username2" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3 contact-element">
                                <i class="fas fa-at contact-icon"></i>
                                <input type="text" class="form-control" placeholder="Your email" aria-label="Email" name="Email" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3 contact-element">
                                <i class="fas fa-paint-brush contact-icon"></i>
                                <input type="text" class="form-control" placeholder="Title" aria-label="Subject" name="Subject" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group contact-element">
                                <i class="fas fa-comment-dots contact-icon"></i>
                                <textarea class="form-control" placeholder="Message to us" aria-label="Message" name="Message"></textarea>
                            </div>
                            <button type="submit" name="btn-send btn"><i class="fas fa-paper-plane"></i>Send</button>
                        </div>
                    </form>
                </div>
            </div>
            <a class="btn btn-primary btn-back" href="../index.php"><i class="far fa-arrow-alt-circle-left"></i></i></a>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
