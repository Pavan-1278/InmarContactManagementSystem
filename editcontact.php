<?php
	$cname=$_POST['cname'];
	$c_phno=$_POST['c_phno'];
	$cemail=$_POST['con_email'];
	$uemail=$_COOKIE['username'];
	$gid=$_POST['g_id'];
	$conn = new mysqli('localhost', 'root', '', 'project');
	// Check connection
	//echo "Hai in database";
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	} 
	$sql = "UPDATE contacts SET name='$cname',phno='$c_phno' where uemail='$uemail' and cemail='$cemail' and grp_id=$gid";
	//echo $grp_id." ".$uemail." ".$cemail."<br>";
	$result = $conn->query($sql);
	if($result==true)
	{
		echo "Edited Successfully";	
	}	
    else
    {
    	echo "Problem With Deletion Please try after some time";	
    }	
?>