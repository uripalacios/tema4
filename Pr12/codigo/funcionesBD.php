<?php
    require_once("./segura/conexionBD.php");
    function conexion(){
        if(!($conexion  = @mysqli_connect(IP,USER,PASS,BBDD))){
            echo "Error: ".mysqli_connect_error();
            //exit nos sirve para que no se siga ejecutando, sale del programa
            exit();
        }else{
            echo "Todo ha ido bien";
           
    
            mysqli_close($conexion);
        }
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