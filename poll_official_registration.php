<!DOCTYPE html>
<html>
<head>
	<title>login page</title>
	<link REL=StyleSheet HREF=last_project.css>
	<script type="text/javascript" src="my_project.js"></script>
</head>
<body>
	<h1 id="heading1">Welcome to the poll officials registration center.</h1>
<?php

session_start();
include 'db_connection.php';
	if ($conn){
		$oname=$ophone=$oemail=$opasswad="";
		$reg_err="";
		$pass_err="";
		$admissionErr="";
		$emailErr="";
		$registrationErr="";

		if ($_SERVER["REQUEST_METHOD"] == "POST")
		{
			if (empty($_POST["ofname"]))
			{
				$reg_err ="this field must be filled";
			}

			else
			{
				$oname=$_POST["ofname"];
			}
			
			
			if (empty($_POST["ofemail"]))
			{
				$reg_err;
			}
			elseif (!filter_var($_POST["ofemail"], FILTER_VALIDATE_EMAIL)) {
				$emailErr="invalid email";
			}
			else
			{
				$oemail=$_POST["ofemail"];
			}
			if (empty($_POST["ofphone_n"])){
				$reg_err;
			}
			else
			{
				$ophone=$_POST["ofphone_n"];
			}
			
			if (empty($_POST["ofpwad"]))
			{
				$pass_err ="*password is required";
			}
			else
			{
				$opasswad=$_POST["ofpwad"];
			}
			$sql="SELECT * FROM poll_officials where official_email=?";
			if ($stmt=mysqli_prepare($conn, $sql))
			{
				mysqli_stmt_bind_param($stmt, 's', $param_official_email);
				$param_official_email= $oemail;
				if (mysqli_stmt_execute($stmt))
				{
					mysqli_stmt_store_result($stmt);
					if (mysqli_stmt_num_rows($stmt)==1)
					{
						$registrationErr="*email number already taken";
					}
					else
					{
						$sqli="INSERT INTO poll_officials(official_name, official_phone_number, official_email, password) VALUES(?,?,?,?)";
						if ($stmt=mysqli_prepare($conn, $sqli)){
							mysqli_stmt_bind_param($stmt, "ssss", $param_oname, $param_ophone, $param_oemail, $param_opassword);
							$param_oname=$oname;
							$param_ophone=$ophone;
							$param_oemail=$oemail;
							$param_opassword=password_hash($opasswad, PASSWORD_DEFAULT);

							if (mysqli_stmt_execute($stmt)){
								echo '<script type="text/javascript"> alert("You are successfully registered");</script>';
								#header("Location:login.php");
							}
							else{
								echo '<script type="text/javascript"> alert("Registration not successful");</script>';
							}
						}
					}
				}
			}
		}
		
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
		<input id="inp" type="text" name="ofname"><br>
		<span class="error"><?php echo $reg_err; ?></span><br>

		<label id="lab">PHONE NUMBER</label><br>
		<input id="inp" type="text" name="ofphone_n"><br>
		<span class="error"><?php echo $reg_err; ?></span><br>

		<label id="lab">EMAIL</label><br>
		<input id="inp" type="text" name="ofemail"><br>
		<span class="error"><?php echo $reg_err; ?></span><br>
		<span class="error"><?php echo $emailErr; ?></span><br>

		<label id="lab">PASSWORD</label><br>
		<input id="inp" type="password" name="ofpwad"><br>
		<span class="error"><?php echo $pass_err; ?></span><br><br>

		<button type="submit">Register</button>
		

	</form>
	

</div>

</body>
</html>
