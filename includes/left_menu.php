
<div class="content-left">
    <div class="left-element">
        <div class="menu-admin">
            <ul>
                <li>
                    <a href="#">Account</a>
                    <div class="admin-dropdown">
                        <ul>
                            <li><a href="<?php echo BASE_URL."/acc/acc_update.php" ?>">Change password</a></li>
                            <li><a href="<?php echo BASE_URL."/acc/acc_avt.php" ?>">Change avatar</a></li>
                            <li><a href="<?php echo BASE_URL."/acc/accdetail_index.php" ?>">Information</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#">General Information</a>
                    <div class="admin-dropdown">
                        <ul>
                            <li><a href="<?php echo BASE_URL."/svc/svc_index.php" ?>">Service</a></li>
                            <li><a href="<?php echo BASE_URL."/gi/gi_bg.php" ?>">Banner</a></li>
                            <li><a href="<?php echo BASE_URL."/gi/gi_avt.php" ?>">Avatar</a></li>
                            <li><a href="<?php echo BASE_URL."/customers/customer_index.php" ?>">Customer</a></li>
                        </ul>
                    </div>
                </li>
                <li><a href="<?php echo BASE_URL."/ca/ca_index.php" ?>">Certificate</a></li>
                <li><a href="<?php echo BASE_URL."/edu/edu_index.php" ?>">Education</a></li>
                <li><a href="<?php echo BASE_URL."/exp/exp_index.php" ?>">Experience</a></li>
                <li><a href="<?php echo BASE_URL."/pj/pj_index.php" ?>">Project</a></li>
                <li><a href="<?php echo BASE_URL."/skill/skill_index.php"?>">Skill</a></li>
                <li><a href="<?php echo BASE_URL."/logout.php"?>">Log out</a></li>
            </ul>
            <div class="login-info">
                <div class="info-avt">
                    <img src="<?php echo BASE_URL.'/Img/'.$acc['avatar'] ?>" alt="">
                </div>
                <h6><?php echo $_SESSION['account_name']; ?></h6>
            </div>
        </div>
    </div>
</div>