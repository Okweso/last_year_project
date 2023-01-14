<!DOCTYPE html>
<html>
<head>
	<title>
		elections management page
	</title>
	<link REL=StyleSheet HREF=last_project.css>
</head>
<body>
	<div class="sidebar">
		<a href="details.php">Election details</a>
		<a href="posts.php">Posts</a>
		<a href="view_candidates.php">Cadidates</a>
		<a href="results.php">Election results</a>
	</div>
	<div class="content">

		<?php
		session_start();
		include "db_connection.php";
		$use=$_SESSION["user"];
		
		
		echo "<h1>Welcome $use to TEAU 2022 elections management page. You are an admin</h1>";

		
		if ($conn){

			$candid_name=$candid_photo=$candid_school=$candid_pos=$candid_gender=$candid_year=$candid_admission="";
			$submt_err="";
			$registerErr="";
			$imageFileType="";
			$extension_array=array();
			
			
			
			$name="";
		
			if (isset($_POST["submit"]))
			{
				if (empty($_POST["cand_admission"])|| empty($_POST["cand_name"]) || empty($_POST["cand_school"]) || empty($_POST["cand_pos"]) || empty($_POST["gender"]) || empty($_POST["cand_year"]))
				{
					$submt_err="all fields must be filled";
				}

				else
				{
					
					$candid_admission=$_POST["cand_admission"];
					$candid_name=$_POST["cand_name"];
					$candid_school=$_POST["cand_school"];
					$candid_photo=addslashes(file_get_contents($_FILES["cand_image"]["tmp_name"]));
					$candid_pos=$_POST["cand_pos"];
					$candid_gender=$_POST["gender"];
					$candid_year=$_POST["cand_year"];
				}
				
				$sql="SELECT * FROM candidates where admission_num=?";
				if ($stmt=mysqli_prepare($conn, $sql))
				{
					mysqli_stmt_bind_param($stmt, 's', $param_admission_num);
					$param_admission_num= $candid_admission;
					if (mysqli_stmt_execute($stmt))
					{
						mysqli_stmt_store_result($stmt);
						if (mysqli_stmt_num_rows($stmt)==1)
						{
							$registerErr="*the admission number is already registered";
						}
						else
						{
							
								$sqry="INSERT INTO candidates(candidate_name, school, photo, position, gender, year_of_study, admission_num)VALUES('$candid_name', '$candid_school', '$candid_photo', '$candid_pos', '$candid_gender', '$candid_year', '$candid_admission')";
								$run_query= mysqli_query($conn, $sqry);
								if ($run_query)
								{
									echo "registered successfully";
								}
								else
								{
									echo "registration not successful";
								}

								/*$sqli="INSERT INTO candidates(candidate_name, school, photo, position, gender, year_of_study,admission_num) VALUES(?,?,?,?,?,?,?)";
							if ($stmt=mysqli_prepare($conn, $sqli)){
								mysqli_stmt_bind_param($stmt, "sssssss", $param_cname, $param_cschool, $param_cphoto, $param_cposition, $param_cgender, $param_cyear, $param_cadmission);
								
								$param_cname=$candid_name;
								$param_cschool=$candid_school;
								$param_cphoto=$candid_photo;
								$param_cposition=$candid_pos;
								$param_cgender=$candid_gender;
								$param_cyear=$candid_year;
								$param_cadmission=$candid_admission;

								if (mysqli_stmt_execute($stmt)){
									echo "registration successful";
								}
								else{
									echo "registration not successful";
									
								}*/
							
						
							
							

							
						}
					}
				}
		}
		
	}
	else{
		echo "not connected";
	}

	$start_date=$start_time=$end_date=$end_time="";
	if (isset($_POST["btn"])){
		$start_date=$_POST["sdate"];
		$start_time=$_POST["stime"];
		$end_date=$_POST["edate"];
		$end_time=$_POST["etime"];
		#$conn->query("INSERT INTO vote_time(start_date, start_time, end_date, end_time) VALUES($start_date, $start_time, $end_date, $end_time)");
		$conn->query("UPDATE vote_time SET start_date=$start_date") or die(mysqli_errno());
		$conn->query("UPDATE vote_time SET start_time='$start_time'") or die(mysqli_errno());
		$conn->query("UPDATE vote_time SET end_date=$end_date") or die(mysqli_errno());
		$conn->query("UPDATE vote_time SET end_time='$end_time'") or die(mysqli_errno());

	}
		/*$start_date=$_POST["sdate"];
		$start_time=$_POST["stime"];
		echo $start_date." ".$start_time.":00";echo"<br>";
		$sdtime=$start_date." ".$start_time.":00";
		$datenow=date("y-m-d h:i:s");
		echo $datenow;echo"<br>";
		echo strtotime($datenow);echo"<br>";
		echo strtotime($sdtime);echo"<br>";
		$diff=strtotime($sdtime)-strtotime($datenow);
		$days= $diff/86400;echo"<br>";
		$hrs= (fmod($diff, 86400))/3600;
		$mins= fmod(fmod($diff, 86400),3600)/60;echo "<br>";
		$secs= fmod(fmod(fmod($diff, 86400),3600), 60);
	}
	else{
		$start_date="2023-01-23";
		$start_time="08:00:00";
		$sdtime=$start_date." ".$start_time.":00";
		$datenow=date("y-m-d h:i:s");
		$diff=strtotime($sdtime)-strtotime($datenow);
		$days= $diff/86400;echo"<br>";
		$hrs= ((fmod($diff, 86400))/3600)+2;
		$mins= fmod(fmod($diff, 86400),3600)/60;echo "<br>";
		$secs= fmod(fmod(fmod($diff, 86400),3600), 60);
		echo $datenow;echo"<br>";
		echo strtotime($datenow);echo"<br>";
		echo strtotime($sdtime);echo"<br>";
	}

	$_SESSION["date"]=$start_date;
	$_SESSION["time"]=$start_time;
	$_SESSION["cdate"]=$datenow;
	$_SESSION["days"]=$days;
	$_SESSION["hrs"]=$hrs;
	$_SESSION["mins"]=$mins;
	$_SESSION["secs"]=$secs;
	echo $_SESSION["date"];
	echo $_SESSION["secs"];*/

		?>
		<div class="display_time">

			<h1>Elections starts on <?php echo $start_date." at ". $start_time;?></h1>
			<h2>Remaining <?php echo round($days,0)." days ".round($hrs,0)." hours ".round($mins,0)." minutes ".$secs." seconds";?></h2>
			
		</div>
		<div>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="candidate_reg" enctype="multipart/form-data">
				<div id="form_cont">
				<span class="error"><?php echo $registerErr; ?></span><br>
				<span class="error"><?php echo $submt_err; ?></span><br>
				<label>Admission Number</label><br>
				<input type="text" name="cand_admission"><br>
				
				</div>
				<div id="form_cont">
				<label>Candidate Name</label><br>
				<input type="text" name="cand_name"><br>
				
				</div>
				<div id="form_cont">
				<label>School</label><br>
				<input type="text" name="cand_school"><br>
				
				</div>
				<div id="form_cont">
				<label>Candidate Photo</label><br>
				<input type="file" name="cand_image" ><br>
				
				</div>
				<div id="form_cont">
				<label>Position</label><br>
				<select name="cand_pos" id="gen">
					<option value="president">president</option>
					<option value="deputy president">deputy president</option>
					<option value="finance minister">finance minister</option>
					<option value="education minister">education minister</option>
					<option value="transport minister">transport minister</option>
					<option value="sports minister">sports minister</option>
					<option value="secretary">secretary</option>
				</select><br>
				
				</div>
				<div id="form_cont">
				<label for="gen">Gender</label><br>
				<select name="gender" id="gen">
					<option value="male">Male</option>
					<option value="female">Female</option>
				</select><br>
				</div>
				<div id="form_cont">
				<label>Year of Study</label><br>
				<input type="number" name="cand_year"><br>
				
				</div>
				<div id="form_cont">
				<button type="submit" name="submit" value="Upload Image/Data">Submit</button>
				</div>
			</form>
			<!--<form action="#">
		      <label for="lang">Language</label>
		      <select name="languages" id="lang">
		        <option value="javascript">JavaScript</option>
		        <option value="php">PHP</option>
		        <option value="java">Java</option>
		        <option value="golang">Golang</option>
		        <option value="python">Python</option>
		        <option value="c#">C#</option>
		        <option value="C++">C++</option>
		        <option value="erlang">Erlang</option>
		      </select>
		      <input type="submit" value="Submit" />
			</form>-->
		</div>

	</div>

	<form id="candidate_reg" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="candidate_reg" enctype="multipart/form-data" method="post">
		<div id="lab">
	<label >Set election date and time</label>
	</div>	
	<label>Starting date</label><br>
	<input type="date" name="sdate"><br>
	<label>Starting time</label><br>
	<input type="time" name="stime"><br>
	<label>Ending date</label><br>
	<input type="date" name="edate"><br>
	<label>Ending time</label><br>
	<input type="time" name="etime"><br>
	<button name="btn">Set</button>
</form>

</body>
</html>