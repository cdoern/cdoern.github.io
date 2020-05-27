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
#form_div{
    float: left;
    width: 80px;
    padding: 50px;
}
input[type=button], input[type=submit], input[type=reset] {
    background-color: #908C8C;
    border: none;
    color: white;
    padding: 4.5px 9px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
}
form{
display:inline;
}
#smallform{
  float: left;
    width: 80px;
    padding: 20px;
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
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #908C8C;
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
<div id="container">
<br>
<br>
<br>

<ul>
  <li><a href="pulse.html">Home</a></li>
  <li><a href="loginpost.html">Post with an account</a></li>
  <li><a href="submit.html">Post anonymously</a></li>
  <li><a href="login.html">Login</a></li>
</ul>
<br>
<h2> Like something you see? look up the user's exact name below to get more posts by them </h2>
<form action="searchsite.php" method="post">
User: <br> <input type="text" name="search">
<input type="submit" value="search now">
</form>
<br>
<br>
<hr>
<br>
<?php
$mysqli = new mysqli("198.71.227.90", "cdoern", "Seadawg01!", "cdoernsocial");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$sql = "SELECT * FROM `posts`";
 
$res = $mysqli->query($sql);

 
if($res->num_rows > 0){
 while($row = $res->fetch_assoc()){
$rownum=$row["id"];
 echo "<div style='margin-bottom: 20px;padding: 20px;background-color: white;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);> User: ". $row["user"]. "<br/> Title: ". $row["posttitle"]. "<br/> Content: ". $row["content"]. "<br/> Likes: " .$row["likes"]. "<br/>"; 
echo'<form action="likes.php" method="post">';
echo'<input type="hidden" name="id" value="'.$rownum.'">';
echo '<input type="submit" value="like">';
echo '</form>';
echo"</div>";
 }

}
else
{
 echo "No Record Found!";
}
?>
</div>
</html>