
<nav class="navbar navbar-inverse  navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url()?>">
                <img src="<?php echo base_url("assets/images/logo.png"); ?>" alt="Presupuestar">
            </a>

        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <form class="navbar-form navbar-left">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Buscar..." aria-describedby="basic-addon2">
                    <span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-search"></span> </span>
                </div>
            </form>
            <ul class="nav navbar-nav navbar-right">

                <?php if(empty($username)){
    ?>
    <li><a href="<?php echo base_url();?>login">Ingresar</a></li>
    <li><a href="<?php echo base_url();?>user/register">Regístrate</a></li>
    <li><a href="<?php echo base_url();?>user/register">Cómo Funciona</a></li>
<?php
}else{?>
    <li><a href="#"><span class="glyphicon glyphicon-question-sign help"></span></a></li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon glyphicon-user"></span>
            <?php if(isset($username)){
                echo ucfirst($user_names);
            } ?>
            <span class="caret"></span></a>
        <ul class="dropdown-menu">

            <li><a href="#">Modificar Datos</a></li>
            <li><a href="admin/logout">Cerrar Sesión</a></li>

        </ul>
    </li>
<?php } ?>

</ul>
</div>
</div>
</nav>