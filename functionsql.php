<?php
function connect()
{
	$host="127.0.0.1";
	$user="root";
	$pass="";
	$DB="tesina";
	$conn=mysqli_connect($host,$user,$pass) or die("connessione non riuscita: " . mysqli_error($conn));
	mysqli_select_db($conn,$DB) or die("connessione non riuscita: " . mysqli_error($conn));
	
	return $conn;
}

function selectuser($nomeuser)
{
	$str="SELECT * FROM users WHERE nome=\"$nomeuser\"";
	$result=mysqli_query($conn,$str)or die("query fallita: " . mysqli_error($conn));	
	return $result;
}

function selectemp($data)
{
	$str="SELECT data,temp FROM dati  WHERE data>=\"$data\"";
	$result=mysqli_query($str)or die("query fallita: " . mysqli_error($conn));	
	return $result;
}

?>
