
<?php
class Database {
 
       private $host = 'localhost'; //ชื่อ Host 
       private $user = 'root'; //ชื่อผู้ใช้งาน ฐานข้อมูล
       private $password = ''; // password สำหรับเข้าจัดการฐานข้อมูล
       private $database = 'bpit_massage'; //ชื่อ ฐานข้อมูล
 
    //function เชื่อมต่อฐานข้อมูล
    protected function connect(){
        
        $mysqli = new mysqli($this->host,$this->user,$this->password,$this->database);
            
            $mysqli->set_charset("utf8");
 
            if ($mysqli->connect_error) {
 
                die('Connect Error: ' . $mysqli->connect_error);
            }
 
        return $mysqli;
    }

      public function get_while_data($sql){
        
        $db = $this->connect();
        $get_user = $db->query("$sql");
        
        while($user = $get_user->fetch_assoc()){
            $result[] = $user;
        }
        
        if(!empty($result)){
            
            return $result;
        }
    }

     public function add_data($data){
        
        $db = $this->connect();
       
        $add_user = $db->prepare("INSERT INTO `bpit_massage`.`member`(`prefix_id`, `gender_id`, `status_id`, `salary_id`, `f_name`, `l_name`, `n_name`, `date_birth`, `job`, `tel`, `line`, `facebook`, `instagram`)
             VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
        
        $add_user->bind_param("iiiisssssssss",$data['insert_mem'],$data['gender'],$data['status'],$data['salary'],$data['f_name'],$data['l_name'],$data['n_name'],$data['birth'],
            $data['job'],$data['tel'],$data['line'],$data['facebook'],$data['instagram']);
        
         $add_user->execute();

         $add_user=$db->prepare("INSERT INTO `bpit_massage`.`address`(`m_id`, `adress`, `amphur`, `district`, `province`, `zipcode`) VALUES (LAST_INSERT_ID(), ?,?,?,?,?)");

        $add_user->bind_param("sssss",$data['address'],$data['area'],$data['district'],$data['province'],$data['zip']); 
         if(!$add_user->execute()){
            
            echo $db->error;
            
        }else{
            
            echo "บันทึกข้อมูลเรียบร้อย";
        }
            
     
    }
public function add_massager($data){

         $var = $data['start'];
         $date = str_replace('/', '-', $var);
         $start = date('Y-m-d', strtotime($date));
            
         $var1 = $data['birth'];
         $date1 = str_replace('/', '-', $var1);
         $birth = date('Y-m-d', strtotime($date1));       
        $db = $this->connect();
        
        $add_user = $db->prepare("INSERT INTO `bpit_massage`.`massager`(`prefix_id`,`f_name`, `l_name`, `n_name`, `date_birth`, `date_start`, `line`, `facebook`, `instagram`, `location_id`, `tel`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
        $add_user->bind_param("issssssssis",$data['insert_massager'],$data['f_name'],$data['l_name'],
            $data['n_name'],$birth,$start,$data['line'],$data['facebook'],
            $data['instagram'],$data['location_id'],$data['tel']);

        $add_user->execute();

        $add_user = $db->prepare("INSERT INTO `bpit_massage`.`rate`(`massager_id`, `thai_massage`, `foot_massage`, `oil_massage`, `neck_massage`) VALUES (LAST_INSERT_ID(), ?, ?, ?, ?)");
         $add_user->bind_param("ssss",$data['thai_massage'],$data['foot_massage'],$data['oil_massage'],
            $data['neck_massage']);
        
        if(!$add_user->execute()){
            
            echo $db->error;
            
        }else{
            
            echo "บันทึกข้อมูลเรียบร้อย";
        }
    }


public function update_massager($data){

         $var = $data['start'];
         $date = str_replace('/', '-', $var);
         $start = date('Y-m-d', strtotime($date));
            
         $var1 = $data['birth'];
         $date1 = str_replace('/', '-', $var1);
         $birth = date('Y-m-d', strtotime($date1));       
        
        $db = $this->connect();
        
        $add_user = $db->prepare("UPDATE `bpit_massage`.`massager` SET `prefix_id` = ?, `f_name` = ?, `l_name` = ?, `n_name` = ?, `date_birth` = ?, `date_start` = ?, `line` = ?, `facebook` = ?, `instagram` = ?, 
            `location_id` = ?, `tel` = ? WHERE `massager_id` = ?");      
        $add_user->bind_param("issssssssisi",$data['prefix_id'],$data['f_name'],$data['l_name'],
            $data['n_name'],$birth,$start,$data['line'],$data['facebook'],
            $data['instagram'],$data['location_id'],$data['tel'],$data['update_massager_id']);
         $add_user->execute();

        $add_user = $db->prepare("UPDATE `bpit_massage`.`rate` SET `thai_massage` = ?,`foot_massage` = ?, `oil_massage` = ?, `neck_massage` = ? WHERE `massager_id` = ?");

        $add_user->bind_param("ssssi",$data['thai_massage'],$data['foot_massage'],$data['oil_massage'],
            $data['neck_massage'],$data['update_massager_id']);

        
        if(!$add_user->execute()){
            
            echo $db->error;
            
        }else{
            
            echo "บันทึกข้อมูลเรียบร้อย";
        }
    }
       


 public function delete_massager($id){
        
        $db = $this->connect();
        
        $del_user = $db->prepare("DELETE massager,rate FROM massager
        INNER JOIN rate ON massager.massager_id = rate.massager_id
        WHERE massager.massager_id = ?");
        
        $del_user->bind_param("i",$id);
        
        if(!$del_user->execute()){
            
            echo $db->error;
            
        }else{
            
            echo "ลบข้อมูลเรียบร้อย";
        }
    }


}
?>