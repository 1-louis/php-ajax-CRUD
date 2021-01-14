<?php

function connection_db(){
    $host ='localhost';
    $user ='root';
    $pass = '';
    $db= 'base-tes';
     try {
         return  $bd =new PDO ('mysql:host ='.$host.';dbname='.$db.';charset=utf8',$user,$pass);
     }catch(PDOException $exception){
        exit('failed to connect');
     }
    }
$db = connection_db();
  
echo $_POST['ville'];
$v =  $_POST['ville'];
    
    $statement = $db->prepare(
    " SELECT * from villes_france_free WHERE ville_departement in(SELECT departement_code FROM departement where departement_nom = ?)");
    $statement ->execute([$v]);
    $a=$statement->fetchAll(PDO::FETCH_ASSOC);
    
        var_dump($a);
      

    

 ?>
        <?php foreach($a as $cle) :?>
            
            <option value="" ><?=  $cle['ville_slug'];?>  </option>
        <?php endforeach ?>





