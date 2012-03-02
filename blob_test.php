<?php
// Change for your own MySQL connect file.
include('mysqlconnect.php');

// The 4 below variables get the reqired fields from the java applet.
$file_param_name = 'file';
$fileUpload = $_FILES[ $file_param_name ][ 'tmp_name' ];
$fileUpload_size = filesize($fileUpload);
$fileUpload_name = $_FILES[ $file_param_name ][ 'name' ];


// These two lines get the mime type of the image.
// I used this method as mime_content_type() is now deprecated and fileinfo is still buggy.
$info = getimagesize($fileUpload);
$fileUpload_type = image_type_to_mime_type($info[2]);


// The below lines read the content of the image into the variable $fileContent.
$fileHandle = fopen($fileUpload, "r");
$fileContent = fread($fileHandle, $fileUpload_size);
$fileContent = addslashes($fileContent);

// This line grabs the file name out of the original array and puts it into the $strDesc variable.
// This can be changed to whatever you like.
$strDesc = $_FILES[ $file_param_name ][ 'name' ];


// These three lines now put everything into the table.
$dbQuery = "INSERT INTO myBlobs VALUES ";
$dbQuery .= "(0, '$strDesc', '$fileContent', '$fileUpload_type')";
mysql_query($dbQuery) or die("Couldn't add file to database");

?>