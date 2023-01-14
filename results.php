<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link REL=StyleSheet HREF=last_project.css>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="my_project.js"></script>
</head>
<body>

<div class="analysis"></div>

<div class="panel">
		
		<center>President</center>
	</div>
	<div class="panel_body">
		<?php
		session_start();
		include "db_connection.php";

		$querry=$conn->query("SELECT * FROM candidates WHERE position='president'") or die(mysqli_errno());
		while($fetch = $querry->fetch_array())
		{
			?>
			<div id="presd">
				
				<div id="profile">
					<span><?php echo'<img src="data:image;base64,'.base64_encode($fetch['photo']).'" alt="My profile" style="width:150px; height:120px;">';?></span></div>
					<center> <?php echo $fetch['candidate_name'];?></center>
					<div id="vt"><center> <?php echo "Votes Garnered:  ".$fetch['votes'];?></center></div>

			</div>
			<?php
		}

		?>
		
	</div>

<div class="panel">
		
		<center>Deputy President</center>
	</div>
	<div class="panel_body">
		<?php
		
		include "db_connection.php";

		$querry=$conn->query("SELECT * FROM candidates WHERE position='deputy president'") or die(mysqli_errno());
		while($fetch = $querry->fetch_array())
		{
			?>
			<div id="presd">
				
				<div id="profile">
					<span><?php echo'<img src="data:image;base64,'.base64_encode($fetch['photo']).'" alt="My profile" style="width:150px; height:120px;">';?></span></div>
					<center> <?php echo $fetch['candidate_name'];?></center>
					<div id="vt"><center> <?php echo "Votes Garnered:  ".$fetch['votes'];?></center></div>
					<?php
				$sum_query=$conn->query("SELECT SUM(votes) FROM candidates WHERE position='deputy president'");
				
				?>


			</div>
			<?php
		}

		?>
		
	</div>


<div class="panel">
		
		<center>Minister Finance</center>
	</div>
	<div class="panel_body">
		<?php
		
		include "db_connection.php";

		$querry=$conn->query("SELECT * FROM candidates WHERE position='finance minister'") or die(mysqli_errno());
		while($fetch = $querry->fetch_array())
		{
			?>
			<div id="presd">
				
				<div id="profile">
					<span><?php echo'<img src="data:image;base64,'.base64_encode($fetch['photo']).'" alt="My profile" style="width:150px; height:120px;">';?></span></div>
					<center> <?php echo $fetch['candidate_name'];?></center>
					<div id="vt"><center> <?php echo "Votes Garnered:  ".$fetch['votes'];?></center></div>

			</div>
			<?php
		}

		?>
		
	</div>

<div class="panel">
		
		<center>Minister Education</center>
	</div>
	<div class="panel_body">
		<?php
		
		include "db_connection.php";

		$querry=$conn->query("SELECT * FROM candidates WHERE position='education minister'") or die(mysqli_errno());
		while($fetch = $querry->fetch_array())
		{
			?>
			<div id="presd">
				
				<div id="profile">
					<span><?php echo'<img src="data:image;base64,'.base64_encode($fetch['photo']).'" alt="My profile" style="width:150px; height:120px;">';?></span></div>
					<center> <?php echo $fetch['candidate_name'];?></center>
					<div id="vt"><center> <?php echo "Votes Garnered:  ".$fetch['votes'];?></center></div>

			</div>
			<?php
		}

		?>
		
	</div>


<div class="panel">
		
		<center>Minister Transportt</center>
	</div>
	<div class="panel_body">
		<?php
		
		include "db_connection.php";

		$querry=$conn->query("SELECT * FROM candidates WHERE position='transport minister'") or die(mysqli_errno());
		while($fetch = $querry->fetch_array())
		{
			?>
			<div id="presd">
				
				<div id="profile">
					<span><?php echo'<img src="data:image;base64,'.base64_encode($fetch['photo']).'" alt="My profile" style="width:150px; height:120px;">';?></span></div>
					<center> <?php echo $fetch['candidate_name'];?></center>
					<div id="vt"><center> <?php echo "Votes Garnered:  ".$fetch['votes'];?></center></div>

			</div>
			<?php
		}

		?>
		
	</div>

<div class="panel">
		
		<center>Minister Sports $ Co-curricular</center>
	</div>
	<div class="panel_body">
		<?php
		
		include "db_connection.php";

		$querry=$conn->query("SELECT * FROM candidates WHERE position='sports minister'") or die(mysqli_errno());
		while($fetch = $querry->fetch_array())
		{
			?>
			<div id="presd">
				
				<div id="profile">
					<span><?php echo'<img src="data:image;base64,'.base64_encode($fetch['photo']).'" alt="My profile" style="width:150px; height:120px;">';?></span></div>
					<center> <?php echo $fetch['candidate_name'];?></center>
					<div id="vt"><center> <?php echo "Votes Garnered:  ".$fetch['votes'];?></center></div>

			</div>
			<?php
		}

		?>
		
	</div>

<div class="panel">
		
		<center>Secretary</center>
	</div>
	<div class="panel_body">
		<?php
		
		include "db_connection.php";

		$querry=$conn->query("SELECT * FROM candidates WHERE position='secretary'") or die(mysqli_errno());
		while($fetch = $querry->fetch_array())
		{
			?>
			<div id="presd">
				
				<div id="profile">
					<span><?php echo'<img src="data:image;base64,'.base64_encode($fetch['photo']).'" alt="My profile" style="width:150px; height:120px;">';?></span></div>
					<center> <?php echo $fetch['candidate_name'];?></center>
					<div id="vt"><center> <?php echo "Votes Garnered:  ".$fetch['votes'];?></center></div>

			</div>
			<?php
		}

		?>
		
	</div>



</body>
</html>