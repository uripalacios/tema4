<?php
    //require_once("./codigo/segura/conexionBD.php");
    function conexionSinBBDD(){
        if(!($conexion  = @mysqli_connect(IP,USER,PASS))){
            $error = mysqli_connect_errno();
            //exit nos sirve para que no se siga ejecutando, sale del programa
            //error de IP
            if($error==2002){
                echo "Error al concetar con el servidor";
            }
            if($error==1045){
                echo "Error de autentificacion de Usuario o Contraseña";
            }
            exit();
        }else{
            mysqli_close($conexion);
        }
    }
    function conexionConBBDD(){
        if(!($conexion  = @mysqli_connect(IP,USER,PASS,BBDD))){
            crearBoton();
        }else{
            echo "Todo ha ido bien";
           
            mysqli_close($conexion);
        }
    }

    function crearBoton(){
        echo "<input type='submit' value='Crear Script' name='crear'>";
    }

    function crearBBBDD(){
        if(!($conexion  = @mysqli_connect(IP,USER,PASS))){
            echo "Error: ".mysqli_connect_error();
            //exit nos sirve para que no se siga ejecutando, sale del programa
            exit();
        }else{
            $comandosSQl = file_get_contents("./codigo/segura/coches.sql");
            mysqli_multi_query($conexion,$comandosSQl);
            mysqli_close($conexion);
        }
    }

    function create(){
        if(!($conexion  = @mysqli_connect(IP,USER,PASS))){
            echo "Error: ".mysqli_connect_error();
            //exit nos sirve para que no se siga ejecutando, sale del programa
            exit();
        }else{
            mysqli_close($conexion);
        }
    }

    function read($texto){
        if(!($conexion  = @mysqli_connect(IP,USER,PASS,BBDD))){
            echo "Error: ".mysqli_connect_error();
            //exit nos sirve para que no se siga ejecutando, sale del programa
            exit();
        }else{
            //sentencia sql
            $preparada = mysqli_stmt_init($conexion);
            $sql = "select * from coche where marca like %?%";
            $buscar =$texto;
            mysqli_stmt_prepare($preparada,$sql);
            mysqli_stmt_bind_param($preparada,'s',$buscar);
            mysqli_stmt_execute($preparada);
            $resultado = mysqli_stmt_get_result($preparada);
            $fila = mysqli_fetch_array($resultado);
            while($fila){
                print_r($fila);
            }
            mysqli_close($conexion);
        }
    }

    function update(){
        
    }

    function delete(){

    }


?>