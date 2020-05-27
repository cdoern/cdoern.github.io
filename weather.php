<html>
<head>
<link rel="icon" type="image/png" sizes="96x96" href="/favicon2-96x96.png">
<title> Cdoern weather </title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" >
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="apple-touch-icon" sizes="152x152" href="icon2-152x152.png">
  <link rel="manifest" href="manifest2.json" />
</head>
<style>

/* All Screen sizes */
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
  width:1000px;
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
</style>
<body background color = blue>
<?php
$mysqli = new mysqli("198.71.227.90", "cdoern", "Seadawg01!", "cdoernsocial");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
$sql = "DELETE FROM `location`";
$mysqli->query($sql);
$loc = $_POST['loc'];
echo $loc."<br/><br/>";
$sql = "INSERT INTO `location` (city) VALUES ('$loc')";
$mysqli->query($sql); 
}
else if($_SERVER['REQUEST_METHOD'] != 'POST'){
$sql = "DELETE FROM `location`";
$mysqli->query($sql); 
$sql = "DELETE FROM `coordinates`";
$mysqli->query($sql); 
$user_ip = getenv('REMOTE_ADDR');
$geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
$lat = $geo["geoplugin_latitude"]; 
$long = $geo["geoplugin_longitude"];
$country = $geo["geoplugin_countryName"];
$city = $geo["geoplugin_city"];
$region= $geo["geoplugin_region"];
$sql = "INSERT INTO `coordinates` (lat, lon) VALUES ('$lat', '$long')";
$mysqli->query($sql); 
$city = $city .', '. $region; 
echo $city."<br/><br/>";
$sql = "INSERT INTO `location` (city) VALUES ('$city')";
$mysqli->query($sql); 
}
?>
<form method="post" action = "weather.php">
<input type="text" name = "loc">
<input type="submit" name="button" value="Search for location">
</form>
<br>
<ul>
  <li><a href="forecast.php">15 hour forecast</a></li>
<li><a href="weather.php">Reload Current Location</a></li>
</ul>
<br>
<?php
$sql = "SELECT * FROM `currentw`";
 
$res = $mysqli->query($sql);

 
if($res->num_rows > 0){
 while($row = $res->fetch_assoc()){
$rownum=$row["id"];

 echo " <h1> The Current Temperature is: ". $row["temp"]. " degrees Fahrenheit</h1><br/>"; 

 }

}
else
{
 echo "No Record Found!";
}


?>
<?php
$sql = "SELECT * FROM `minutely`";
 
$res = $mysqli->query($sql);

 
if($res->num_rows > 0){
 while($row = $res->fetch_assoc()){
$rownum=$row["id"];

 echo "<br/> <strong> ". $row["now"]. " </strong><br/><br/>"; 

 }

}
else
{
 echo "No Record Found!";
}


?>
<?php
$sql = "SELECT * FROM `weather`";
 
$res = $mysqli->query($sql);

echo "<br/> Below is the forecast for the next 7 days. The first entry is the predicted weather for today. <br/><br/>";
if($res->num_rows > 0){
 while($row = $res->fetch_assoc()){
$rownum=$row["id"];

 echo "<div id=content> <div id = container> Date: ". $row["date"]. "<br/> High: ". $row["high"]. "<br/> Low: ". $row["low"]. "<br/> Condition: " .$row["cond"]. "<br/>"; 
echo"</div></div>";
 }

}
else
{
 echo "No Record Found!";
}


?>
<a href="https://darksky.net/poweredby/">Powered by Dark Sky</a>
</body>
</html>