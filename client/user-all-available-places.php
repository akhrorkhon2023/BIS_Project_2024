<!--Server side scripting  code to hold  user session-->
<?php
  session_start();
  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['client_id'];
?>
<!--End server side code-->
<!DOCTYPE html>
<html lang="en">
  <!--Head-->
    <?php include('assets/inc/head.php');?>
  <!--End Head-->
  <body>
    <div class="be-wrapper be-fixed-sidebar">
    <!--Navbar-->
      <?php include("assets/inc/navbar.php");?>
      <!--End Navbar-->
        <!--Navbar-->
      <?php include('assets/inc/sidebar.php');?>
      <!--End Sidebar-->

      <div class="be-content">
        <div class="page-head">
          <h2 class="page-head-title">Places</h2>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb page-head-nav">
              <li class="breadcrumb-item"><a href="pass-dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="#">Places</a></li>
              <li class="breadcrumb-item active">Available Places</li>
            </ol>
          </nav>
        </div>
        <div class="main-content container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="card card-table">
                <div class="card-header">Available Places
                </div>
                <div class="card-body">
                  <table class="table table-striped table-bordered table-hover">
                    <thead class="thead-dark">
                      <tr>
                        <th>№</th>
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
          
                        $ret="SELECT * FROM qollab_places ";
                        $stmt= $mysqli->prepare($ret) ;
                        $stmt->execute() ;//ok
                        $res=$stmt->get_result();
                        $cnt=1;
                        while($row=$res->fetch_object())
                        {
                    ?>
                        <tr class="odd gradeX even gradeC odd gradeA ">
                            <td><?php echo $cnt;?></td>
                            <td><?php echo $row->table_number;?></td>
                            <td><?php echo $row->name;?></td>
                            <td><?php echo $row->location;?></td>
                            <td><?php echo $row->section;?></td>
                            <td><?php echo $row->available_from;?></td>
                            <td><?php echo $row->available_to;?></td>
                            <td><?php echo $row->total_places;?></td>
                            <td><?php echo $row->price;?></td>
                        </tr>
                    <?php $cnt = $cnt+1; }?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
      <!--Footer-->
      <?php include('assets/inc/footer.php');?>
      <!--End Footer-->
    </div>
    <script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="assets/lib/perfect-scrollbar/js/perfect-scrollbar.min.js" type="text/javascript"></script>
    <script src="assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="assets/js/app.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function(){
      	//-initialize the javascript
      	App.init();
      });
      
    </script>
  </body>

</html>