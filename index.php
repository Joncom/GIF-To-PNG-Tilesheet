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
	$gifFilePath = $_FILES["file"]["tmp_name"];
	require "extract.php";
}

?>

