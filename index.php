<?php

include 'db_connection.php';
$nameErr = $passErr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{

	if (empty($_POST["admn_no"]))
	{

		$nameErr = "Please enter your admission number";
	}
	elseif (empty($_POST["psw"]))
	 {

		$passErr = "Please enter your password";
	}
	else
	{

		echo "working now";
	}
}
else
{

	echo 'not working now';
}
#if(isset($_POST['login']))
?>

