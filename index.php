<?php
include('path.php');
include('get_data.php');
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
      <div class="content-box-bottom">
        <?php include(ROOT_PATH . "/includes/cv_left_menu.php"); ?>
        <div class="content-right">
          <!--  resume -->
          <div class="container">
            <div class="banner">
              <img src="./Img/<?php echo $general_info['general_banner'] ?>" alt="">
            </div>

            <!-- CV -->
            <div class="title">
              <h4>Our Resume</h4>
            </div>
            <div class="container">
              <!-- cv1 -->
              <?php foreach ($acc as $key) : ?>
                <div class="row cv-row">
                  <div class="box">
                    <div class="row">
                      <div class="col-md-4 cv-pic">
                        <img src="./Img/<?php echo $key[2] ?>" alt="">
                      </div>
                      <div class="col-md-8 cv-element">
                        <ul>
                          <li>
                            <h6>Name:</h6> <span><?php echo $key[5] ?></span>
                          </li>
                          <li>
                            <h6>Birthday:</h6> <span><?php echo $key[9] ?></span>
                          </li>
                          <li>
                            <h6>Address:</h6> <span><?php echo $key[11] ?></span>
                          </li>
                          <li>
                          <?php if($key[5]=='Le Duong Hung'):?>
                            <a href="./cv_LeDuongHung/per_cv.php">Read CV</a>
                          <?php else:?>
                            <a href="./cv-duyen/cv-duyen.php">Read CV</a>
                          <?php endif ?>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>

            <!-- services -->
            <div class="title">
              <h4>Our Services</h4>
            </div>
            <div class="container">
              <div class="row">
                <?php foreach ($service as $key) : ?>
                  <div class="col-lg-4 col-md-6 mb-4">
                    <div class="box">
                      <h5><?php echo $key[1] ?></h5>
                      <p><?php echo $key[3] ?></p>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>


            <!-- Recommendations -->
            <div class="title">
              <h4>Recommendations</h4>
            </div>
            <div class="container">

              <head>
                <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
              </head>

              <div class="col text-light recomments-box" style="background-color: #f00f0f">
                <div id="client-testimonial-carousel" class="carousel slide" data-ride="carousel" style="height:200px;">
                  <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active text-center p-4">
                      <blockquote class="blockquote text-center">
                        <p class="mb-0"><i class="fa fa-quote-left"></i>Working with this team has been a pleasure. Better yet -
                          I alerted them of a minor issue before going to sleep. The issue was fixed the next morning. I
                          couldn't ask for better support. Thank you very much!.</p>
                        <div class="row">
                          <div class="col-md-4">
                            <img src="https://bslthemes.com/arter-wp/v2/wp-content/uploads/2020/09/testimonial-1-140x140.jpg" alt="" class="avt">
                          </div>
                          <div class="col-md-4">
                            <p class="client-review-stars">
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                            </p>
                          </div>
                          <div class="col-md-4">
                            <footer class="blockquote-footer">Paul Trueman </footer>
                          </div>
                        </div>
                      </blockquote>
                    </div>
                    <div class="carousel-item text-center p-4">
                      <blockquote class="blockquote text-center">
                        <p class="mb-0"><i class="fa fa-quote-left"></i>Working with this team has been a pleasure. Better yet -
                          I alerted them of a minor issue before going to sleep. The issue was fixed the next morning. I
                          couldn't ask for better support. Thank you very much!.</p>
                        <div class="row">
                          <div class="col-md-4">
                            <img src="https://bslthemes.com/arter-wp/v2/wp-content/uploads/2020/09/testimonial-3-140x140.jpg" alt="" class="avt">
                          </div>
                          <div class="col-md-4">
                            <p class="client-review-stars">
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                            </p>
                          </div>
                          <div class="col-md-4">
                            <footer class="blockquote-footer">Paul Trueman </footer>
                          </div>
                        </div>
                      </blockquote>
                    </div>
                    <div class="carousel-item text-center p-4">
                      <blockquote class="blockquote text-center">
                        <p class="mb-0"><i class="fa fa-quote-left"></i>Working with this team has been a pleasure. Better yet -
                          I alerted them of a minor issue before going to sleep. The issue was fixed the next morning. I
                          couldn't ask for better support. Thank you very much!.</p>
                        <div class="row">
                          <div class="col-md-4">
                            <img src="https://bslthemes.com/arter-wp/v2/wp-content/uploads/2020/09/testimonial-2-140x140.jpg" alt="" class="avt">
                          </div>
                          <div class="col-md-4">
                            <p class="client-review-stars">
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                            </p>
                          </div>
                          <div class="col-md-4">
                            <footer class="blockquote-footer">Paul Trueman </footer>
                          </div>
                        </div>
                      </blockquote>
                    </div>
                  </div>
                  <ol class="carousel-indicators">
                    <li data-target="#client-testimonial-carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#client-testimonial-carousel" data-slide-to="1"></li>
                    <li data-target="#client-testimonial-carousel" data-slide-to="2"></li>
                  </ol>
                </div>
              </div>
            </div>
            <div class="conatainer">
              <div class="row">
                <!-- icon -->
                <div class="col-md-3 icon-client">
                  <img src="./Img/design.png" alt="" class="logo">
                </div>
                <div class="col-md-3 icon-client">
                  <img src="./Img/showtime.png" alt="" class="logo">
                </div>
                <div class="col-md-3 icon-client">
                  <img src="./Img/vintage.png" alt="" class="logo">
                </div>
                <div class="col-md-3 icon-client">
                  <img src="./Img/design.png" alt="" class="logo">
                </div>
                <!-- contact -->
              </div>
            </div>
            <div class="container footer-box">
              <div class="row">

                <p class="copy">&copy;2020 All Rights Reserved.</p>
                <p class="email">Emai:admin@gmail.com</p>
                <!-- <div class="col-md-8">
                <p class="copy">&copy;2020 All Rights Reserved.</p>
              </div>
              <div class="col-md-4">
                <p class="email">Emai:admin@gmail.com</p>
              </div> -->
              </div>
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