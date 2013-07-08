<?php

if(!$_POST) {
	// No file uploaded yet.
	include "form.php";
}
else if ($_POST && $_FILES["file"]["error"] > 0)
{
	// File uploaded with problems.
	echo "Error: " . $_FILES["file"]["error"] . "<br>";
}
else if($_POST && $_FILES["file"]["error"] === 0)
{
	// File uploaded successfully.
	echo "Upload: " . $_FILES["file"]["name"] . "<br>";
	echo "Type: " . $_FILES["file"]["type"] . "<br>";
	echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
	echo "Stored in: " . $_FILES["file"]["tmp_name"];
}

?>

