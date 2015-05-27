<?php
    include_once ("functionsql.php");
	$conn=connect();
    $str="SELECT * FROM dati order by data";
    $result=mysqli_query($conn,$str)or die("query fallita: " . mysqli_error($conn));
    while ($row=mysqli_fetch_array($result, MYSQL_ASSOC)) {
    	 $riga[] = array(
	            'data' => $row['data'],
	            'temp' =>$row['temp'],
	            'hum' =>$row['hum']);
    }

    echo json_encode($riga);

?>