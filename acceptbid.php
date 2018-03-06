<?php
include("config.php");

$job_id=$_GET['jid'];					
$dev_id=$_GET['did'];

$sql="UPDATE bidjob set bid_status=1 WHERE job_id='$job_id' AND dev_id='$dev_id'";

if (!mysqli_query($db,$sql))
	{
	die('Error: ' .mysqli_error($db));
 	}
	header("location:client-offer-list.php");

?>