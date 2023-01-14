<!DOCTYPE html>
<html>
<head>
	<title>voting page</title>
	<link REL=StyleSheet HREF=last_project.css>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="my_project.js"></script>

	<style type="text/css">
		
		input#check{
	width: 80px;
	height: 50px;
	color: blue;
	}
	button#submit{
		position: relative;
		left: 380px;
	}


	</style>
</head>
<body>

	<div class="sidebar">
		<a href="details.php">Voting Page</a>
		<a href="results.php">Election results</a>
	</div>
	<?php
	session_start();
	include "db_connection.php";


	?>
	<div class="display_time">
		<h1>Elections starts on <?php echo $_SESSION["date"]." at ". $_SESSION["time"];?></h1>
		<h2>Remaining <?php echo round($_SESSION["days"],0)." days ".round($_SESSION["hrs"],0)." hours ".round($_SESSION["mins"],0)." minutes ".$_SESSION["secs"]." seconds";?></h2>
		
	</div>
	<form id='sub'  onsubmit='Confirmation()' method='post'>

	<div class="panel">
		
		<center>President</center>
	</div>
	<div class="panel_body">
		<?php
		

		$querry=$conn->query("SELECT * FROM candidates WHERE position='president'") or die(mysqli_errno());
		while($fetch = $querry->fetch_array())
		{
			?>
			<div id="presd">
				
				<div id="profile">
					<span><?php echo'<img src="data:image;base64,'.base64_encode($fetch['photo']).'" alt="My profile" style="width:150px; height:120px;">';?></span></div>
					<center> <?php echo $fetch['candidate_name'];?></center>
					<center><input id="check" type="checkbox" onchange="cbChange(this)" name="pres_id"  class="pres" value="<?php echo $fetch['candidate_id']; ?>">Vote</center>

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
					<center><?php echo $fetch['candidate_name'];?></center>
					<center><input id="check" type="checkbox" onchange="cbChangedp(this)" name="dpres" class="dpres" value="<?php echo $fetch['candidate_id']; ?>">Vote</center>

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
					<center><?php echo $fetch['candidate_name'];?></center>
					<center><input id="check" type="checkbox" onchange="cbChangefm(this)" name="fmin" class="fin_min" value="<?php echo $fetch['candidate_id']; ?>">Vote</center>

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
					<center><?php echo $fetch['candidate_name'];?></center>
					<center><input id="check" type="checkbox" onchange="cbChangeem(this)" name="emin" class="edu_min" value="<?php echo $fetch['candidate_id']; ?>">Vote</center>

			</div>
			<?php
		}

		?>
	</div>




<div class="panel">
	<center>Minister Transport</center>
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
					<center><?php echo $fetch['candidate_name'];?></center>
					<center><input id="check" type="checkbox" onchange="cbChangetm(this)" name="tmin" class="trans_min" value="<?php echo $fetch['candidate_id']; ?>">Vote</center>

			</div>
			<?php
		}

		?>
	</div>




<div class="panel">
	<center>Minister Sports & Co-Curricular</center>
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
					<center><?php echo $fetch['candidate_name'];?></center>
					<center><input id="check" type="checkbox" onchange="cbChangesm(this)" name="smin" class="sprt_min" value="<?php echo $fetch['candidate_id']; ?>">Vote</center>

			</div>
			<?php
		}

		?>
	</div>





<div class="panel">
	<center>Guild Secretary</center>
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
					<center><?php echo $fetch['candidate_name'];?></center>
					<center><input id="check" type="checkbox" onchange="cbChangesec(this)" name="sec" class="sec" value="<?php echo $fetch['candidate_id']; ?>">Vote</center>

			</div>
			<?php
		}

		?>

		 <div id="confirm">
         <div class="message"></div>
         <button class="yes">Yes</button>
         <button class="no">No</button>
      </div>
		<button type='submit' id='submit'>Submit</button>

     
	</div>
</form>

	

	







	<<script type="text/javascript">
		
		$(document).ready(function({
			$(".pres").on("change", function(){
				if($(".pres:checked").length==1)
				{
					$(".pres").attr("disabled", "disabled");
					$(".pres:checked").removeAttr("disabled");
				}
				else
				{
					$(".pres").removeAttr("disabled");
				}
			});
		}));
	</script>
	
		
	

	<?php

	/*if(isset($_POST["submit"]))
		{
			?>
			<script type="text/javascript">

			$(document).ready(function()
			{
				$(".pres").on("change", function()
				{
					if($(".pres:checked").length ==1)
				{
					$(".pres").attr("disabled", "disabled");
					$(".pres:checked").removeAttr("disabled");
				}
				else
				{
					$(".pres").removeAttr("disabled");
				}
				});
			});

		<?php
		}*/
		?>
	

</body>
</html>

https://www.howtocodeschool.com/2021/09/count-checked-checkboxes-of-specific-form-with-javascript.html