<?php
   	include("connect.php");
   	
   	$link=Connection();

	$scritta=$_POST["scritta"];
   echo $scritta
	/*$hum1=$_POST["hum1"];

	$query = "INSERT INTO `tempLog` (`temperature`, `humidity`) 
		VALUES ('".$temp1."','".$hum1."')"; 
   	
   	mysql_query($query,$link);
	mysql_close($link);

   	header("Location: index.php");*/
?>
