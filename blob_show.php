<?php
// This starts the output buffer so that there is no chance of the header kicking up errors later on.
ob_start();

// Add your own MySQL connect here.
include('mysqlconnect.php');

// This selects the blob by id from the table.
// The id is escaped to stop SQL injection.
$SQL = "SELECT * FROM myBlobs WHERE blobId = '".mysql_real_escape_string($_GET['id'])."'";	
$result = mysql_query($SQL) or die(mysql_error());
$row = mysql_fetch_array($result);

// These two variables grab the mime type and blob contents out of the array.
$mime=$row['blobType'];
$data=$row['blobData'];

// These lines create the header so that the image shows properly.
$type = '"Content-type: '.$mime.'"';
header($type);

// This line prints the image.
print $data;
	
// Finally flushing the output buffer sends it all to the screen.	
ob_flush();