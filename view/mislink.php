<?php

use model\LinksModel as LinksModel;

session_start();
    require_once("../models/LinksModel.php");
    if(isset($_SESSION['usuario'])){
    $model = new LinksModel();
    $Links = $model->getaAllLinksByEmail($_SESSION['usuario']['email']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php 
    
    if (isset($_SESSION['usuario'])) {?>
         <nav class="blue-grey darken-4">
    <div class="nav-wrapper">
      <a href="#" class="brand-logo">Bienvenido <?= $_SESSION['usuario']['nombre'] ?></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="nuevo_link.php">Nuevo Link</a></li>
        <li class="active"><a href="mislink.php">Mis Links</a></li>
        <li><a href="salir.php">Cerrar Sesion</a></li>
      </ul>
    </div>
  </nav>
        <div class="container">
            <div class="row">
                <?php foreach ($links as $link) {?>
                    <div class="col l4 m4 s12">
                    <div class="card">
                        <div class="card-image">
                            <img src="https://1.bp.blogspot.com/-2ZRLOy7kflU/XGLpLvHw6jI/AAAAAAAAE0s/d2xLOsj3JTES3WtZHDUL1scshbW2Qp-hQCLcBGAs/s1600/links.jpg">
                            <span class="card-title"><?=$link['nombre'] ?></span>
                             </div>
                                <div class="card-content">
                                    </div>
                                 <div class="card-action">
                              <a href="<?= $link['link'] ?>">This is a link</a>
                           </div>
                        </div>
                  </div>
                </div>
                    </div>
                <?php }?>
            </div>
        </div>
        



   <?php } else{?>
        <h3 class="red-text">Error De Acceso</h3>
        <p>
            Usted no tiene permisos para estar aqui
            <br>
            <a href=" ../index.php"> Home</a>
        </p>


   <?php }?>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>