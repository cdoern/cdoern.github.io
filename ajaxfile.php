<?php
$mysqli = new mysqli("198.71.227.90", "cdoern", "Seadawg01!", "cdoernsocial");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$image = $_POST['image'];
echo $image;
$location = "upload/";

$image_parts = explode(";base64,", $image);
$data = imagecreatefromstring( $image );
$image_base64 = base64_decode($image_parts[1]);
$sql = "INSERT INTO `vcmessages` (pic)
VALUES ('$image')";
$mysqli->query($sql);
echo"success"

?>