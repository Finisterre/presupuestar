<div class="container principal">
    <div class="row">
        <div class="col-sm-12">
            <h4>Rubros </h4>
            <?php


            foreach($rubros as $rubro){
                ?>

                <a class="btn btn-info btn-sm">
                    <?php echo $rubro->name; ?></h3>
                </a>
            <?php

            }

            ?>

        </div>


    </div>
</div>