<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<style>
/* All Screen sizes */
@media screen{
*{
  margin: 0;
  padding: 0;
  font-family: 'Roboto', sans-serif;
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
#header{
position: absolute;
width: 1905px;
height: 50px;
background-color: #fe0000;
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
</head>
<body style="background-color: #fdf6f6">
<div id = "header">
<h1> Pulse </h1>
</div>
<br>
<br>
<br>
<div id="container">
<div id="content">
<?php
$mysqli = new mysqli("198.71.227.90", "cdoern", "Seadawg01!", "cdoernsocial");
	$q = $_POST['search'];
echo "<div style='font: 25px sans-serif;text-align:center'>". $q."'s profile <br/><br/></div>";
$sql = "SELECT * FROM `posts` WHERE `user` = '$q'";
 
$res = $mysqli->query($sql);
 

 while($row = $res->fetch_assoc()){
echo "<div style ='font:15px/30px sans-serif;color:#908C8C'> title: ". $row["posttitle"]. "<br/> </div>";
echo "<div style ='font:15px/30px sans-serif;color:#908C8C'> content: ". $row["content"]. "<br/><br/> </div>";
 }
?>
</div>
</div>
</body>
</html>