<?php
	$grp_id=$_POST['gid'];
	$uemail=$_COOKIE['username'];
	$cemail=$_POST['con_email'];
	$conn = new mysqli('localhost', 'root', '', 'project');
	// Check connection
	//echo "Hai in database";
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	} 
	$sql = "DELETE from contacts where uemail='$uemail' and cemail='$cemail' and grp_id=$grp_id";
	//echo $grp_id." ".$uemail." ".$cemail."<br>";
	$result = $conn->query($sql);
	if($result==true)
	{
		echo "Deleted Successfully";	
	}	
    else
    {
    	echo "Problem With Deletion Please try after some time";	
    }	
?>