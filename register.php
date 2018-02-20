<?php
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$uemail=$_POST['email'];
$password=$_POST['password'];
$gender=$_POST['gender'];
$aadhar=$_POST['aadhar'];
$phnno=$_POST['phnno'];
$city=$_POST['city'];
//creating a connection to database
$conn=new mysqli("localhost","root","","project");
//check connection
if($conn->connect_error)
{
 die("Connection failed: ".$conn->error);
}
$sql="INSERT INTO login (fname, lname, uemail, password, gender, aadhar, phnno, city) VALUES ( '$fname', '$lname', '$uemail', '$password', '$gender', '$aadhar', '$phnno', '$city')";
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