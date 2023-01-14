<!DOCTYPE html>
<html>
<head>
	<title>vote submission</title>
	<link REL=StyleSheet HREF=last_project.css>
	<script type="text/javascript" src="my_project.js"></script>
</head>
<body>
<?php

session_start();
include "db_connection.php";
$name=$_SESSION["user"];


$candidate_vote=array("pres_id", "dpres", "fmin", "emin", "tmin", "smin", "sec");
foreach ($candidate_vote as $value){
	#$num=count((array)$_POST[$value]);

		if (isset($_POST[$value])){
			$sql=$conn->query("UPDATE candidates SET votes=votes+1 WHERE candidate_id=$_POST[$value]") or die(mysqli_errno()); 

		}

	
	
}
$qry=$conn->query("UPDATE student SET status=1 WHERE student_name='$name'") or die(mysqli_errno());
#echo $name;
echo '<script type"text/JavaScript">
alert("Thank you for casting your vote")
</script>';
#header("Location:voted_page.php");
echo '<script type"text/JavaScript">
location.replace("voted_page.php")
</script>';

?>

</body>
</html>