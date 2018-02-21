<?php
$g_id=$_POST['g_id'];
$uemail=$_COOKIE['username'];
//creating a connection to database
$conn=new mysqli("localhost","root","","project");
//check connection
if($conn->connect_error)
{
 die("Connection failed: ".$conn->error);
}
echo "connection Successful";
$sql="DELETE from contacts where uemail='$uemail' and grp_id='$g_id' ";
//$query=mysqli_query($conn,$sql);
//executing and checking if the query executed
$sql1="DELETE from group_inf where owner_email='$uemail' and group_id='$g_id'";
$result=$conn->query($sql);
//echo "First querry";
//echo $result;
$result1=$conn->query($sql1);
//echo "Second query";
//echo $result1; 
if ($result1&&$result)
{
    echo "Successful";
}
else
{
 echo "Error:" .$sql. "<br>" . $conn->error;
}
mysqli_close($conn);
?>