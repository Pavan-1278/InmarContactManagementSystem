<?php
        $owner_email=$_POST['owner_email'];
        $group_id=$_POST['gid'];
        //$group_name=$_POST['gname'];

		$data1=array();
		$conn = new mysqli('localhost', 'root', '', 'project');
		 
		 if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		 } 

		 $sql = "SELECT * FROM contacts where uemail='$owner_email' and grp_id='$group_id'";
		 $result = $conn->query($sql);
		 if ($result->num_rows > 0) 
		 {
		    
		    while($row = $result->fetch_assoc()) {
		        array_push($data1,array('name'=>$row['name'],'phno'=>$row['phno'], 'uemail'=>$row['uemail'], 'cemail'=>$row['cemail'], 'g_id'=>$row['grp_id']));
		    }
		 } else 
		 {
		    echo "0 results";
		 }
		 echo json_encode($data1);

?>