<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

<?php
include "/header.php";
include "/navbar.php";
?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-3">
            <?php echo $this->session->flashdata('verify_msg'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Registrarse como profesional</h4>
                </div>
                <div class="panel-body">
                    <?php $attributes = array("name" => "registrationform");
                    echo form_open("user/register", $attributes);?>
                   
                    <div class="form-group col-md-6">
                        <label for="name">Nombre</label>
                        <input class="form-control" name="fname" placeholder="Nombre" type="text" value="<?php echo set_value('fname'); ?>" />
                        <span class="text-danger"><?php echo form_error('fname'); ?></span>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="name">Apellido</label>
                        <input class="form-control" name="lname" placeholder="Apellido" type="text" value="<?php echo set_value('lname'); ?>" />
                        <span class="text-danger"><?php echo form_error('lname'); ?></span>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="name">Razon Social</label>
                        <input class="form-control" name="lname" placeholder="Nombre de su empresa, si lo tiene" type="text" value="<?php echo set_value('lname'); ?>" />
                        <span class="text-danger"><?php echo form_error('lname'); ?></span>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="email">Correo Electrónico</label>
                        <input class="form-control" name="email" placeholder="Correo Electrónico" type="text" value="<?php echo set_value('email'); ?>" />
                        <span class="text-danger"><?php echo form_error('email'); ?></span>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="email">Teléfono Fijo </label>
                        <input class="form-control" name="email2" placeholder="011 555 5555" type="text" value="<?php echo set_value('email'); ?>" />
                        <span class="text-danger"><?php echo form_error('email'); ?></span>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="email">Teléfono Celular </label>
                        <input class="form-control" name="email2" placeholder="15 5 555 555" type="text" value="<?php echo set_value('email'); ?>" />
                        <span class="text-danger"><?php echo form_error('email'); ?></span>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="subject">Contraseña</label>
                        <input class="form-control" name="password" placeholder="Contraseña" type="password" />
                        <span class="text-danger"><?php echo form_error('password'); ?></span>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="subject">Repetir Contraseña</label>
                        <input class="form-control" name="cpassword" placeholder="Contraseña" type="password" />
                        <span class="text-danger"><?php echo form_error('cpassword'); ?></span>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="sel1">Facturación</label>
                        <select class="form-control" id="sel1">
                            <option>Monotributista</option>
                            <option>Responsable Inscripto</option>
                        </select>
                    </div>
                    <div class="col-md-6"> 
                    <label for="">Rubros:</label>
                    <?php
                    foreach($rubros as $rubro){
                       ?>
                        <div class="checkbox">
                            <label><input type="checkbox" value="<?php echo $rubro->id; ?>"><?php echo $rubro->name;?></label>
                        </div>

                    <?php
                    }

                    ?>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="sel1">Zona de Trabajo:</label>

                          <?php
                          foreach($zones as $zone){
                              ?>
                              <div class="checkbox">
                                  <label><input type="checkbox" value="<?php echo $zone->id; ?>"><?php echo $zone->name;?></label>
                              </div>

                          <?php
                          }?>




                    </div>

                    <div class="form-group col-md-12">
                        <button name="submit" type="submit" class="btn btn-default btn-block">Registrarse</button>
                      
                    </div>
                    <?php echo form_close(); ?>
                    <?php echo $this->session->flashdata('msg'); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "/footer.php";?>