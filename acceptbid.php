<?php
include("config.php");

$job_id=$_GET['jid'];					
$dev_id=$_GET['did'];


if (!mysqli_query($db,$sql))
	{
	die('Error: ' .mysqli_error($db));
 	}
	header("location:client-offer-list.php");

?>