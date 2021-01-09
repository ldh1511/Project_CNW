<?php if(count($errors)>0):?>
    <div class="error-box">
        <?php foreach ($errors as $key) :?>
            <li><i class="fas fa-times-circle"></i><?php echo $key; ?></li>
        <?php endforeach; ?>
    </div>
<?php endif ?>