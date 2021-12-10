<?php
    require_once "./segura/datosBD.php";
$dsn = "mysql:host=".IP.";dbname=".BBDD;
/*Insert sin parametros
try{
    $con = new PDO($dsn,USER,PASS);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Todo ha ido bien";
    //insertamos en al bbdd un usuario
    //comento para que no me de error
    $sql = "insert into alumno values(350,'pepe',65)";
    
    $sql = "select * from alumno";
    $result = $con->query($sql);

}*/
/*Consultas normales
try{
    $con = new PDO($dsn,USER,PASS);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Todo ha ido bien";
    //insertamos en al bbdd un usuario

    $sql = "select * from alumno";
    $result = $con->query($sql);
    while ($row = $result->fetch(PDO::FETCH_OBJ)) {
        # code...
        echo "<pre>";
        print_r($row);
        echo "<br>";
    }

}*/

/*//consultas preparadas forma 1
try{
    $con = new PDO($dsn,USER,PASS);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Todo ha ido bien";
    //insertamos en al bbdd un usuario

    $preparada = $con->prepare("insert into alumno values (?,?,?)");
    //crear el array antes
    $arrayparametros = array(123,'Viernes',35);
    //o crearlo en el execute
    $preparada->execute($arrayparametros);
}
catch(PDOException $ex){
    echo "error: ".$ex->getMessage();
    echo "<br>";
    echo "error: ".$ex->getCode();
}finally{
    unset($con);
}
*/
/*//Consultas prepradas forma 2 
try{
    $con = new PDO($dsn,USER,PASS);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Todo ha ido bien";
    //insertamos en al bbdd un usuario

    $preparada = $con->prepare("insert into alumno values (?,?,?)");
    //crear el binParameter
    $a = 124;
    $b = "sabado";
    $c = 26;
    $preparada->bindParam(1,$a);
    $preparada->bindParam(2,$b);
    $preparada->bindParam(3,$c);
    $preparada->execute();
}
catch(PDOException $ex){
    echo "error: ".$ex->getMessage();
    echo "<br>";
    echo "error: ".$ex->getCode();
}finally{
    unset($con);
}
*/
/*Consultas prepradas forma 3 */
try{
    $con = new PDO($dsn,USER,PASS);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Todo ha ido bien";
    //Hacemos un select

    $preparada =$con->prepare("select * from alumno where nombre like :nombre");
    $nombrelike = "%ri%";
    $preparada->bindParam(":nombre",$nombrelike);
    $preparada->execute();
    //segunda forma
    $preparada->bindColumn(1,$id);
    $preparada->bindColumn(2,$nombre);
    $preparada->bindColumn(3,$edad);
  /*  //primera forma
    echo "<p>primera forma</p>";
    while ($row = $preparada->fetch()) {
        echo "<br>".$row[0].":".$row[1].":".$row[2];
    }
    */
    //segunda forma
    echo "<p>segunda forma</p>";
    while ($preparada->fetch()) {
        echo "<br>".$id.":".$nombre.":".$edad;
    }
}
catch(PDOException $ex){
    echo "error: ".$ex->getMessage();
    echo "<br>";
    echo "error: ".$ex->getCode();
}finally{
    unset($con);
}

/*
//Transacciones
*/
try{
    $con = new PDO($dsn,USER,PASS);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Todo ha ido bien";
    //insertamos en al bbdd un usuario

    $preparada = $con->prepare("insert into alumno values (?,?,?)");
    //crear el array antes
    $con->beginTransaction();
    $arrayparametros = array(
        array(120,'Lunes',35),
        array(121,'Martes',35),
        array(122,'Miercoles',35),
        array(123,'Jueves',35));
    //insertar 4 valores 
    foreach ($arrayparametros as $value) {
        # code...
        $preparada->execute($value);
    }
    $con->commit();

}
catch(PDOException $ex){
    $con->rollBack();
    echo "error: ".$ex->getMessage();
    echo "<br>";
    echo "error: ".$ex->getCode();
}finally{
    unset($con);
}
?>