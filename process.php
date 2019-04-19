<?php 
include ('connect/connect.php');
 
$process = new Database();
if (isset($_POST['insert_mem'])) {

        //รับข้อมูลจาก FORM ส่งไปที่ Method add_user
		
        $process->add_data($_POST);
    
}
if (isset($_POST['insert_massager'])) {

        //รับข้อมูลจาก FORM ส่งไปที่ Method add_user
		
        $process->add_massager($_POST);

    
    
}


if (isset($_POST['delete_massager_id'])) {
	
		//		echo $_POST['delete_massager_id'];
	  $process->delete_massager($_POST['delete_massager_id']);
}


if (isset($_POST['update_massager_id'])) {
	
				
	  $process->update_massager($_POST);
}


?>