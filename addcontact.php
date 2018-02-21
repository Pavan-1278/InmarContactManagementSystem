<?php
$name=$_POST['cname'];
$cemail=$_POST['con_email'];
$phnno=$_POST['c_phno'];
$g_id=$_POST['g_id'];
$uemail=$_COOKIE['username'];
//creating a connection to database
$conn=new mysqli("localhost","root","","project");
//check connection
if($conn->connect_error)
{
 die("Connection failed: ".$conn->error);
}
$sql="INSERT INTO contacts (name, phno,  uemail, cemail, grp_id) VALUES ( '$name', $phnno, '$uemail','$cemail', '$g_id')";
//$query=mysqli_query($conn,$sql);
//executing and checking if the query executed 
if ($conn->query($sql))
{
	echo "Successful";
}
else
{
 echo "Error:" .$sql. "<br>" . $conn->error;
}
mysqli_close($conn);
?>