<!--Start Server side code to give us and hold session-->
<?php
  session_start();
  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['client_id'];
?>
<!--End Server side scriptiing-->
<!DOCTYPE html>
<html lang="en">
<!--HeAD-->
  <?php include('assets/inc/head.php');?>
 <!-- end HEAD--> 

  <body>
    <div class="be-wrapper be-fixed-sidebar">
    <!--navbar-->
      <?php include('assets/inc/navbar.php');?>
      <!--End navbar-->
      <!--Sidebar-->
      <?php include('assets/inc/sidebar.php');?>
      <!--End Sidebar-->

      <div class="be-content">
      <div class="page-head">
          <h2 class="page-head-title">My Booked place</h2>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb page-head-nav">
              <li class="breadcrumb-item"><a href="pass-dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">My Booked place</li>
            </ol>
          </nav>
        </div>

        <div class="main-content container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <div class="card card-table">
              
              <?php
              /**
               * We need to get firstname or username of logged in user!!
               */         
                $aid=$_SESSION['client_id'];
                $ret="select * from qollab_client where client_id=?";
                $stmt= $mysqli->prepare($ret) ;
                $stmt->bind_param('i',$aid);
                $stmt->execute() ;//ok
                $res=$stmt->get_result();
                //$cnt=1;
                while($row=$res->fetch_object())
                 {
                    ?>
                <div class="card-header"><?php echo $row->client_fname;?> <?php echo $row->client_lname;?>  this is your Booked Place!   
                <?php }?>             
                </div>

                <div class="card-body">
                  <table class="table table-striped table-bordered table-hover table-fw-widget" id="table1">
                    <thead class="thead-dark">
                      <tr>
                      <th>Table Number</th>
                        <th>Table Name</th>
                        <th>Location</th>
                        <th>Available from</th>
                        <th>Available to</th>
                        <th>Price</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                        /**
                         *Lets select place booking details of logged in user using PASSENGER ID as the session
                         */
                            //$aid=$_SESSION['client_id'];
                            $ret="select * from qollab_client where client_id=?";//sql to get details of our user
                            $stmt= $mysqli->prepare($ret) ;
                            $stmt->bind_param('i',$aid);
                            $stmt->execute() ;//ok
                            $res=$stmt->get_result();
                            //$cnt=1;
                        while($row=$res->fetch_object())
                        {
                        ?>
                      <tr class="odd gradeX even gradeC odd gradeA even gradeA ">
                        <td><?php echo $row->client_table_number;?></td>
                        <td><?php echo $row->client_table_name;?></td>
                        <td class="center"><?php echo $row->client_place_location;?></td>
                        <td class="center"><?php echo $row->client_start_time;?></td>
                        <td class="center"><?php echo $row->client_end_time;?></td>
                        <td class="center"><?php echo $row->client_place_price;?></td>
                      </tr>
                        <?php }?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
         
         <!--footer-->
         <?php include('assets/inc/footer.php');?>
         <!--End Footer-->
		
        </div>
      </div>
     
    </div>
    <script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="assets/lib/perfect-scrollbar/js/perfect-scrollbar.min.js" type="text/javascript"></script>
    <script src="assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="assets/js/app.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/datatables.net/js/jquery.dataTables.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/datatables.net-bs4/js/dataTables.bootstrap4.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/datatables.net-buttons/js/dataTables.buttons.min.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/datatables.net-buttons/js/buttons.flash.min.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/jszip/jszip.min.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/pdfmake/pdfmake.min.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/pdfmake/vfs_fonts.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/datatables.net-buttons/js/buttons.colVis.min.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/datatables.net-buttons/js/buttons.print.min.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/datatables.net-buttons/js/buttons.html5.min.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/datatables.net-responsive/js/dataTables.responsive.min.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function(){
      	//-initialize the javascript
      	App.init();
      	App.dataTables();
      });
    </script>
  </body>

</html>