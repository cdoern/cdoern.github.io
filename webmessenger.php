<?php
if(isset($_REQUEST['login'])){

$name= $_POST['user'];
$pass= $_POST['pass'];
}
//include("update.php");
$mysqli = new mysqli("198.71.227.90", "cdoern", "Seadawg01!", "cdoernsocial");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

if (isset($_REQUEST['message'])){ 

$name = $_POST['name'];
$pass = $_POST['pass'];
$message = $_POST['message'];

if($pass == 'charchar' || $pass == 'chickpea'){
$final = $name . ": " . $message;
$sql = "INSERT INTO `messages` (text) VALUES ('$final')";
$mysqli->query($sql); 
}
}
?>
<html>
<head>
<script src="https://code.jquery.com/jquery-2.1.0.min.js"  type="text/javascript"></script>
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
  <body>
 <form action="webmessenger.php" method="post" name="submit">
<input type='hidden' name='pass' value='<?php echo "$pass";?>'/>
   <input type='hidden' name='name' value='<?php  echo "$name";?>'/>
      <input type="text" name = "message"/>
		 <input type = "submit" value = "send"/>
   
    
    </form>
  </body>
<?php
if($pass == 'chickpea' || $pass == 'charchar'){
echo "<div id = container>";

echo"</div>";
}
else{
echo "not valid credentials";
}
   ?>
<script language="javascript" type="text/javascript">
function loadlink(){
 //$("div").empty();
    $('#container').load('update.php',function () {
         $(this).unwrap();
    });

};

loadlink(); // This will run on page load
setInterval(function(){
    loadlink() // this will run after every 5 seconds
}, 5000);
</script>
<?php


?>

</html>
