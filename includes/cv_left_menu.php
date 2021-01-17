<div class="content-left">
  <div class="left-element">
    <div class="nav-icon-close">
      <i class="fas fa-times"></i>
    </div>
    <div class="info-box">
      <div class="info-avt">
        <img src="./Img/<?php echo $general_info['general_ava'] ?>" alt="">
      </div>
      <!-- <h4>Le Duong Hung</h4>
      <h4>Ngo Thi Duyen</h4> -->
      <?php foreach ($acc_info as $key) : ?>
        <h4><?php echo $key[0] ?></h4>
      <?php endforeach ?>
      <p>Front-end Developer</p>
    </div>
    <div class="info-content">
      <div class="info-content-element">
        <ul>
          <li>
            <h6>Address:</h6><span><?php echo $general_info['general_address'] ?></span>
          </li>
        </ul>
      </div>
      <div class="info-content-element info-skill">
        <ul>
          <?php foreach ($skill as $key) : ?>
            <li><i class="far fa-check-circle"></i><?php echo $key[1] ?></li>
          <?php endforeach  ?>
        </ul>
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