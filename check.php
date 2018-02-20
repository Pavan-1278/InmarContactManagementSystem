<?php
$servername="localhost";
$user="root";
$pass="";
$db="test";
$conn=mysqli_connect($servername,$user,$pass,$db);
if(!$conn)
{
  die("Connection failed:" .mysqli_connect_error()); 
}
   $username=$_POST['t1'];
   $password=$_POST['t2'];
   $rememberme=$_POST['rememberme'];
  if (isset($_POST['t1']) && isset($_POST['t2']))
  {
   $sql="select * from login where username='$username' and password='$password'";
   $query=mysqli_query($conn, $sql);
   $rows=mysqli_num_rows($query);
   if($rows==1)
   {
    if (isset($_POST['rememberme']))
    {
    //echo "<script>alert('setting cookie');</script>";
       setcookie("test","x", time() + (86400 * 365), "/");
       setcookie("username",$username, time() + (86400 * 365), "/");
       //setcookie(name)
       echo "<h1>This is fine</h1>";
      
      // echo "<script>alert('giving login again');</script>";
       header("Location:index.php");
     }
     else
     {
       setcookie("test","x", time() + (86400 * 1), "/");
       setcookie("username",$username, time() + (86400 * 1), "/");     }
     header("Location:index.php");
   }
   else
   {
    //echo "<script>alert('giving login again');</script>";
   	    header("Location:login2.html");
   }
 }
   //mysqli_close($conn);
?>