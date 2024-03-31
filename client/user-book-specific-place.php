<?php
    session_start();
    include('assets/inc/config.php');
    include('assets/inc/checklogin.php');
    check_login();
    $aid=$_SESSION['client_id'];
    if(isset($_POST['Book_Place']))
    {

           /*
            *We have already captured this passenger details....so no need of getting them again.     
            $client_fname=$_POST['client_fname'];
            $client_lname = $_POST['client_lname'];
            $client_phone=$_POST['client_phone'];
            $client_addr=$_POST['client_addr'];
            $client_email=$_POST['client_email'];
            $client_uname=$_POST['client_uname'];
            $client_bday=$_POST['client_bday'];
            //$client_ocupation=$_POST['client_occupation'];
            $client_bio=($_POST['client_bio']);
            //$passwordconf=md5($_POST['passwordconf']);
            //$date = date('d-m-Y h:i:s', time());
            */
            $client_table_number = $_POST['client_table_number'];
            $client_table_name = $_POST['client_table_name'];
            $client_place_location = $_POST['client_place_location'];
            $client_start_time = $_POST['client_start_time'];
            $client_end_time = $_POST['client_end_time'];
            $client_place_price = $_POST['client_place_price'];
            //sql file to update the table of passengers with the new captured information
            $query="update  qollab_client set client_table_number = ?, client_table_name = ?, client_place_location = ?, client_start_time = ?,  client_end_time = ?, client_place_price = ? where client_id=?";
            $stmt = $mysqli->prepare($query); //prepare sql and bind it later
            $rc=$stmt->bind_param('ssssssi', $client_table_number, $client_table_name, $client_place_location, $client_start_time, $client_end_time, $client_place_price, $aid);
            $stmt->execute();
            if($stmt)
            {
                $succ = "Reserved Place Cancelled";
            }
            else 
            {
                $err = "Please Try Again Later";
            }
            #echo"<script>alert('Your Profile Has Been Updated Successfully');</script>";
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
          <h2 class="page-head-title">Book Place </h2>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb page-head-nav">
              <li class="breadcrumb-item"><a href="pass-dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="#">Book Place</a></li>
              <li class="breadcrumb-item active">Reserve Seat</li>
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
        <?php
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
          <div class="row">
            <div class="col-md-12">
              <div class="card card-border-color card-border-color-success">
                <div class="card-header card-header-divider"><span class="card-subtitle">Fill All Details</span></div>
                <div class="card-body">
                  <form method ="POST">
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3"> First Name</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" readonly name="client_fname" value="<?php echo $row->client_fname;?>" id="inputText3" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3"> Last Name</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" readonly name="client_lname" value="<?php echo $row->client_lname;?>" id="inputText3" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3"> Phone Number</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" readonly name="client_phone" value="<?php echo $row->client_phone;?>" id="inputText3" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3"> Address</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" readonly name="client_addr" value="<?php echo $row->client_addr;?>" id="inputText3" type="text">
                      </div>
                    </div>

                    <!--Lets get the details of one single Place using its Place Id 
                    and pass it to this user instance-->
                    <?php
                        $id=$_GET['id'];
                        $ret="select * from qollab_places where id=?";
                        $stmt= $mysqli->prepare($ret) ;
                        $stmt->bind_param('i',$id);
                        $stmt->execute() ;//ok
                        $res=$stmt->get_result();
                        //$cnt=1;
                        while($row=$res->fetch_object())
                    {
                    ?>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Table Number</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" readonly name="client_table_number" value="<?php echo $row->table_number;?>" id="inputText3" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Table Name</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" readonly name="client_table_name" value="<?php echo $row->name;?>" id="inputText3" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Location</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" readonly name="client_place_location" value="<?php echo $row->location;?>" id="inputText3" type="text">
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3"> Booked From </label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" readonly name="client_start_time" value="<?php echo $row->available_from;?>" id="inputText3" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3"> Booked to</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" readonly name="client_end_time" value="<?php echo $row->available_to;?>" id="inputText3" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Price</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" readonly name="client_place_price" value="<?php echo $row->price;?>"  id="inputText3" type="text">
                      </div>
                    </div>
                    <!--End Place  isntance-->
                    <?php }?>

                    <div class="col-sm-6">
                        <p class="text-right">
                          <input class="btn btn-space btn-outline-success" value ="Book Place" name = "Book_Place" type="submit">
                          <button class="btn btn-space btn-outline-danger">Cancel</button>
                        </p>
                    </div>
                  </form>
                </div>
              </div>
            </div>
       
        <?php }?>
        
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