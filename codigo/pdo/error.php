<?
    try{
        $a = 0/1;
        if($a==0){
            throw new Exception();
        }
        $A = $a/1;
    }catch(Exception $ex){
        echo "error";
    }finally{

    }

?>