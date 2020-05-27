<!DOCTYPE html>
<html>
<title>	
</title>
<head>
</head>
<style>
	#button{
	text-align: center;
	}
@media screen{
*{
  margin: 0;
  padding: 0;
  font-family: 'Roboto', sans-serif;
}
body{
  background-color:#7092be;
  margin: 0;
  padding: 0;
}
	input[type=text] {
  width: 90%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
}
#site_title{
  width:200px;
  margin: 20px auto;
  text-align: center;
  font-family: 'Roboto Slab', serif;
}
#button{
 text-align: center;
}
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #908C8C;
}
 a {
    text-align: center;
    display: block;
    margin: 0 auto;
}
ol {
margin-left: 25;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover {
    background-color: #111;
}
	input[type=button], input[type=submit], input[type=reset] {
  border: none;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}
#content h1{
  margin-bottom: 20px;
}
#content h2{
  margin: 15px 0;
}
#content h3{
  margin: 10px 0;
}
#content{
  margin-bottom: 20px;
  padding: 20px;
  background-color: white;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
#content p{
  margin: 7.5px 0;
}
#content ul{
  margin: 0 20px;
}
#footer{
  text-align: center;
  color:white;
  margin-bottom: 20px;
}
#footer a{
  color:white;
}
#container{
  margin: 0 auto;
}
#livecamera{
  border:0;
}
}
/* Screen 1000px and larger */
@media (min-width: 1000px){
#container{
  width:900px;
}
#livecamera{
  width:960px;
  height: 540px;
}
}
@media screen and (min-width: 800px) and (max-width: 1000px){
#container{
  width:800px;
}
#livecamera{
  width:760px;
  height: 428px;
}
}
@media screen and (min-width: 600px) and (max-width: 800px){
#container{
  width:600px;
}
#livecamera{
  width:560px;
  height: 315px;
}
}
@media screen and (min-width: 400px) and (max-width: 600px){
#container{
  width:400px;
}
#livecamera{
  width:360px;
  height: 203px;
}
}
@media screen and (max-width: 400px){
#container{
  width:100%;
}
#livecamera{
  width:100%;
}
}
table, th, td {
  border: 1px solid black;
}
	table{
   margin: 0 auto; 
	}
th{
	text-align: left
	}
td {
  padding: 15px;
}
</style>
<body>
	<a href="pixelform.html">Click here to input a new pixel entry!</a>
<div id = "site_title">
	<h1> Online Pixel log </h1>
	<br>
	 <form action="vchome.php" method="post" name="login">
        <input type='hidden' name='pass' value='charchar'/>
        <input type='hidden' name='user' value='vicorchar'/>
		 <div id = "button">
		 <input type = "submit" value = "Home" name="login"/>
		 </div>
	  </form>
	</div>
<div id = "container">
<div id = "content">
<?php
$mysqli = new mysqli("198.71.227.90", "cdoern", "Seadawg01!", "cdoernsocial");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
	if ($_SERVER["REQUEST_METHOD"] == "POST"){ 
$color = $_POST['color'];
$comment = $_POST['comment'];
$day = $_POST['day'];
$sql = "UPDATE days SET color = '$color' WHERE id = '$day'";
$mysqli->query($sql);
$sql = "UPDATE days SET comment = '$comment' WHERE id = '$day'";
$mysqli->query($sql);
	}
$sql = "SELECT * FROM `days`";
$res = $mysqli->query($sql); 
if($res->num_rows > 0){
    $days = 0;
    echo"<table align='center'>";
	echo"<tr>";
 while($row = $res->fetch_assoc()){
$rownum=$row["id"];    
    $days++;
	 $color = $row["color"];
	  $comment = $row["comment"];
    echo"<td bgcolor=$color> $days <br> $comment </td>";
if($days % 10 == 0){
echo"</tr>";
echo"<tr>";
}
 }
 echo"</table>";
}
else
{
 echo "No Record Found!";
}
?>
	</div>
	</div>
</body>
</html>