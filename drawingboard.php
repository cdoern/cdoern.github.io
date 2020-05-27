<!DOCTYPE html>
<html>
<body>
<?php
$mysqli = new mysqli("198.71.227.90", "cdoern", "Seadawg01!", "cdoernsocial");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$sql = "SELECT * FROM `pictures`";
 
$res = $mysqli->query($sql);
if($res->num_rows > 0){
 while($row = $res->fetch_assoc()){ 
 $data = $row["pic"];
echo "<img src= '$data'  />";
 }

}
else
{
 echo "No Record Found!";
}
?>
</body>
</html>
