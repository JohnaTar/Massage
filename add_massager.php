<!DOCTYPE html>
<html lang="en">

<?php include ('sector/head.php'); ?>

<script>
  function save_massager_data(){
    $.ajax({
        type:"POST",
        url:"process.php",
        data:$("#massager_data").serialize(),
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
     $( "#datepicker2" ).datepicker({ dateFormat:'dd/mm/yy' });
  } );


$(document).ready(function(){
  $("#datepicker").change(function(){
    var data =$("#datepicker").val();
    var birthdate = new Date(data);
    var cur = new Date();
    var diff = cur-birthdate;
    var age = Math.floor(diff/31536000000);
    data =$("#age").val(age);
  });
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
             <h1 class="h3 mb-2 text-gray-800">เพิ่มหมอนวด</h1> 

           
             <hr>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
                  <form class="form-horizontal" id="massager_data" onsubmit="return save_massager_data();">

                    <div class="row">
                    <div class="col-md-2">
                        <div class="md-form">
                            <label for="name" >คำนำหน้า</label>
                           <select  name="insert_massager" class="form-control input-md" required="">
                            <?php 
                                 $db = new Database();
                                 $sql ='SELECT prefix.prefix_id,prefix.prefix_name
                                        FROM prefix';
                                 $get_prefix = $db->get_while_data($sql);
                                 if(!empty($get_prefix)){
                                        foreach($get_prefix as $prefix){
                                        echo ' <option value="'.$prefix['prefix_id'].'">'.$prefix['prefix_name'].'</option>';
                                        }
                                }
                            ?>
                

                            </select>
                
                        </div>
                    </div>
                    <!--Grid column-->
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="name" >ชื่อ</label>
                            <input type="text" required="" autocomplete="off" name="f_name" class="form-control">
                
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-4">
                        <div class="md-form">
                          <label for="email" >นามสกุล</label>
                            <input type="text" required="" autocomplete="off" name="l_name" class="form-control">
                        
                        </div>
                    </div>
                    <!--Grid column-->

                </div>
                  <div class="row">                  
                   <!--Grid column-->
                    
                    <div class="col-md-3">
                        <div class="md-form">
                            <label for="name" >ชื่อเล่น</label>
                            <input type="text" required="" autocomplete="off" name="n_name" class="form-control">
                
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form">
                            <label for="name" >เบอร์โทรศัพท์</label>
                            <input type="text" autocomplete="off" name="tel" class="form-control">
                
                        </div>
                    </div>
                     <div class="col-md-3">
                        <div class="md-form">
                            <label for="name" >วันเกิด DD/MM/YYYY</label>
                            <input type="text" autocomplete="off" required="" name="birth" class="form-control" id="datepicker">
                
                        </div>
                    </div>
                    
                  </div>
                    <div class="row">                  
                   <!--Grid column-->
                  
                    <div class="col-md-2">
                        <div class="md-form">
                            <label for="name" >อายุ</label>
                            <input type="text" autocomplete="off" required="" name="age" class="form-control" id="age" readonly="">
                
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="md-form">
                            <label for="name" >วันเริ่มงาน DD/MM/YYYY</label>
                            <input type="text" autocomplete="off" required="" name="start" class="form-control" id="datepicker2">
                
                        </div>
                    </div>                   
                    
                </div>
                 <div class="row">                  
                   <!--Grid column-->
                
                   
                    
                </div>

                

             

                  <div class="row">                  
                   <!--Grid column-->
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="name" >FACEBOOK</label>
                            <input type="text" autocomplete="off"  name="facebook" class="form-control">
                
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="name" >LINE</label>
                            <input type="text" autocomplete="off"  name="line" class="form-control">
                
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="name" >INSTAGRAM</label>
                            <input type="text" autocomplete="off"  name="instagram" class="form-control">
                
                        </div>
                    </div>
                   
                    
                    
                </div>

                 <div class="row">                  
                   <!--Grid column-->
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="name" >สาขา</label>
                           <select  name="location_id" class="form-control input-md" required="">
                            <?php 
                                 $db = new Database();
                                 $sql ='SELECT location.location_id,location.location_name
                                        FROM location';
                                 $get_prefix = $db->get_while_data($sql);
                                 if(!empty($get_prefix)){
                                        foreach($get_prefix as $prefix){
                                        echo ' <option value="'.$prefix['location_id'].'">
                                        '.$prefix['location_name'].'</option>';
                                        }
                                }
                            ?>
                

                            </select>
                
                        </div>
                    </div>
                   
                    
                </div>

                <div class="row">                  
                   <!--Grid column-->
                    <div class="col-md-3">
                        <div class="md-form">
                            <label for="name" >อัตราค่ามือ : นวดไทย (บาท/ชั่วโมง)</label>
                           <input type="text" required="" autocomplete="off"  name="thai_massage" class="form-control">
                        </div>
                    </div>

                    <!--Grid column-->
                    <div class="col-md-3">
                        <div class="md-form">
                            <label for="name" >อัตราค่ามือ : นวดเท้า (บาท/ชั่วโมง)</label>
                           <input type="text" required="" autocomplete="off"  name="foot_massage" class="form-control">
                        </div>
                    </div>

                    <!--Grid column-->
                    <div class="col-md-3">
                        <div class="md-form">
                            <label for="name" >อัตราค่ามือ : นวดน้ำมัน (บาท/ชั่วโมง)</label>
                           <input type="text" required="" autocomplete="off"  name="oil_massage" class="form-control">
                        </div>
                    </div>

                    <!--Grid column-->
                    <div class="col-md-3">
                        <div class="md-form">
                            <label for="name" >อัตราค่ามือ : คอ-บ่า-ไหล่ (บาท/ชั่วโมง)</label>
                           <input type="text" required="" autocomplete="off"  name="neck_massage" class="form-control">
                        </div>
                    </div>
                   
                    
                </div>
                       
                       
            <div class="form-group">
                <label class="col-md-4 control-label" for="submit"></label>
                <div class="col-md-4">
            <button type="submit" name="submit" class="btn btn-primary" >บันทึก</button>
            <button type="reset"  class="btn btn-danger" >รีเซ็ต</button>

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
