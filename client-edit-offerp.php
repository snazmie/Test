<?php
	include("config.php");
	session_start();

 	if($_SERVER["REQUEST_METHOD"] == "POST") {
       //username and password sent from form 

 	$jname=$_POST['jobname'];
 	$jdes=$_POST['jobd'];
 	$jcat=$_POST['jobcat'];
 	$jprice=$_POST['rate'];
 	//$c_name = $_SESSION['c_name'];
 	$jid =$_POST['jid'];

	//$sql0 = "SELECT client_id FROM client WHERE client_fname ='$c_name' ";

	//$query = mysqli_query($db,$sql0) or die("Error: " .mysqli_error($db));

	//$row = mysqli_fetch_array($query,MYSQLI_ASSOC);

	//$c_id = $row['client_id'];

	
	$sql = "UPDATE job SET job_name='$jname', job_des='$jdes', job_category='$jcat', job_price='$jprice' WHERE job_id = '$jid'  ";

	$result = mysqli_query($db,$sql) or die("Error: " .mysqli_error($db));

	header('location: client-offer-list.php');
	}
?>