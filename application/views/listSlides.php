<?php if ($home != 1){


defined('BASEPATH') OR exit('No direct script access allowed');
?><?php include "/header.php"; ?>
<?php include "/adminTools.php"?>



<div class="col-sm-10">
<?php

    echo ($breadcrumbs);
}?>

<div class="well">
    <h3>Slides <?php if ($home == 1){?><small><a href="<?php echo base_url('/listSlides')?>" class="btn btn-info btn-xs">Editar</a></small><?php }?></h3>
    <div class="row">

        <?php
        foreach($slides as $slide)
        {?>

            <div class="col-sm-6 col-md-4">
                <div class="alert alert-success hidden fade in">
                    <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Listo!</strong> La imagen ha sido eliminada del Carrousel de inicio.
                </div>
                <div class="thumbnail">
                    <img src="<?php echo base_url("/assets/images_gal/".$slide->img)?>" alt="Imagen">
                    <div class="caption">
                        <h3><?php echo $slide->titulo; ?></h3>
                        <p><?php echo $slide->descripcion; ?></p>

                        <input type="hidden" name="table" class="table"  value="slider">

                        <?php
                        $where = array(
                            'id' => $slide->id
                        )
                        ?>
                        <input type='hidden' name='where' class="where" value='<?php echo json_encode($where);?>'>
                        <p><a class="btn btn-danger btn-sm" role="button">Eliminar</a>
                            <a href="<?php echo base_url('/SlideEdit/.?id='.$slide->id)?>" class="btn btn-info btn-sm" role="button">Modificar</a>
                        <div class="alert alert-danger hidden fade in">

                            <strong>Cuidado!</strong> Ud esta por eliminar esta imagen del Carrousel de inicio.<br>
                            <a class="btn erase btn-danger btn-xs" role="button">Eliminar</a>
                            <a class="btn cancel-erase btn-info btn-xs" role="button">Cancelar</a>
                        </div>
                        </p>
                    </div>
                </div>
            </div>

        <?php
        }
        ?>
<?php if ($home != 1){?>
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src="https://placeholdit.imgix.net/~text?txtsize=55&txt=950px+X+360px&w=950&h=360&txttrack=0" class="img-responsive" style="width:100%" alt="Image">
                <div class="caption">
                    <h3>Agregar Nuevo Slide</h3>
                    <p>
                        <a href="<?php echo base_url('/SlideUpload/')?>" class="btn btn-info btn-sm" role="button">Agregar</a>

                    </p>
                </div>
            </div>
        </div>

    </div>
<?php }?>
</div>
<?php if ($home != 1){
include"/admin-footer.php";
}?>