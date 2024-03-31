<?php
  session_start();
  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['client_id'];
?>
<!DOCTYPE html>
<html lang="en">
  <!--Head-->
  <?php include("assets/inc/head.php");?>
  <!--End Head-->

  <body>

    <div class="be-wrapper be-fixed-sidebar">

    <!--Navbar-->
     <?php include("assets/inc/navbar.php");?>
      <!--End Nav Bar-->

      <!--Sidebar-->
      <?php include('assets/inc/sidebar.php');?>
      <!--End Sidebar-->
		
      <div class="be-content">
        <div class="main-content container-fluid">
          <div class="row">
            
            <div class="col-12 col-lg-6 col-xl-4">
              <a href="user-my-booked-place.php">
                <div class="widget widget-tile">
                  <div class="chart sparkline"><i class="material-icons">add_shopping_cart</i></div>
                  <div class="data-info">
                    <div class="desc">Booked Place</div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-12 col-lg-6 col-xl-4">
              <a href="user-cancel-place.php">
                  <div class="widget widget-tile">
                    <div class="chart sparkline"><i class ="material-icons">backspace</i></div>
                    <div class="data-info">
                      <div class="desc">Cancel Booking</div>
                    </div>
                  </div>
              </a>
            </div>
            <div class="col-12 col-lg-6 col-xl-4">
              <a href="user-print-ticket.php">
                <div class="widget widget-tile">
                  <div class="chart sparkline" ><i class ="material-icons">burst_mode</i></div>
                  <div class="data-info">
                    <div class="desc">Tickets</div>
                  </div>
                </div>
              </a>
            </div>
            
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="card card-table">
                <div class="card-header">Available places
                
                  <div class="tools dropdown"><span class=""></span><a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"><span class=""></span></a>
                    
                  </div>
                </div>
                <div class="card-body">
                <!--Start Table-->
                  <table class="table table-striped table-bordered table-hover table-fw-widget" id="table1">
                    <thead class="thead-dark">
                      <tr>
                      <th>Table number</th>
                        <th>Table Name</th>
                        <th>Location</th>
                        <th>Section</th>
                        <th>Available from</th>
                        <th>Available to</th>
                        <th>Total Places</th>
                        <th>Price</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php

                        $ret="SELECT * FROM qollab_places ORDER BY RAND() LIMIT 10 "; //sql code to get to ten places randomly
                        $stmt= $mysqli->prepare($ret) ;
                        $stmt->execute() ;//ok
                        $res=$stmt->get_result();
                        $cnt=1;
                        while($row=$res->fetch_object())
                      {
                      ?>
                          <tr class="odd gradeX even gradeC odd gradeA ">
                          <td><?php echo $row->table_number;?></td>
                            <td><?php echo $row->name;?></td>
                            <td><?php echo $row->location;?></td>
                            <td><?php echo $row->section;?></td>
                            <td><?php echo $row->available_from;?></td>
                            <td><?php echo $row->available_to;?></td>
                            <td><?php echo $row->total_places;?></td>
                            <td><?php echo $row->price;?></td>
                          </tr>

                      <?php $cnt=$cnt+1; }?>
                    </tbody>
                  </table>
                  <!--eND Table-->
                </div>
              </div>
            </div>
          </div>
  
        </div>
        <!--footer-->
        <?php include('assets/inc/footer.php');?>
        <!--EndFooter-->
      </div>
     
    </div>

    <script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="assets/lib/perfect-scrollbar/js/perfect-scrollbar.min.js" type="text/javascript"></script>
    <script src="assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="assets/js/app.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-flot/jquery.flot.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-flot/jquery.flot.pie.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-flot/jquery.flot.time.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-flot/jquery.flot.resize.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-flot/plugins/jquery.flot.orderBars.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-flot/plugins/curvedLines.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-flot/plugins/jquery.flot.tooltip.js" type="text/javascript"></script>
    <script src="assets/lib/jquery.sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <script src="assets/lib/countup/countUp.min.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="assets/lib/jqvmap/jquery.vmap.min.js" type="text/javascript"></script>
    <script src="assets/lib/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
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
      	App.dashboard();
      
      });
    </script>
  </body>

</html>