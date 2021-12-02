<?php
    require_once("./codigo/segura/conexionBD.php");
    function conexionSinBBDD(){
        if(!($conexion  = @mysqli_connect(IP,USER,PASS))){
            echo "Error: ".mysqli_connect_error();
            //exit nos sirve para que no se siga ejecutando, sale del programa
            exit();
        }else{
            echo "Todo ha ido bien";
           
    
            mysqli_close($conexion);
        }
    }
    function conexionConBBDD(){
        if(!($conexion  = @mysqli_connect(IP,USER,PASS,BBDD))){
            echo "Error: ".mysqli_connect_error();
            //exit nos sirve para que no se siga ejecutando, sale del programa
            exit();
        }else{
            echo "Todo ha ido bien";
           
    
            mysqli_close($conexion);
        }
    }

    function crearBoton(){
        
    }
    function create(){

    }

    function read(){

    }

    function update(){

    }

    function delete(){

    }


?>