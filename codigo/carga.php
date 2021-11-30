<?php

    require_once ("./segura/datosBD.php");


    $miBD = new mysqli();
    $miBD->connect(IP,USER,PASS);

    if($miBD->connect_errno !=0){
        echo "Error de conexion";
        exit;
    }else{
        $comandosSQL = file_get_contents("./segura/Script.sql");
        $miBD->multi_query($comandosSQL);
        $miBD->close();
    }
?>