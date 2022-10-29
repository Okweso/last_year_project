<!DOCTYPE html>
<html>
<head>
	<title>login page</title>
	<link REL=StyleSheet HREF=last_project.css>
	<script type="text/javascript" src="my_project.js"></script>
</head>
<body>
	<h1 id="heading1">Welcome to the students registration center.</h1>
<?php

session_start();
include 'db_connection.php';
	if ($conn){
		$name=$adm=$sch=$eml=$phone=$date=$passwad="";
		$reg_err="";
		$pass_err="";
		$admissionErr="";
		$emailErr="";
		$registrationErr="";

		if ($_SERVER["REQUEST_METHOD"] == "POST")
		{
			if (empty($_POST["sname"]))
			{
				$reg_err ="this field must be filled";
			}

			else
			{
				$name=$_POST["sname"];
			}
			if (empty($_POST["admission"]))
			{
				$reg_err;
			}
			/*elseif (!preg_match('/^[a-zA-Z0-9]+$/', $_POST["admission"]) and stripos($_POST["admission"], '/') !== false) {
				$admissionErr="admission number can only be letters, numbers and forward slash";
			}*/
			else
			{
				$adm=$_POST["admission"];
			}
			if (empty($_POST["schl"]))
			{
				$reg_err;
			}
			else
			{
				$sch=$_POST["schl"];
			}
			if (empty($_POST["email"]))
			{
				$reg_err;
			}
			elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
				$emailErr="invalid email";
			}
			else
			{
				$eml=$_POST["email"];
			}
			if (empty($_POST["phone_n"])){
				$reg_err;
			}
			else
			{
				$phone=$_POST["phone_n"];
			}
			if (empty($_POST["rdate"]))
			{
				$reg_err;
			}
			else
			{
				$date=$_POST["rdate"];
			}
			if (empty($_POST["pwad"]))
			{
				$pass_err ="*password is required";
			}
			else
			{
				$passwad=$_POST["pwad"];
			}
			$sql="SELECT * FROM student where admission_number=?";
			if ($stmt=mysqli_prepare($conn, $sql))
			{
				mysqli_stmt_bind_param($stmt, 's', $param_admission_number);
				$param_admission_number= $adm;
				if (mysqli_stmt_execute($stmt))
				{
					mysqli_stmt_store_result($stmt);
					if (mysqli_stmt_num_rows($stmt)==1)
					{
						$registrationErr="*admission number already taken";
					}
					else
					{
						$sqli="INSERT INTO student(student_name, admission_number, school, email, phone_number, reg_date, password) VALUES(?,?,?,?,?,?,?)";
						if ($stmt=mysqli_prepare($conn, $sqli)){
							mysqli_stmt_bind_param($stmt, "sssssss", $param_name, $param_admn, $param_school, $param_email, $param_phone, $param_date, $param_password);
							$param_name=$name;
							$param_admn=$adm;
							$param_school=$sch;
							$param_email=$eml;
							$param_phone=$phone;
							$param_date=$date;
							$param_password=password_hash($passwad, PASSWORD_DEFAULT);

							if (mysqli_stmt_execute($stmt)){
								echo '<script type="text/javascript"> alert("You are successfully registered");</script>';
								
							}
							header("Location:login.php");
							else{
								echo '<script type="text/javascript"> alert("Registration not successful");</script>';
							}
						}
					}
				}
			}
		}
		/*$sql="select * from students where admission_number='".$_POST["usern"]."' and password='".$_POST["password"]."'";
		$result=mysqli_query($conn, $sql);
		if (mysqli_fetch_assoc($result)){

			$_SESSION['user']= $_POST['usern'];
			header("Location:vote.html");
		}
		else{
			echo "you are not registered";
		}
		$name="Sabina";
		$adm="BCSIT/00344/2023";
		$sch="School of Computer Science";
		$eml="sabina@gmail.com";
		$phone="07384964899";
		$date="23/4/2022";
		$passwad='123';
		
		$sql="INSERT INTO student(student_name, admission_number, school, email, phone_number, reg_date, password) VALUES(?,?,?,?,?,?,?)";
		if ($stmt=mysqli_prepare($conn, $sql)){
			mysqli_stmt_bind_param($stmt, "sssssss", $param_name, $param_admn, $param_school, $param_email, $param_phone, $param_date, $param_password);
			$param_name=$name;
			$param_admn=$adm;
			$param_school=$sch;
			$param_email=$eml;
			$param_phone=$phone;
			$param_date=$date;
			$param_password=password_hash($passwad, PASSWORD_DEFAULT);

			if (mysqli_stmt_execute($stmt)){
				echo "registration successful";
			}
			else{
				echo "registration not successful";
			}
		}*/
	}
	else{
		echo "not connected";
	}


#update employee set password_hash = sha1(password);
?>

<div id="register">
	<form id= "form3" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<span class="error"><?php echo $registrationErr; ?></span><br><br>
		<label id="lab">NAME</label><br>
		<input id="inp" type="text" name="sname"><br>
		<span class="error"><?php echo $reg_err; ?></span><br>

		<label id="lab">ADMISSION NUMBER</label><br>
		<input id="inp" type="text" name="admission"><br>
		<span class="error"><?php echo $reg_err; ?></span><br>
		

		<label id="lab">SCHOOL</label><br>
		<input id="inp" type="text" name="schl"><br>
		<span class="error"><?php echo $reg_err; ?></span><br>

		<label id="lab">EMAIL</label><br>
		<input id="inp" type="text" name="email"><br>
		<span class="error"><?php echo $reg_err; ?></span><br>
		<span class="error"><?php echo $emailErr; ?></span><br>

		<label id="lab">PHONE NUMBER</label><br>
		<input id="inp" type="text" name="phone_n"><br>
		<span class="error"><?php echo $reg_err; ?></span><br>

		<label id="lab">DATE</label><br>
		<input id="inp" type="date" name="rdate"><br>
		<span class="error"><?php echo $reg_err; ?></span><br>

		<label id="lab">PASSWORD</label><br>
		<input id="inp" type="password" name="pwad"><br>
		<span class="error"><?php echo $pass_err; ?></span><br><br>

		<button type="submit">Register</button>
		

	</form>
	

</div>

</body>
</html>
