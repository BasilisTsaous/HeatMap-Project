<?php

echo "Upload: " . $_FILES["file"]["name"] . "<br>";
echo "Type: " . $_FILES["file"]["type"] . "<br>";
echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

if (file_exists("uploads/".$_FILES["file"]["name"]))
{
	echo $_FILES["file"]["name"] . " already exists. ";
}
else
{
	move_uploaded_file($_FILES["file"]["tmp_name"],"uploads/".$_FILES["file"]["name"]);
    echo "Stored in: uploads/" . $_FILES["file"]["name"];
}

var_dump($_FILES);
  

?> 