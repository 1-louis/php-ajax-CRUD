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

$stmt = $db->prepare('SELECT * FROM `departement` WHERE  `departement_code`');
$stmt->execute();
$villes = $stmt->fetchAll(PDO::FETCH_ASSOC);
// var_dump($villes);
$ville = isset($_POST['vs']);


?>

<form action="" method="POST">

    <select name="select" style='text-align:center; magin:10px auto;'  id="selected"  onchange="ouvrir()" > 
        <?php foreach($villes as $key) :?>
            
            <option value="" ><?=  $key['departement_nom'];?>  </option>
            <?php endforeach ?>

    </select>
</form>
<select   id="result"  > 

            
    </select>


<script>
function ouvrir(){
    var tes =  document.getElementById('selected').options[document.getElementById('selected').selectedIndex].text;
    console.log(tes)   //console.log(test);
var xhr ;
 if (window.XMLHttpRequest) { // Mozilla, Safari, ...
    xhr = new XMLHttpRequest();
   // console.log("test")

} else if (window.ActiveXObject) { // IE 8 and older
    //console.log("teste")

    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
var data = "ville=" + tes ;
console.log(data)
     xhr.open("POST", "ajax.php", true); 
     xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                  
     xhr.send(data);
     xhr.onreadystatechange = display_data;
    function display_data() {
     if (xhr.readyState == 4) {
        console.log("teste1")

      if (xhr.status == 200) {
     

      document.getElementById("result").innerHTML = xhr.responseText;
      } else {
        alert('There was a problem with the request.');
      }
     }
    }
}
</script>