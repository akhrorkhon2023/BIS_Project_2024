<div class="be-left-sidebar">
        <div class="left-sidebar-wrapper"><a class="left-sidebar-toggle" href="#">Dashboard</a>
          <div class="left-sidebar-spacer">
            <div class="left-sidebar-scroll">
              <div class="left-sidebar-content">
                <ul class="sidebar-elements">
                  <li class="divider">Menu</li>
                  <li class=""><a href="user-dashboard.php"><i class="icon mdi mdi-view-dashboard"></i><span>Dashboard</span></a>
                  <li class="parent"><a href="#"><i class="icon mdi mdi-table"></i><span>Places</span></a>
                  
                    <ul class="sub-menu">
                       <li><a href="user-all-available-places.php">All Available Places</a>
                       <li><a href="user-search-available-places.php">Search Place</a>
                    </li>
                      
                    </ul>
                
                  </li>
                  <li class="parent"><a href="#"><i class="icon mdi mdi-briefcase-edit-outline"></i><span>Book Place</span></a>
                    <ul class="sub-menu">
                      <li><a href="user-book-place.php">Reserve place</a>
                      </li>
                      <li><a href="user-cancel-place.php">Cancel reservation</a>
                      </li>
                      
                    </ul>
                  </li>
                  <li class="parent"><a href="#"><i class="icon mdi mdi-ticket-confirmation"></i><span>Tickets</span></a>
                    <ul class="sub-menu">
                    <li><a href="user-place-checkout-ticket.php">Checkout</a>
                      </li>
                      <li><a href="user-confirm-ticket.php">Confirm Payments</a>
                      </li>
                      <li><a href="user-print-ticket.php">Print</a>
                      </li>
                    </ul>
                  </li>     
                  </li>
                    <?php
                      $aid=$_SESSION['client_id'];//assaign session a varible [PASSENGER ID]
                      $ret="select * from qollab_client where client_id=?";
                      $stmt= $mysqli->prepare($ret) ;
                      $stmt->bind_param('i',$aid);
                      $stmt->execute() ;//ok
                      $res=$stmt->get_result();
                      //$cnt=1;
                      while($row=$res->fetch_object())
                      {
                    ?>
                  <li class="parent"><a href="#"><i class="icon mdi mdi-face"></i><span><?php echo $row->client_uname;?>'s Profile</span></a>
                    <ul class="sub-menu">
                      <li><a href="user-profile.php">View</a>
                      </li>
                      <li><a href="user-profile-update.php">Update</a>
                      </li>
                      
                      <li><a href="user-profile-avatar.php">Profile Avatar</a>
                      </li>
                      <li><a href="user-profile-password.php">Change Password</a>
                      </li>
                      
                    </ul>
                  </li>
                    <?php }?>             
                  <li><a href="user-logout.php "><i class="icon mdi mdi-exit-run"></i><span>Logout</span></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>