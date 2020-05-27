<?php
 $pdo = new PDO('mysql:host=198.71.227.90;dbname=cdoernsearchengine','cdoern','Seadawg01!');
 $search = $_GET['q'];

$searche = explode(" ", $search);
$x = 0;
$construct = "";
$params = array();
foreach ($searche as $term){
$x++;
if($x == 1){
$construct .= "title LIKE CONCAT('%',:search$x,'%') OR description LIKE CONCAT('%',:search$x,'%') OR keywords LIKE CONCAT('%',:search$x,'%')";
}
else{
    $construct .= "AND title LIKE CONCAT('%',:search$x,'%') OR desrciption LIKE CONCAT('%',:search$x,'%') OR keywords LIKE CONCAT('%',:search$x,'%')";
}
$params[":searxh$x"] = $term;
}
 $results= $pdo->prepare("SELECT * FROM `index` WHERE $construct");
 //$results->execute($params);


 if($results->rowCount90 == 0){
     echo "0 results found <hr />";
 }
 else{
     echo $results->rowCount()." results found! <hr />";

 }
 echo "<pre>";
 foreach($results->fetchAll() as $result){
     echo $result["title"]."<br />";
     if($result["description"] == ""){
         echo "No description!"."<br />";
     }
     else{
     echo $result["description"]."<br />";
     }
     echo $result["url"]."<br />";
     echo "<hr />";
 }
 //print_r($results->fetchAll());