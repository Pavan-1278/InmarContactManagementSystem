<?php
	$owner=$_COOKIE['username'];
	$data1=array();
	$conn = new mysqli('localhost', 'root', '', 'project');	 
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	$sql = "SELECT * FROM group_inf where owner_email='$owner'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) 
	{    
	    while($row = $result->fetch_assoc()) 
	    {
		    array_push($data1,array('group_id'=>$row['group_id'],'group_name'=>$row['group_name']));
		}
	}
	else 
	{
	    echo "0 results";
	}
	echo json_encode($data1);
?>