<?php
include_once ("functionsql.php");
	$conn=connect();
    
	//$data  = date("d m y", time()-60*60*24*5);
    //echo($data);
    //var_dump($data);
	$str="SELECT data,temp FROM dati  WHERE data>=CURDATE()-5 order by data";
	$result=mysqli_query($conn,$str)or die("query fallita: " . mysqli_error($conn));
	while($row = mysqli_fetch_array($result, MYSQL_ASSOC))
		{
			 $str1[] = array(
	            'data' => $row['data'],
	            'value' =>$row['temp'],);		}
	
	echo json_encode($str1);
    

?>
