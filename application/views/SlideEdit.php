<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><?php include "/header.php"; ?>
<?php include "/adminTools.php"?>


<div class="col-sm-6 col-md-6 col-lg-6">
    <?php
       echo ($breadcrumbs);
    ?>
   <div class="well">

       <?php if(empty($upload_data)){?>

           <?php if($error != ' '){?>
           <div class="alert alert-danger">

          <?php echo strip_tags($error);
         ?> </div>
         <?php } ?>



       <?php echo form_open_multipart('Upload/do_upload');?>
        <div class="form-group">
            <label for="titulo">Titulo:</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo $slide[0]->titulo;?>">
        </div>
           <input type="hidden" name="id" value="<?php echo $slide[0]->id;?>"/>
        <div class="form-group">
            <label for="link">Link:</label>
            <input type="text" class="form-control" id="link" name="link" value="<?php echo $slide[0]->link;?>">
            <input type="hidden" name="new" value="0"/>
        </div>
        <div class="form-group">
            <label for="img">Imagen</label>
            <img class="img-thumbnail" src="<?php echo base_url("/assets/images_gal/".$slide[0]->img)?>" id="img" alt="Imagen">
        </div>
       <div class="form-group">
           <label for="userfile">Subir Imagen</label>
           <input type="file" class="btn btn-default" data-buttonName="btn-primary"  name="userfile" size="20" />
       </div>


        <button type="submit" class="btn btn-default">Submit</button>
    </form>
    <?php }else{
     foreach ($upload_data as $item => $value):?>
        <li><?php echo $item;?>: <?php echo $value;?></li>
    <?php endforeach; } ?>

   </div>
</div>



<?php include"/admin-footer.php"; ?>