<!DOCTYPE html>
<html lang="en">

<?php include ('sector/head.php'); 

if (isset($_GET['ID'])) {

    $massager_id =$_GET['ID'];
  
}else{

   echo '<script>window.location.href = "massager";</script>';
}

?>

<script>
  function update_massager_data(){
    $.ajax({
        type:"POST",
        url:"process.php",
        data:$("#update_massager_data").serialize(),
        success:function(data){
            
            //close modal
          
            
            //show result
            alert(data);
            
            //reload page
             location.replace('massager');
        }
    });
    return false;
}


$( function() {
     $( "#datepicker" ).datepicker({ dateFormat: 'dd/mm/yy' });
     $( "#datepicker2" ).datepicker({ dateFormat: 'dd/mm/yy' });
  });



</script>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

  
      <?php include ('sector/nav.php');
            include ('connect/connect.php') ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
             <h1 class="h3 mb-2 text-gray-800">แก้ไขข้อมูลหมอนวด</h1> 

           
             <hr>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
              <form class="form-horizontal" id="update_massager_data" onsubmit="return update_massager_data();">
                    <?php 
                      $db = new Database();
                      $sql ="SELECT prefix.prefix_name,massager.massager_id,massager.f_name,
                                    massager.l_name,massager.n_name,massager.date_birth,
                                    massager.date_start,massager.line,massager.facebook,
                                    massager.instagram,location.location_name,massager.tel,
                                    rate.thai_massage,rate.foot_massage,rate.oil_massage,
                                    rate.neck_massage,massager.prefix_id,massager.location_id
                             FROM massager
                            INNER JOIN prefix ON massager.prefix_id = prefix.prefix_id
                            INNER JOIN location ON massager.location_id = location.location_id
                            INNER JOIN rate ON massager.massager_id = rate.massager_id
                            WHERE massager.massager_id ='".$massager_id."'";
                        $get_data = $db->get_while_data($sql);
                        
                          if(!empty($get_data)){
                  foreach($get_data as $row){
                      $var = $row['date_birth'];
                      $birth = date("d-m-Y", strtotime($var));
                      $var2 = $row ['date_start'];
                      $start = date("d-m-Y", strtotime($var2));
    
                                      echo '  

                            <input type="hidden" value="'.$massager_id.'" name ="update_massager_id" />
                      <div class="row">
                        <div class="col-md-2">
                        <div class="md-form">
                            <label for="name" >คำนำหน้า</label>
                           <select  name="prefix_id" class="form-control input-md" required="">';
                        

                                 $db = new Database();
                                 $sql ='SELECT prefix.prefix_id,prefix.prefix_name
                                        FROM prefix';
                                 $get_prefix = $db->get_while_data($sql);
                                 if(!empty($get_prefix)){
                                        foreach($get_prefix as $prefix){
                                        echo ' <option value="'.$prefix['prefix_id'].'"';

                                        if($row["prefix_id"] == $prefix["prefix_id"]) {
                                          echo "selected";                                        
                                        }

                                        echo '>'.$prefix['prefix_name'].'</option>';
                                        }
                                }
                            
                

                
                    echo '
                            </select>                
                        </div>
                    </div>';
                    echo '
                    <!--Grid column-->
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="name" >ชื่อ</label>
                            <input type="text" required="" autocomplete="off" name="f_name" class="form-control" value="'.$row['f_name'].'">
                
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-4">
                        <div class="md-form">
                          <label for="email" >นามสกุล</label>
                            <input type="text" required="" autocomplete="off" name="l_name" class="form-control" value="'.$row['l_name'].'">
                        
                        </div>
                    </div>
                    <!--Grid column-->

                </div>

                  <div class="row">                  
                   <!--Grid column-->
                    
                    <div class="col-md-3">
                        <div class="md-form">
                            <label for="name" >ชื่อเล่น</label>
                            <input type="text" required="" autocomplete="off" name="n_name" class="form-control" value="'.$row['n_name'].'">
                
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form">
                            <label for="name" >เบอร์โทรศัพท์</label>
                            <input type="text" autocomplete="off" name="tel" class="form-control"
                            value="'.$row['tel'].'">
                
                        </div>
                    </div>
                     <div class="col-md-3">
                        <div class="md-form">
                            <label for="name" >วันเกิด</label>
                            <input type="text" autocomplete="off" required="" name="birth" class="form-control" value="'.$birth.'" id="datepicker">
                
                        </div>
                    </div>
                    
                  </div>
                    <div class="row">                  
                   <!--Grid column-->
                  
                   

                    <div class="col-md-3">
                        <div class="md-form">
                            <label for="name" >วันเริ่มงาน</label>
                            <input type="text" autocomplete="off" required="" name="start" class="form-control" value="'.$start.'" id="datepicker2">
                
                        </div>
                    </div>                   
                    
                </div>

                <div class="row">                  
                   <!--Grid column-->
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="name" >FACEBOOK</label>
                            <input type="text" autocomplete="off"  name="facebook" class="form-control"
                            value="'.$row['facebook'].'">
                
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="name" >LINE</label>
                            <input type="text" autocomplete="off"  name="line" class="form-control"
                            value="'.$row['line'].'">
                
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="name" >INSTAGRAM</label>
                            <input type="text" autocomplete="off"  name="instagram" class="form-control"
                            value="'.$row['instagram'].'">
                
                        </div>
                    </div>
                   
                    
                    
                </div>';

              echo '

              <div class="row">                  
                   <!--Grid column-->
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="name" >สาขา</label>
                           <select  name="location_id" class="form-control input-md" required="">';
                           
                            
                               
                                 $db = new Database();
                                 $sql ='SELECT location.location_id,location.location_name
                                        FROM location';
                                 $get_prefix = $db->get_while_data($sql);
                                 if(!empty($get_prefix)){
                                        foreach($get_prefix as $prefix){
                                        echo ' <option value="'.$prefix['location_id'].'"';
                                            if($row["location_id"] == $prefix["location_id"]) {
                                          echo "selected";                                        
                                        }

                                        echo '>
                                        '.$prefix['location_name'].'</option>';
                                        }
                                }
                            
                
                            
                        echo '
                            </select>
                
                        </div>
                    </div>
                   
                    
                </div>

                   <div class="row">                  
                   <!--Grid column-->
                    <div class="col-md-3">
                        <div class="md-form">
                            <label for="name" >อัตราค่ามือ : นวดไทย (บาท/ชั่วโมง)</label>
                           <input type="text" required="" autocomplete="off"  name="thai_massage" class="form-control" value="'.$row['thai_massage'].'">
                        </div>
                    </div>

                    <!--Grid column-->
                    <div class="col-md-3">
                        <div class="md-form">
                            <label for="name" >อัตราค่ามือ : นวดเท้า (บาท/ชั่วโมง)</label>
                           <input type="text" required="" autocomplete="off"  name="foot_massage" class="form-control" value="'.$row['foot_massage'].'">
                        </div>
                    </div>

                    <!--Grid column-->
                    <div class="col-md-3">
                        <div class="md-form">
                            <label for="name" >อัตราค่ามือ : นวดน้ำมัน (บาท/ชั่วโมง)</label>
                           <input type="text" required="" autocomplete="off"  name="oil_massage" class="form-control" value="'.$row['oil_massage'].'">
                        </div>
                    </div>

                    <!--Grid column-->
                    <div class="col-md-3">
                        <div class="md-form">
                            <label for="name" >อัตราค่ามือ : คอ-บ่า-ไหล่ (บาท/ชั่วโมง)</label>
                           <input type="text" required="" autocomplete="off"  name="neck_massage" class="form-control" value="'.$row['neck_massage'].'">
                        </div>
                    </div>
                   
                    
                </div>
                       ';





                                      
                                      }

                                }


                    ?>
                  
                
              

             

                  

                 

             
                       
            <div class="form-group">
                <label class="col-md-4 control-label" for="submit"></label>
                <div class="col-md-4">
            <button type="submit" name="submit" class="btn btn-primary" >บันทึก</button>
         
                </div>
            </div>



              




</form>
          </div>
        </div>
           
              
            </div>
          </div>




        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  

 

</body>

</html>
