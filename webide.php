<!DOCTYPE html>
<html>
<head>
<title>Web IDE</title>
<script src="codemirror/codemirror.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="codemirror/night.css">
<meta http-equiv="content-type" content="text/html; charset=UTF-8" >
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="codemirror/codemirror.css">
<link rel="stylesheet" href="codemirror/fullscreen.css">
<script src="codemirror/javascript.js"></script>	
<script src="codemirror/matchbrackets.js"></script>
<script src="codemirror/fullscreen.js"></script>

<style>
/* All Screen sizes */
@media screen{
*{
  margin: 0;
  padding: 0;
  /*font-family: 'Roboto', sans-serif; */
}
body{
  background-color:#404040;
  margin: 0;
  padding: 0;
}
input[type=submit] {
    padding:5px 15px; 
    background:#ccc; 
    border:0 none;
    cursor:pointer;
    -webkit-border-radius: 5px;
    border-radius: 5px; 
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
  width: 80%;
}
#content-right{
  margin-bottom: 20px;
  padding: 20px;
  background-color: white;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  width: 80%;
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
  margin-left: 0 auto;
  display: inline-block;
}
#container-res{
	margin-right: 0 auto;
	display: inline-block;
}
#container-title{
	margin: 0 auto
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
<div id ="container-title"> <div id = "site_title"> <h1> JavaScript Web IDE </h1> </div> </div>
<div id = "container">
<div id = "content">
<form action="submit.php" method="post" onsubmit="generate('hiddenfield')">
<input type="text" name="name">
<input type="hidden"  id="hiddenfield" name="text" value="">
<input type="submit" value="Save">
</form>
<textarea id="myTextarea" name="code"></textarea>
<script>

</script>
<br>
<button> Compile </button>
<script>
	
  var CodeMirror = CodeMirror.fromTextArea(myTextarea, {
    lineNumbers: true,
	mode: "javascript",
	theme: "night",
	matchBrackets: true,
	extraKeys: {
        "F11": function(cm) {
          cm.setOption("fullScreen", !cm.getOption("fullScreen"));
        },
        "Esc": function(cm) {
          if (cm.getOption("fullScreen")) cm.setOption("fullScreen", false);
        }
      }
  });
var str = "";
var code = "";
CodeMirror.getDoc().setValue(`<?=$_POST['text']?>`);
function generate(hiddenfield){
var field = document.getElementById(hiddenfield);
var str = CodeMirror.getValue();
var res = str.replace(new RegExp("'", 'g'), "''");
field.value = res
}
$(document).ready(function(){
  $("button").click(function(){
code = CodeMirror.getValue();
console.log(code);
    $.post("https://api.judge0.com/submissions/?",
    {
      "source_code" : code,
      "language_id" : "30"
    },
	function(data,status){
	 str = data.token;
	 console.log("string: " +str);
	setTimeout(function(){
	    $.get("https://api.judge0.com/submissions/"+str+"?base64_encoded=false&fields=stdout,stderr", function(data2, status){
		//alert("Data: " + data2.stdout);
        document.getElementById('content-right').innerHTML = "<h1> Code Output and Errors </h1> Output: " + data2.stdout + "<br> Errors: " +  data2.stderr;
	  });
	}, 5000);
    })
  });
});
</script>
</div>
</div>
<div id = "container-res">
<div id = "content-right">
<h1> Code Output and Errors </h1>
</div>	
</div>
</body>
</html>
