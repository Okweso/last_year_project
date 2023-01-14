
<html>
<head>
	<title>
		election candidates
	</title>
	<link REL=StyleSheet HREF=last_project.css>
</head>
<body>
	</form>
		<table id="table_data" width="50%" cellpadding="5" cellspacing="5">
			<thead>
				<tr>
					
					<th>Photo</th>
					<th>Admission Number</th>
					<th>Name</th>
					<th>Position Vying</th>
					
					
				</tr>
			</thead>
			<tbody>
<?php
session_start();
include "db_connection.php";
$query = $conn->query("SELECT * FROM candidates") or die(mysqli_errno());
		while($fetch = $query->fetch_array())
		{
			?>
		
				<tr>
					<td><?php echo'<img src="data:image;base64,'.base64_encode($fetch['photo']).'" alt="My profile" style="width:80px; height:80px;">';?></td>
					<td><?php echo $fetch['admission_num']; ?></td>
					<td><?php echo $fetch['candidate_name']; ?></td>
					<td><?php echo $fetch['position']; ?></td>
					
				</tr>
				<?php
			}
				?>
			</tbody>
		</table>
		
		
	</body>
	</html>