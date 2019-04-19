<!DOCTYPE html>
<html lang="en">

<?php include ('sector/head.php'); ?>

<script>
  function save_member_data(){
    $.ajax({
        type:"POST",
        url:"process.php",
        data:$("#member_data").serialize(),
        success:function(data){
            
            //close modal
          
            
            //show result
            alert(data);
            
            //reload page
             location.replace('member');
        }
    });
    return false;
}

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
             <h1 class="h3 mb-2 text-gray-800">เพิ่มสมาชิก</h1> 

           
             <hr>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
                  <form class="form-horizontal" id="member_data" onsubmit="return save_member_data();">

                    <div class="row">
                    <div class="col-md-2">
                        <div class="md-form">
                            <label for="name" >คำนำหน้า</label>
                           <select  name="insert_mem" class="form-control input-md" required="">
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
                    <div class="col-md-2">
                        <div class="md-form">
                            <label for="name" >เพศ</label>
                            <select  name="gender" class="form-control input-md" required="">
                            <?php 
                                 $db = new Database();
                                 $sql ='SELECT gender.gender_id,gender.gender_name
                                        FROM gender';
                                 $get_prefix = $db->get_while_data($sql);
                                 if(!empty($get_prefix)){
                                        foreach($get_prefix as $prefix){
                                        echo ' <option value="'.$prefix['gender_id'].'">'.$prefix['gender_name'].'</option>';
                                        }
                                }
                            ?>
                

                            </select>
                
                        </div>
                    </div>
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
                    
                  </div>
                    <div class="row">                  
                   <!--Grid column-->
                    <div class="col-md-3">
                        <div class="md-form">
                            <label for="name" >วันเกิด</label>
                            <input type="text" autocomplete="off" required="" name="birth" class="form-control">
                
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form">
                            <label for="name" >อายุ</label>
                            <input type="text" autocomplete="off" required="" name="age" class="form-control">
                
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="name" >อาชีพ</label>
                            <input type="text" autocomplete="off" name="job" class="form-control">
                
                        </div>
                    </div>
                    
                </div>
                 <div class="row">                  
                   <!--Grid column-->
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="name" >รายได้ต่อเดือน</label>
                           <select  name="salary" class="form-control input-md" required="">
                            <?php 
                                 $db = new Database();
                                 $sql ='SELECT salary.salary_id,salary.salary_name
                                        FROM salary';
                                 $get_prefix = $db->get_while_data($sql);
                                 if(!empty($get_prefix)){
                                        foreach($get_prefix as $prefix){
                                        echo ' <option value="'.$prefix['salary_id'].'">'.$prefix['salary_name'].'</option>';
                                        }
                                }
                            ?>
                

                            </select>
                
                        </div>
                    </div>
                   
                    
                </div>

                 <div class="row">                  
                   <!--Grid column-->
                    <div class="col-md-7">
                        <div class="md-form">
                            <label for="name" >ที่อยู่</label>
                             <textarea rows="3" autocomplete="off" required="" name="address" class="form-control"></textarea>
                
                        </div>
                    </div>
                    
                    
                </div>

                <div class="row">                  
                   <!--Grid column-->
                    <div class="col-md-3">
                        <div class="md-form">
                            <label for="name" >จังหวัด</label>
                            <input type="text" autocomplete="off" required="" name="province" class="form-control">
                
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form">
                            <label for="name" >เขต/อำเภอ</label>
                            <input type="text" autocomplete="off" required="" name="area" class="form-control">
                
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form">
                            <label for="name" >แขวง/ตำบล</label>
                            <input type="text" autocomplete="off" required="" name="district" class="form-control">
                
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form">
                            <label for="name" >รหัสไปรษณีย์</label>
                            <input type="text" autocomplete="off" required="" name="zip" class="form-control">
                
                        </div>
                    </div>
                    
                    
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
                            <label for="name" >สถานะสมาชิก</label>
                           <select  name="status" class="form-control input-md" required="">
                            <?php 
                                 $db = new Database();
                                 $sql ='SELECT status.status_id,status.status_name
                                        FROM status';
                                 $get_prefix = $db->get_while_data($sql);
                                 if(!empty($get_prefix)){
                                        foreach($get_prefix as $prefix){
                                        echo ' <option value="'.$prefix['status_id'].'">'.$prefix['status_name'].'</option>';
                                        }
                                }
                            ?>
                

                            </select>
                
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
