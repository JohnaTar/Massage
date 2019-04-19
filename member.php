<!DOCTYPE html>
<html lang="en">

<?php include ('sector/head.php'); ?>

<style type="text/css">
  td.details-control {
    background: url('pic/open.png') no-repeat center center;
    cursor: pointer;
}
tr.shown td.details-control {
    background: url('pic/close.png') no-repeat center center;
}
</style>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

  
      <?php include ('sector/nav.php'); ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
             <h1 class="h3 mb-2 text-gray-800">สมาชิก</h1> 

             <div class="row">
                <div class="col-md-3">
                <a href="add_member" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">เพิ่มสมาชิก</span>
                </a>
                </div>
             </div>
             <hr>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">

           
            <div class="card-body">

           
              <div class="table-responsive">
                 <table class="table table-bordered" id="example" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th></th>
                <th>ชื่อ - นามสกุล</th>
                <th>ชื่อเล่น</th>
                <th>เพศ</th>
                <th>อายุ</th>
                <th>เบอร์โทร</th>
                <th>วันเกิด</th>            
                <th>วันที่เก็บข้อมูล</th>
                <th>สถานะ</th>                                               
                <th>เมนู</th>

            </tr>
        </thead>
       
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
  <script type="text/javascript">
    function format ( d ) {
    // `d` is the original data object for the row
    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
        '<tr>'+
            '<td>อาชีพ :</td>'+
            '<td>'+d.job+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>รายได้ :</td>'+
            '<td>'+d.salary+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>ที่อยู่ :</td>'+
            '<td>'+d.adress+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>LINE :</td>'+
            '<td>'+d.line+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>FACEBOOK :</td>'+
            '<td>'+d.facebook+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Instragram :</td>'+
            '<td>'+d.instagram+'</td>'+
        '</tr>'+
    '</table>';
}
 
$(document).ready(function() {
    var table = $('#example').DataTable( {
        "ajax": "ajax.php",
        "columns": [
            {
                "className":      'details-control',
                "orderable":      false,
                "data":           null,
                "defaultContent": ''
            },
            { "data": "name" },
            { "data": "nickname" },
            { "data": "gender" },
            { "data": "age" },
            { "data": "tel" },
            { "data": "birth" },
            { "data": "startdate" },
            { "data": "status" },
            { "data": "menu" },



        ],
        "order": [[1, 'asc']]
    } );
     
    // Add event listener for opening and closing details
    $('#example tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );
 
        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
        }
    } );
} );
  </script>

 

</body>

</html>
