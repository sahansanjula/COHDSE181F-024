
<?php
	function setCmm()
{
	$con = mysqli_connect("localhost:3306", "root", "");
	mysqli_select_db($con, "commentApp");

	
	if(isset($_POST['commentSubmit']))
	{
		$name = $_POST["Uname"];
		$cmment = $_POST["commntt"];
		
		$sql ="INSERT INTO comment(name, comment) VALUES('$name', '$cmment')";
		$rst = mysqli_query( $con, $sql);
	}
	
}

function getCmm()
{
	$con = mysqli_connect("localhost:3306", "root", "");
	mysqli_select_db($con, "commentApp");
	
	$sql = "SELECT name, comment FROM comment";
	$rst = mysqli_query($con, $sql);
	while($row = mysqli_fetch_array($rst))
	{
		echo $row['Uname']. "<br/>";
		echo $row['commntt']. "<br/><br/>";
	}
}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head> <title></title>

</head>
<body>
	<?php
	echo "<form name='enterComment' method='post' action='".setCmm()."'>
			<div id='commentBox' >
				<strong>Name</strong> 
					<br/><input type='text' name='name'/><br/><br>
				<strong>Comment</strong> 
					<br/><textarea rows='5' cols='50' name='comment'> </textarea><br/><br/>
				<input type='submit' name='commentSubmit' value='Send your comment'/>
			</div>
		</form>";
	
getCmm();		
?>


</body>	
</html>

