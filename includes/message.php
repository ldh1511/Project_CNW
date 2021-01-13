<?php if (isset($_SESSION['message'])) : ?>
    <div class="<?php echo $_SESSION['type'] ?>">
        <li><i class="fas fa-check-circle"></i><?php echo $_SESSION['message'] ?></li>
        <?php
            unset($_SESSION['type']);
            unset($_SESSION['message']);
        ?>
    </div>
<?php endif ?>