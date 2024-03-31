<?php
session_start();
include('assets/inc/config.php');
include('assets/inc/checklogin.php');
check_login();
$aid = $_SESSION['emp_id'];

if (isset($_POST['add_place'])) {
    $name = $_POST['name'];
    $location = $_POST['location'];
    $section = $_POST['section'];
    $available_from = $_POST['available_from'];
    $available_to = $_POST['available_to'];
    $table_number = $_POST['table_number'];
    $price = $_POST['price'];
    $total_places = $_POST['total_places'];

    // sql query to post the entered information
    $query = "INSERT INTO qollab_places (name, location, section, available_from, available_to, table_number, price, total_places) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($query);

    // bind parameters
    $rc = $stmt->bind_param('ssssssss', $name, $location, $section, $available_from, $available_to, $table_number, $price, $total_places);
    $stmt->execute();

    if ($stmt) {
        $succ = "New place was created!";
    } else {
        $err = "Please Try Again Later";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<!--Head-->
<?php include('assets/inc/head.php');?>
<!--End Head-->
  <body>
    <div class="be-wrapper be-fixed-sidebar ">
    <!--Navigation Bar-->
      <?php include('assets/inc/navbar.php');?>
      <!--End Navigation Bar-->

      <!--Sidebar-->
      <?php include('assets/inc/sidebar.php');?>
      <!--End Sidebar-->
      <div class="be-content">
        <div class="page-head">
          <h2 class="page-head-title">Create new place</h2>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb page-head-nav">
              <li class="breadcrumb-item"><a href="emp-dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="emp-manage-place.php">Places</a></li>
              <li class="breadcrumb-item active">Add place</li>
            </ol>
          </nav>
        </div>
            <?php if(isset($succ)) {?>
                                <!--This code for injecting an alert-->
                <script>
                            setTimeout(function () 
                            { 
                                swal("Success!","<?php echo $succ;?>!","success");
                            },
                                100);
                </script>

        <?php } ?>
        <?php if(isset($err)) {?>
        <!--This code for injecting an alert-->
                <script>
                            setTimeout(function () 
                            { 
                                swal("Failed!","<?php echo $err;?>!","Failed");
                            },
                                100);
                </script>

        <?php } ?>
        <div class="main-content container-fluid">
       <!-- Place Details forms-->
          <div class="row">
            <div class="col-md-12">
              <div class="card card-border-color card-border-color-success">
                <div class="card-header card-header-divider">Add New place<span class="card-subtitle"> Please Fill All Details</span></div>
                <div class="card-body">
                  <form method ="POST">
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3"> Table Name</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" name="name" id="inputText3" type="text" placeholder="Enter Table Name and Type">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3"> Table Number</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" name="table_number" id="inputText3" type="text" placeholder="Enter Table Number">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Location of the Table</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" name="location"  id="inputText3" type="text" placeholder="Enter Place location">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Section of the Location</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" name="section"  id="inputText3" type="text" placeholder="Enter the Section">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Available From:</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" name="available_from"  id="inputText3" type="time" placeholder="Enter available time">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Available To:</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" name="available_to" id="inputText3" type="time" placeholder="Enter available time">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Number of people can use</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" name="total_places"  id="inputText3" type="text" placeholder="Enter Total Number of people can use">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Price</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" name="price"  id="inputText3" type="text" placeholder="Enter the Price (with UZD)">
                      </div>
                    </div>
                    
                    <div class="col-sm-6">
                        <p class="text-right">
                          <input class="btn btn-space btn-success" value ="Add Place" name = "add_place" type="submit">
                          <button class="btn btn-space btn-danger">Cancel</button>
                        </p>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
       
        <!--End Place Instance-->
        
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
    <script src="assets/lib/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="assets/lib/jquery.nestable/jquery.nestable.js" type="text/javascript"></script>
    <script src="assets/lib/moment.js/min/moment.min.js" type="text/javascript"></script>
    <script src="assets/lib/datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
    <script src="assets/lib/select2/js/select2.min.js" type="text/javascript"></script>
    <script src="assets/lib/select2/js/select2.full.min.js" type="text/javascript"></script>
    <script src="assets/lib/bootstrap-slider/bootstrap-slider.min.js" type="text/javascript"></script>
    <script src="assets/lib/bs-custom-file-input/bs-custom-file-input.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function(){
      	//-initialize the javascript
      	App.init();
      	App.formElements();
      });
    </script>
  </body>

</html>