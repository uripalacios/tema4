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
        conexionSinBBDD();
             
    ?>
    <form action="" method="post">
        <?php conexionConBBDD();?>

        <button id="leer">Leer</button>
        
        <button id="insertar">Insertar</button>
    </form>
    
    
</body>
</html>