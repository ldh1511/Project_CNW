<!doctype html>
<html lang="en">

<head>
  <title>OurCV</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
            <p>Front-end Developer</p>
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
            <div class="container">
                <div class="contact-info">
                    <h4>Thông tin liên lạc</h4>
                    <div class=row>
                      <div class="col-md-5 contact-box">
                        <ul>
                          <li><h6>Trường:</h6> <span>Đại học Thủy Lợi</span></li>
                          <li><h6>Số:</h6> <span>175 Tây Sơn, Đống Đa</span></li>
                          <li><h6>Thành phố:</h6> <span>Hà Nội</span></li>
                        </ul>
                      </div>
                      <div class="col-md-2"></div>
                      <div class="col-md-5 contact-box">
                        <ul>
                          <li><h6>Email:</h6> <span>admin@gmail.com</span></li>
                          <li><h6>Số điện thoại:</h6> <span>03 1111 1111</span></li>
                        </ul>
                      </div>
                    </div>
                </div>

              <div class="contact-form">
                  <h4>Liên lạc với chúng tôi</h4>
                <form action="mail.php" method="post">
                  <div class="contact-form-box">
                    <div class="input-group mb-3 contact-element">
                      <i class="fas fa-users"></i>
                      <input type="text" class="form-control" placeholder="Tên của bạn" aria-label="Username" name="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3 contact-element">
                      <i class="fas fa-at"></i>
                      <input type="text" class="form-control" placeholder="Email của bạn" aria-label="Email" name="Email" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3 contact-element">
                      <i class="fas fa-paint-brush"></i>
                      <input type="text" class="form-control" placeholder="Tiêu đề thư" aria-label="Subject" name="Subject" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group contact-element">
                      <i class="fas fa-comment-dots"></i>
                      <textarea class="form-control" placeholder="Lời nhắn tới chúng tôi" aria-label="Message" name="Message"></textarea>
                    </div>
                    <button type="submit" name="btn-send"><i class="fas fa-paper-plane"></i>Gửi</button>
                  </div>
                </form>
              </div>
              
              <!-- Thêm vào db
              <?php
                $conn= mysqli_connect('localhost','root','','login');
                if(!$conn){
                    die('Connect Fail'.mysqli_connect_error());
                }
                if(isset($_POST['btn-send'])){
                  $name=$_POST['Username'];
                  $email=$_POST['Email'];
                  $subject=$_POST['Subject'];
                  $mess=$_POST['Message'];
                  $sql="insert into customers (customer_name,customer_email,email_subject,email_message) values('$name','$email','$subject','$mess')";
                  $result= mysqli_query($conn,$sql);
                  if ($result){
                    header("Location: index.php");
                  }
                  else{
                    echo 'error';
                  } 
              }
              ?> -->
            
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
              <li><a href="contact.php">CONTACT</a></li>
            </ul>
          </div>
        </div>
      </div>

    </div>
  </div>  

          <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>

</html>