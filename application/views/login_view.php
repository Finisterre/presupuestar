<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php
include "/header.php";
include "/navbar.php";
?>

<div class="container-fluid  principal">
  <div class="col-md-4 col-md-push-4 ">

      <div class="panel panel-default " >

          <div class="panel-heading ">

            <h4>Ingresar a mi cuenta</h4>
          </div>
          <div class="panel-body">
              <?php
              $this->load->helper('security');
              ?>
              <?php

              $formAtt = array();
              $formAtt['class'] = 'form-signin';

              echo form_open('verifylogin', $formAtt); ?>
              <form class="form-signin">


                  <?php  echo validation_errors();?>

                  <label class="sr-only" for="username">Usuario</label>
                  <input type="text" autofocus="" required="" placeholder="Usuario" class="form-control" id="username" name="username" oninvalid="this.setCustomValidity('Ingrese su usuario')">
                  <label class="sr-only" for="password">Contraseña</label>
                  <input type="password" required="" placeholder="Contraseña" class="form-control" id="passowrd" name="password" oninvalid="this.setCustomValidity('Ingrese su contraseña')">
                  <div class="checkbox">
                      <label>
                          <input type="checkbox" value="remember-me"> Recordarme
                      </label>
                  </div>
                  <button type="submit" class="btn btn-info btn-block">Entrar</button>
              </form>

          </div>


          <div class="panel-footer">
              No tenés cuenta? <a href="#">Regístrate</a>
          </div>
      </div>

</div>
</div>
<?php
include "/footer.php";
?>