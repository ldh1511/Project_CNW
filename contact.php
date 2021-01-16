<?php include('path.php'); ?>
<?php include(ROOT_PATH . "/controllers/contact.php") ?>
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
      <?php include(ROOT_PATH . "/includes/cv_left_menu.php"); ?>

      <div class="content-right">
        <div class="container">
          <div class="contact-info">
            <h4>Communications</h4>

            <div class=row>
              <div class="col-md-5 contact-box">
                <ul>
                  <li>
                    <h6>Address:</h6> <span>Thuyloi University- 175 Tay Son, Đong Da</span>
                  </li>
                  <li>
                    <h6>City:</h6> <span>Ha Noi</span>
                  </li>
                </ul>
              </div>
              <div class="col-md-2"></div>
              <div class="col-md-5 contact-box">
                <ul>
                  <li>
                    <h6>Email:</h6> <span>admin@gmail.com</span>
                  </li>
                  <li>
                    <h6>Phone number:</h6> <span>03 1111 1111</span>
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <div class="contact-form">
            <h4>Contact with Us</h4>
            <form action="contact.php" method="post">
              <div class="contact-form-box">
                <div class="input-group mb-3 contact-element">
                  <i class="fas fa-users"></i>
                  <input type="text" class="form-control" placeholder="Your name" aria-label="Username" name="Username" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3 contact-element">
                  <i class="fas fa-at"></i>
                  <input type="text" class="form-control" placeholder="Your email" aria-label="Email" name="Email" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3 contact-element">
                  <i class="fas fa-paint-brush"></i>
                  <input type="text" class="form-control" placeholder="Title" aria-label="Subject" name="Subject" aria-describedby="basic-addon1">
                </div>
                <div class="input-group contact-element">
                  <i class="fas fa-comment-dots"></i>
                  <textarea class="form-control" placeholder="Message to us" aria-label="Message" name="Message"></textarea>
                </div>
                <button type="submit" name="btn-send btn"><i class="fas fa-paper-plane"></i>Send</button>
              </div>
            </form>
          </div>

          <!-- Thêm vào db
              
              ?> -->
        </div>
      </div>
      <div class="menu-right">
        <div class="menu-right-box">
          <div class="right-box-bars">
            <i class="fas fa-bars"></i>
          </div>
          <div class="right-box-content">
            <h5 class="right-box-title">CONTACT</h5>
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