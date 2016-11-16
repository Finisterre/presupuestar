<?php defined('BASEPATH') OR exit('No direct script access allowed');
?><?php include "/header.php"; ?>
<?php include "/adminTools.php"?>
<div class="col-sm-6 col-md-6 col-lg-6">
    <div class="well">
<ul>
    <?php

    foreach ($upload_data as $item => $value):?>
        <li><?php echo $item;?>: <?php echo $value;?></li>
    <?php endforeach; ?>
</ul>

<p><?php echo anchor('upload', 'Upload Another File!'); ?></p>
</div></div>
<?php include"/admin-footer.php"; ?>