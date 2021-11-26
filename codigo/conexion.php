<?php

    //para conectar
    //host, usuario, pass, bd*
    require_once("./segura/datosBD.php");
    //mysqli_connect(IP,USER,PASS,BBDD) conexion en a la base de datos
    //@ delante de la funcion para que no me muestre el error
    //mysqli_connect_errno() para que nos muestre ek numero de error 
    //mysqli_connect_error() para que nos diga cual es el error
    /************
     * 
     * con funciones de mysqli
     * 
     */

    if(!($conexion  = @mysqli_connect(IP,USER,PASS,BBDD))){
        echo "Error";
        echo "<br>";
        echo "Numero: ".mysqli_connect_errno();
        echo "<br>";
        echo "Error: ".mysqli_connect_error();
        //exit nos sirve para que no se siga ejecutando, sale del programa
        exit();
    }else{
        echo "Todo ha ido bien";
        //cerrar la tuveria (conexion)
       /*
        //ejecutar consultas 
        $sql = "insert into alumno values(6,'hector','24'),(7,'santiago','24')";
        $resultado = mysqli_query($conexion,$sql);
        if($resultado)
        {
            echo "<br>Num de filas afectadas: " . mysqli_affected_rows($conexion);
        }else{
            echo "No se ha insertado nada";
        }
        */
        //ejecutar select
        $sql = "select * from alumno";
        $resultado = mysqli_query($conexion, $sql,MYSQLI_USE_RESULT);
        

        mysqli_close($conexion);
    }
    echo "<br>Con Objetos<br>";
    /******
     * 
     * 
     * Conexion con objetos
     * 
     */
    $miConexion = new mysqli();
    @$miConexion->connect(IP,USER,PASS,BBDD);

    if($miConexion->connect_errno !=0){
        echo "Error: " . $miConexion->connect_error;
        exit();
    }else{
        echo "Todo ha ido bien";
        $miConexion->close();
    }
?>