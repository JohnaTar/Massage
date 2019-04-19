<!DOCTYPE html>
<html lang="en">

<?php include ('sector/head.php'); ?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

  
      <?php include ('sector/nav.php'); ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
             <h1 class="h3 mb-2 text-gray-800">สมาชิก</h1>
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
           
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ชื่อ - นามสกุล</th>
                      <th>ชื่อเล่น</th>
                      <th>เพศ</th>
                      <th>อายุ</th>
                      <th>เบอร์โทร</th>
                      <th>วันที่เก็บข้อมูล</th>
                      <th>เมนู</th>

                    </tr>
                  </thead>                 
                  <tbody>
                      <?php 
                          include ('connect/connect.php');
                          $db = new Database();
                          $sql ='SELECT
member.m_id,
prefix.prefix_name,
gender.gender_name,
member.f_name,
member.l_name,
member.n_name,
member.age,
member.tel,
member.timestamp
FROM
member
INNER JOIN prefix ON member.prefix_id = prefix.prefix_id
INNER JOIN gender ON member.gender_id = member.prefix_id AND gender.gender_id = member.gender_id
';
                          $get_data = $db->get_while_data($sql);

                           if(!empty($get_data)){
                                foreach($get_data  as $row){

                                  $originalDate = $row['timestamp'];
                                  $newDate = date("d-m-Y", strtotime($originalDate));
                                  echo '<tr>';
                                    echo '<td>'.$row['prefix_name'].' 
                                              '.$row['f_name'].' 
                                              '.$row['l_name'].'</td>';
                                    echo '<td>'.$row['n_name'].'</td>';
                                    echo '<td>'.$row['gender_name'].'</td>';
                                    echo '<td>'.$row['age'].'</td>';
                                    echo '<td>'.$row['tel'].'</td>';
                                    echo '<td>'.$newDate.'</td>';





                                  echo '</tr>';

                               }
                             }


                      ?>
                  <!--   <tr>
                      <td>Tiger Nixon</td>
                      <td>System Architect</td>
                      <td>Edinburgh</td>
                      <td>61</td>
                      <td>2011/04/25</td>
                      <td>$320,800</td>
                    </tr> -->
                  
                  </tbody>
                </table>
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
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

 

</body>

</html>
