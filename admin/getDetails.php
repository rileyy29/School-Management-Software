<?php 
	include 'include/db.php';

	if(isset($_POST['data']) && !empty($_POST['data']))
	{
		$id = $_POST['data'];
		$query = "SELECT * FROM students WHERE studId = :id";
		$stmt = $connect->prepare($query);
		$stmt->bindParam(":id",$id,PDO::PARAM_INT);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		foreach($result as $row)
		{
			echo '
                <tr>  
                     <td width="30%"><label>Name</label></td>  
                     <td width="100%">'.$row["name"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Class</label></td>  
                     <td width="50%">'.$row["class"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Roll No.</label></td>  
                     <td width="70%">'.$row["rollNo"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Age</label></td>  
                     <td width="70%">'.$row["age"].'</td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Phone No</label></td>  
                     <td width="70%">'.$row["phoneNo"].'</td>  
                </tr>    
                <tr>  
                     <td width="50%"><label>Gender</label></td>  
                     <td width="70%">'.$row["gender"].'</td>  
                </tr> 
                <tr>  
                     <td width="30%"><label>Address</label></td>  
                     <td width="70%">'.$row["address"].'</td>  
                </tr> ';
		}
	}
	else
	{
		echo "Wrong";
	}
?>