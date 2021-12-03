<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica 12</title>
</head>
<body>
    <h1>CRUD</h1>
    <?php
        require_once("./codigo/funcionesBD.php");
        require_once("./codigo/segura/conexionBD.php");
        conexionSinBBDD();

        //si la conexionConBBDD es true ya se ha hecho el boton y me entrar en el if cuando se recargue la pagina
        if(isset($_REQUEST['crear'])){
            crearBBBDD();
        }
             
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <?php conexionConBBDD();?>
        <input type="submit" value="Leer" name="Leido">
        <input type="submit" value="Insertar" name="Insertar">      
        
    </form>
    
    
</body>
</html>