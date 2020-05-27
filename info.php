<html>
<head>
<link href="data:image/x-icon;base64,AAABAAEAEBAAAAEACABoBQAAFgAAACgAAAAQAAAAIAAAAAEACAAAAAAAAAEAAAAAAAAAAAAAAAEAAAAAAAAhQ2wAAAAAAA8+XgCoyqAAZYFfAPm1ZgAPMUQAyX0lAGF8WwCzcSIATlRxACNDaABAXD8AFR0TAKDCmQAmLlIABUCdAMV7JAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABwcHBwcBAQEBAQEHBwcHBwUHBwcHEAsLCwsLAQcHBwcFBQcHBxAQCwsLCwsHBwcHBQUFBwEQEBALCwsLBwcHBwUFBQUQEBAQEAsLCwcHBwcFBQUFEBAQEBAACwsHBwcHBQUFBRAQEBAQCwsLCwcHBwUFBQUBCgoKDw8PDwcHBwcFBQUIAQUFAgEHBwcHBwcHBQUFDAQFBQEGBwcBCAgIBwUFBQUFAQUFBQcJCAMMBwcFBQUFDAwMDQUFEQgMAQcHBQUFAwgIDAMFAQEBBwcHBwUFBQUMDggFBQwDCAEHBwcFBQUFDAgFBQUFBQUFBwcHBQUFBQUFBQUFBQUFBQUHBwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA=" rel="icon" type="image/x-icon" />
<title>Take care of our plants</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" >
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link type="text/css" rel="stylesheet" href="//pubnub.github.io/eon/v/eon/0.0.9/eon.css" />
</head>

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
body{
  background-color: #7EC0EE;
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
</head>
<body>
<h1 id="site_title">THE GARDEN <br> 

</h1>
<div id ="container">
<div id = "content">
<h1>Weekly Trend</h1>
<?php
$mysqli = new mysqli("198.71.227.90", "cdoern", "Seadawg01!", "cdoernsocial");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$sql = "SELECT * FROM `deslist`";
 
$res = $mysqli->query($sql);

 
if($res->num_rows > 0){
 while($row = $res->fetch_assoc()){
$rownum=$row["id"];
 echo  $row["day"]. " : ". $row["des"]. "<br/> <br/>  "; 

 }

}
else
{
 echo "No Record Found!";
}


?>
</div>
<div id = "content">
<h1>Current Yes vs No votes</h1>
<?php
$mysqli = new mysqli("198.71.227.90", "cdoern", "Seadawg01!", "cdoernsocial");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$sql = "SELECT * FROM `yescounter`";
 
$res = $mysqli->query($sql);

 
if($res->num_rows > 0){
 while($row = $res->fetch_assoc()){
$rownum=$row["id"];
 echo  "Yes: " .$row["count"]. "<br/><br/>"; 

 }

}
else
{
 echo "No Record Found!";
}


?>
<?php
$mysqli = new mysqli("198.71.227.90", "cdoern", "Seadawg01!", "cdoernsocial");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$sql = "SELECT * FROM `nocounter`";
 
$res = $mysqli->query($sql);

 
if($res->num_rows > 0){
 while($row = $res->fetch_assoc()){
$rownum=$row["id"];
 echo  "No: " .$row["count"]; 

 }

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