<!DOCTYPE html>
<html lang="en">

<?php include ('sector/head.php'); ?>

<script>
  function save_record_data(){
    $.ajax({
        type:"POST",
        url:"process.php",
        data:$("#record_data").serialize(),
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

$(function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'dd/mm/yy' });
     
  });


$(document).ready(function(){
  $("#record_data").change(function(){

    var date =$("#datepicker").val();
    var time =$("#time").val();
    var type_massager =$("#type_massager").val();
    var massager_id =$("#massager_id").val();
    var member_id =$("#member_id").val();
    var table_id =$("#table_id").val();

    info = [];
      info[0] = date;
      info[1] = time;
      info[2] = massager_id;
      info[3] = type_massager;

      info2 = [];
      info2[0] = date;
      info2[1] = time;
      info2[2] = table_id;
      info2[3] = type_massager;

      info3 = [];
      info3[0] = date;
      info3[1] = time;
      info3[2] = member_id;
      info3[3] = type_massager;



   var flag;
    $.ajax({
      url: "checkrecord.php",
      data: {info : info},
      type: "POST",
      async:false,
      success: function(data, status) { 

 
         var result = data.split(",");
         flag = result[0];
         var msg = result[1];
         $("#msg1").html(msg);

        
      },
      error: function(xhr, status, exception) { 

        alert('status');


    }
    });

      var flag2;
    $.ajax({
      url: "checkrecord.php",
      data: {info2 : info2},
      type: "POST",
      async:false,
      success: function(data, status) { 

        
         var result = data.split(",");
         flag2 = result[0];
         var msg2 = result[1];
         $("#msg2").html(msg2);
      },
      error: function(xhr, status, exception) { 

        alert('status');


    }
    });
 

          var flag3;
    $.ajax({
      url: "checkrecord.php",
      data: {info3 : info3},
      type: "POST",
      async:false,
      success: function(data, status) { 

        
         var result = data.split(",");
         flag3 = result[0];
         var msg3 = result[1];
         $("#msg3").html(msg3);
      },
      error: function(xhr, status, exception) { 

        alert('status');


    }
    });



    
    return flag;


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
             <h1 class="h3 mb-2 text-gray-800">บันทึกการทำงานหมอนวด</h1> 

           
             <hr>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
                  <form class="form-horizontal" id="record_data" onsubmit="return save_record_data();">

                    <div class="row">
                      <div class="col-md-4">
                      </div>
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="name" >วันที่</label>
                          <input type="text" autocomplete="off" name="date_record" id="datepicker" class="form-control">    
                
                        </div>
                    </div>
      

                </div>
                  <div class="row">                  
                   <!--Grid column-->
                    
                    <div class="col-md-4">
                        
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="name" >เวลา</label>
                            <input type="time" autocomplete="off" id="time"  class="form-control">
                
                        </div>
                    </div>

                   
                     
                    
                  </div>
                    <div class="row">                  
                   <!--Grid column-->
                  
                    <div class="col-md-4">
                        
                    </div>

                    <div class="col-md-4">
                           <div class="md-form">
                            <label for="name" >ประเภทนวด</label>
                           <select  name="insert_massager" class="form-control input-md" required="" id="type_massager">
                            <?php 
                                 $db = new Database();
                                 $sql ='SELECT cost.cost_id,cost.cost_name FROM cost';
                                 $get_prefix = $db->get_while_data($sql);
                                 if(!empty($get_prefix)){
                                        foreach($get_prefix as $prefix){
                                        echo ' <option value="'.$prefix['cost_id'].'">'.$prefix['cost_name'].'</option>';
                                        }
                                }
                            ?>
                

                            </select>
                
                        </div>
                    </div>                   
                    
                </div>
                

                  <div class="row">                  
                   <!--Grid column-->
                    <div class="col-md-4">
                       
                    </div>
                    <div class="col-md-4">
                         <div class="md-form">
                            <label for="name" >เตียง</label>
                           <select  name="insert_massager" id="table_id" class="form-control input-md" required="">
                            <?php 
                                 $db = new Database();
                                 $sql ='SELECT tables.table_id,tables.table_name
                                        FROM tables';
                                 $get_prefix = $db->get_while_data($sql);
                                 if(!empty($get_prefix)){
                                        foreach($get_prefix as $prefix){
                                        echo ' <option value="'.$prefix['table_id'].'" >'.$prefix['table_name'].'</option>';
                                        }
                                }
                            ?>
                

                            </select>

                             <span id="msg2"></span> <br/>
                
                        </div>
                    </div>
                  
                   
                    
                    
                </div>

                <div class="row">                  
                   <!--Grid column-->
                    <div class="col-md-4">
                       
                    </div>
                    <div class="col-md-4">
                         <div class="md-form">
                            <label for="name" >ชื่อหมอนวด</label>
                           <select  name="insert_massager" class="form-control input-md" id ="massager_id" required="">
                            <?php 
                                 $db = new Database();
                                 $sql ='SELECT prefix.prefix_name,massager.massager_id,massager.f_name,
                                               massager.l_name,massager.n_name
                                        FROM massager
                                        INNER JOIN prefix ON massager.prefix_id = prefix.prefix_id';
                                 $get_prefix = $db->get_while_data($sql);
                                 if(!empty($get_prefix)){
                                        foreach($get_prefix as $prefix){
                                        echo ' <option value="'.$prefix['massager_id'].'" >'.$prefix['prefix_name'].' '.$prefix['f_name'].' '.$prefix['l_name'].' ('.$prefix['n_name'].')</option>';
                                        }
                                }
                            ?>
                

                            </select>
                            <span id="msg1"></span> <br/>
                
                        </div>
                    </div>

                    
                </div>

                <div class="row">                  
                   <!--Grid column-->
                    <div class="col-md-4">
                       
                    </div>
                    <div class="col-md-4">
                         <div class="md-form">
                            <label for="name" >ชื่อลูกค้า</label>
                           <select  name="insert_massager" id="member_id" class="form-control input-md" required="">
                                      <option value="9999"> Walk IN</option>
                            <?php 
                                 $db = new Database();
                                 $sql ='SELECT member.m_id,member.f_name,member.l_name,
                                               member.n_name,prefix.prefix_name
                                        FROM member
                                        INNER JOIN prefix ON member.prefix_id = prefix.prefix_id';
                                 $get_prefix = $db->get_while_data($sql);
                                 if(!empty($get_prefix)){
                                        foreach($get_prefix as $prefix){
                                        echo ' <option value="'.$prefix['m_id'].'" >'.$prefix['prefix_name'].' '.$prefix['f_name'].' '.$prefix['l_name'].' ('.$prefix['n_name'].') </option>';
                                        }
                                }
                            ?>
                

                            </select>
                                <span id="msg3"></span> <br/>
                        </div>
                    </div>

                    
                  
                   
                    
                    
                </div>


               
<hr>
               
                       
            <div class="row">
              <div class="col-md-4"></div>
              <div class="col-md-4">
              <div class="form-group">
                <label class="col-md-4 control-label" for="submit"></label>
              
            <button type="submit" name="submit" id="submit" class="btn btn-primary" >บันทึก</button>
            <button type="reset"  class="btn btn-danger" >รีเซ็ต</button>

                
            </div>

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
