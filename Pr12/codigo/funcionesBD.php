<?php
    require_once("./codigo/segura/conexionBD.php");
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
        echo "<button name='creacionBD' id='creacionBD'><a href='./codigo/crearBD.php'>Crear Script</a></button>";
    }

    function crearBBBDD(){
        if(!($conexion  = @mysqli_connect(IP,USER,PASS))){
            echo "Error: ".mysqli_connect_error();
            //exit nos sirve para que no se siga ejecutando, sale del programa
            exit();
        }else{
            $comandosSQl = file_get_contents("./segura/coches.sql");
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

    function read(){

    }

    function update(){

    }

    function delete(){

    }


?>