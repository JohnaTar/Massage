<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname ="bpit_massage";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['info'])) {

		$sql ="SELECT cost.cost_id,cost.cost_name,cost.hour
			   FROM cost WHERE cost.cost_id = ".$_POST['info'][3]."";
		$res =mysqli_query($conn,$sql);

		$row =mysqli_fetch_array($res,MYSQLI_ASSOC);

		$time_start = $_POST['info'][1];

		$time_end =  date('H:i', strtotime($time_start.'+'.$row['hour'].' hour')); // syntax OK;

	  	 $var = $_POST['info'][0];
         $date = str_replace('/', '-', $var);
         $date_start = date('Y-m-d', strtotime($date));
         $data ="12:00";
            
	$sql ='SELECT
record.record_id,
record.date,
record.time_start,
record.time_end,
record.m_id,
record.massager_id,
record.cost_id,
record.table_id
FROM
record
WHERE record.date ="'.$date_start.'"
AND record.massager_id="'.$_POST['info'][2].'"
AND  ("'.$time_start.'" BETWEEN record.time_start AND record.time_end OR  "'.$time_end.'" BETWEEN record.time_start AND record.time_end)
	AND (record.time_start BETWEEN "'.$time_start.'" AND "'.$time_end.'" OR record.time_end BETWEEN "'.$time_start.'" AND "'.$time_end.'" )

';
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result) == 0){
	echo "true,<span style='color:green'>		</span>";
}
else{ 
	echo "false,<span style='color:red'>หมอนวดกำลังนวด</span>";
}
}

if (isset($_POST['info2'])) {

	  	 $var = $_POST['info2'][0];
         $date = str_replace('/', '-', $var);
         $date_start = date('Y-m-d', strtotime($date));
            
	$sql ='SELECT
record.record_id,
record.date,
record.time_start,
record.time_end,
record.m_id,
record.massager_id,
record.cost_id,
record.table_id
FROM
record
WHERE record.date ="'.$date_start.'"
AND "'.$_POST['info'][1].'" BETWEEN record.time_start AND record.time_end
OR  "'.$_POST['info'][3].'" BETWEEN record.time_start AND record.time_end
OR record.time_start BETWEEN "'.$_POST['info'][1].'" AND "'.$_POST['info'][3].'"
OR record.time_end BETWEEN "'.$_POST['info'][1].'" 
	AND "'.$_POST['info'][3].'"
AND record.table_id="'.$_POST['info2'][2].'"';
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result) == 0){
	echo "true,<span style='color:green'>		</span>";
}
else{ 
	echo "false,<span style='color:red'>เตียงไม่ว่าง</span>";
}
}

if (isset($_POST['info3'])) {

	  	 $var = $_POST['info3'][0];
         $date = str_replace('/', '-', $var);
         $date_start = date('Y-m-d', strtotime($date));
            
	$sql ='SELECT
record.record_id,
record.date,
record.time_start,
record.time_end,
record.m_id,
record.massager_id,
record.cost_id,
record.table_id
FROM
record
WHERE record.date ="'.$date_start.'"
AND "'.$_POST['info'][1].'" BETWEEN record.time_start AND record.time_end
OR  "'.$_POST['info'][3].'" BETWEEN record.time_start AND record.time_end
OR record.time_start BETWEEN "'.$_POST['info'][1].'" AND "'.$_POST['info'][3].'"
OR record.time_end BETWEEN "'.$_POST['info'][1].'" 
	AND "'.$_POST['info'][3].'"AND record.m_id="'.$_POST['info3'][2].'"';
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result) == 0){
	echo "true,<span style='color:green'>		</span>";
}
else{ 
	echo "false,<span style='color:red'>ลูกค้ากำลังนวด</span>";
}
}


?>