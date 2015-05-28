<?php
include_once ("functionsql.php");
	$conn=connect();
    //echo("ciao");
	$str="SELECT data,hum FROM dati  ORDER BY data desc limit 1";
	$result=mysqli_query($conn,$str)or die("query fallita: " . mysqli_error($conn));
	//echo $result;
	while($row = mysqli_fetch_array($result, MYSQL_ASSOC))
		{
			 $str1[] = array(
	            'data' => $row['data'],
	            'value' =>$row['hum'],);		}
	//header("Content-Type: application/json", true);            
	//header("Content-type: application/json");
    
    //var_dump($str1);
	echo json_encode($str1);
?>