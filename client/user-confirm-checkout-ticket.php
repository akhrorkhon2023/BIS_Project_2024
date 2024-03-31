<?php
    session_start();
    include('assets/inc/config.php');
    include('assets/inc/checklogin.php');
    check_login();
    $aid=$_SESSION['client_id'];
    if(isset($_POST['place_fare_confirm_checkout']))
    {
     
            $client_name=$_POST['client_name'];
            //$client_lname = $_POST['client_lname'];
            //$client_phone=$_POST['client_phone'];
            $client_addr=$_POST['client_addr'];
            $client_email=$_POST['client_email'];        
            $table_name = $_POST['table_name'];
            $table_number = $_POST['table_number'];
            $booked_from = $_POST['booked_from'];
            $booked_to = $_POST['booked_to'];
            $price = $_POST['price'];
            $payment_code = $_POST['payment_code'];
            //sql file to update the table of passengers with the new captured information
            $query="insert into qollab_place_tickets (client_name, client_email, client_addr, table_name, table_number, booked_from, booked_to,  price, payment_code) values (?,?,?,?,?,?,?,?,?)";
            $stmt = $mysqli->prepare($query); //prepare sql and bind it later
            $rc=$stmt->bind_param('sssssssss', $client_name, $client_email,$client_addr, $table_name, $table_number, $booked_from, $booked_to, $price, $payment_code);
            $stmt->execute();
            if($stmt)
            {
                $succ = "Ticket Payment Confirmed";
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
          <h2 class="page-head-title">Place Tickt Checkout </h2>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb page-head-nav">
              <li class="breadcrumb-item"><a href="pass-dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="#">Tickets</a></li>
              <li class="breadcrumb-item"><a href="#">Checkout</a></li>
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
                <div class="card-header card-header-divider"><span class="card-subtitle"></span></div>
                <div class="card-body">
                  <form method ="POST">
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3"> Name</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" readonly name="client_name"  value="<?php echo $row->client_fname;?> <?php echo $row->client_lname;?>" id="inputText3" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3"> Email</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" readonly name="client_email"  value="<?php echo $row->client_email;?>" id="inputText3" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3"> Address</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" readonly name= "client_addr"  value="<?php echo $row->client_addr;?>" id="inputText3" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Booked Table Number</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" readonly name="table_number"  value="<?php echo $row->client_table_number;?>" id="inputText3" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Booked Table Name</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" readonly name="table_name"  value="<?php echo $row->client_table_name;?>" id="inputText3" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3"> Booked From </label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" readonly  name = "booked_from" value="<?php echo $row->client_start_time;?>" id="inputText3" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3"> Booked to </label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" readonly name = "booked_to" value="<?php echo $row->client_end_time;?>" id="inputText3" type="text">
                      </div>
                    </div>                   
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3"> Price</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" readonly name = "price"  value="<?php echo $row->client_place_price;?>" id="inputText3" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Payment Code</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" readonly name ="payment_code" value = "<?php echo $row->client_payment_code;?>" name= "client_payment_code"  id="inputText3" type="text">
                      </div>
                    </div>

                    <div class="col-sm-6">
                        <p class="text-right">
                          <input class="btn btn-space btn-success" value ="Confirm Payment" name = "place_fare_confirm_checkout" type="submit">
                          <button class="btn btn-space btn-secondary">Cancel</button>
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