<!DOCTYPE html>
<html>
<head>
	<title>login page</title>
	<link REL=StyleSheet HREF=last_project.css>
	<script type="text/javascript" src="my_project.js"></script>
	<style type="text/css">
		.err{
			color: red;
		}
	</style>
</head>
<body>
	<img src="teau logo.png">
	<h1 id="election1">Welcome to The East African University Elections Management System</h1>
	<h2 id="election2">Please Login to use the system</h2>

	<?php

	session_start();
	include 'db_connection.php';

	$namErr= $admissionErr= $passErr="";

	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if (empty($_POST["usern"]) or empty($_POST["password"]))
		{
			$namErr= "*all fields must be filled";
			
		}
		else
		{

			
			if ($conn){
				

				if (empty($namErr))
				{
					/*$password="123";
					$hashed=password_hash($password, PASSWORD_DEFAULT);
					echo password_verify($password, $hashed);
					if (password_verify($password, $hashed)){
						echo "logged in";
					}
					else{
						echo "not logged in";
					}*/
					$sql="SELECT admission_number, student_name, email, password from student where admission_number=?";
					if ($stmt= mysqli_prepare($conn, $sql)){
						mysqli_stmt_bind_param($stmt, "s", $param_admission);
						$param_admission=$_POST["usern"];

						if (mysqli_stmt_execute($stmt)){
							mysqli_stmt_store_result($stmt);

							if (mysqli_stmt_num_rows($stmt) == 1){

								mysqli_stmt_bind_result($stmt, $param_admission, $param_student_name, $student_email, $password);
								if (mysqli_stmt_fetch($stmt)){
									/*echo $param_admission; echo "<br>";
									echo $student_name; echo "<br>";
									echo $password; echo "<br>";
									echo trim($_POST["password"]);*/
									#var_dump(password_verify($_POST["password"], $password));
									if (password_verify($_POST["password"], $password))
									{
										/*$code=uniqid();
										echo $code; 
										echo "<br";
										echo $student_email;*/
										$_SESSION["user"]= $param_student_name;
										#header("Location:vote.php");
										echo $_SESSION["user"];
									}	
									else
									{
										$passErr= "incorrect password";
									}
								}	
								
							}
							else
							{
								$admissionErr = "admission number do not exist in our system";
							}
						}
					}
				}
				else
				{
					echo "something went wrong";
				}
				/*
				https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php

				$sql="select * from students where admission_number='".$_POST["usern"]."' and password='".$_POST["password"]."'";
				$result=mysqli_query($conn, $sql);
				if (mysqli_fetch_assoc($result)){

					$_SESSION['user']= $_POST['usern'];
					header("Location:vote.html");
				}
				else{
					echo "you are not registered";
				}*/
				/*$sql="INSERT INTO students(student_name, admission_number, school, email, phone_number, reg_date, password) VALUES('Kevin Debruyne', 'BCSIT/03444/2021', 'School of Business', 'kevind@gmail.com', '0745636773','23/4/2021', 'deb2021')";
				if($conn->query($sql)===TRUE){
					echo "record added successfully";
				}
				else{
					echo "record not added";
				}*/
			}
			else{
				echo "not connected";
				}
		}
		
	}

	?>

	<div class="container">
		
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			
			<label id="lab">Admission Number</label><br>
			<input id="inp" type="text" name="usern"><br><br>
			<div class="err"> <?php echo $admissionErr; ?></div>
			
			<br><br>
			<label id="lab">Password</label><br>
			<input id="inp" type="password" name="password">
			<br><br>
			<span class="err"><?php echo $namErr; ?></span><br>
			<div class="err"> <?php echo $passErr; ?></div>
			<button type ="submit" id="but">Login</button>

		</form>

	</div>
	

</body>
</html>