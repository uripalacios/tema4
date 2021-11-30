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
        //recorremos el resultado
        while($fila = mysqli_fetch_array($resultado)){
            echo "<pre>";
            print_r($fila);
            echo "</pre>";
        }

        mysqli_free_result($resultado);

        mysqli_close($conexion);
    }
    echo "<br>Consultas preparadas<br>";
    /******
     * sentencias Preparadas sin resultados
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
        //insert values
        $sql = "insert into alumno values(?,?,?)";
        $id = 99;
        $nombre = "Santiago";
        $edad = 50;

        $consulta = mysqli_prepare($conexion,$sql);

        mysqli_stmt_bind_param($consulta,'isi',$id,$nombre,$edad);
        mysqli_stmt_execute($consulta);

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
    /***
     * sentencia preparada con resultado con objetos
     */
    $miConexion = new mysqli();
    @$miConexion->connect(IP,USER,PASS,BBDD);

    if($miConexion->connect_errno !=0){
        echo "Error: " . $miConexion->connect_error;
        exit();
    }else{
        //inicializar el obejeto stmt
        $preparado = $miConexion->stmt_init();
        $sql = "select * from alumno where id > ?";
        $preparado->prepare($sql);
        $id = 5;
        $preparado->bind_param('i',$id);
        $preparado->execute();
        $preparado->bind_result($rid,$rnombre,$redad);
        while($preparado->fetch()){
            echo "<br>";
            echo $rid. "," .$rnombre.",".$redad;
        }
        $preparado->free_result();
        $miConexion->close();
    }
    /****
     * Transaccion con objetos
     * Borrar una fila y luego no guardar los cambios
     */
    $miConexion = new mysqli();
    @$miConexion->connect(IP,USER,PASS,BBDD);

    if($miConexion->connect_errno !=0){
        echo "Error: " . $miConexion->connect_error;
        exit();
    }else{
        //quitar autocommit
        $miConexion->autocommit(false);
        $sql = "delete from alumno where id = ?";
        $id = 99;
        $stmt = $miConexion->stmt_init();
        $stmt->prepare($sql);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        //decido si vuelvo al inicio con rollback o guardo con commit
        //$miConexion->rollback();
        $miConexion->commit();
        $stmt->free_result();
        $miConexion->close();
    }
?>