<div class="be-left-sidebar">
  <div class="left-sidebar-wrapper"><a class="left-sidebar-toggle" href="#">Dashboard</a>
    <div class="left-sidebar-spacer">
      <div class="left-sidebar-scroll">
        <div class="left-sidebar-content">
          <ul class="sidebar-elements">
            <li class="divider">Menu</li>
            <li class=""><a href="emp-dashboard.php"><i
                  class="icon mdi mdi-view-dashboard"></i><span>Dashboard</span></a>
            </li>
            <li class="parent"><a href="#"><i class="icon mdi mdi-table"></i><span>Places</span></a>

              <ul class="sub-menu">
                <li><a href="emp-add-place.php">Add places</a>
                <li><a href="emp-manage-place.php">Manage Places</a>
                </li>

              </ul>

            </li>
            <li class="parent"><a href="#"><i class="icon mdi  mdi-account-switch"></i><span>Clients</span></a>
              <ul class="sub-menu">
                <li><a href="emp-add-client.php">Add Clients</a>
                </li>
                <li><a href="emp-manage-clients.php">Manage Clients</a>
                </li>

              </ul>
            </li>
            <li class="parent"><a href="#"><i class="icon mdi  mdi-account-check"></i><span>Employees</span></a>
              <ul class="sub-menu">
                <li><a href="admin-add-employee.php">Add Employee</a>
                </li>
                <li><a href="admin-manage-employee.php">Manage Employee</a>
                </li>

              </ul>
            </li>
            <li class="parent"><a href="#"><i class="icon mdi mdi-ticket-confirmation"></i><span>Reservation</span></a>
              <ul class="sub-menu">
                <li><a href="emp-approved-tickets.php"><span
                      class="badge badge-success float-right">Approved</span>Reservation</a>
                <li><a href="emp-pending-tickets.php"><span class="badge badge-info float-right">Pending</span>Reservation</a>
                <li><a href="emp-tickets.php">Manage</a>
                </li>
              </ul>
            </li>
            <li class="parent"><a href="#"><i class="icon mdi  mdi-key-variant"></i><span>Password Resets</span></a>
              <ul class="sub-menu">
                <li><a href="emp-approved-pwdresets.php"><span
                      class="badge badge-success float-right">Approved</span>View</a>
                <li><a href="emp-pending-pwdresets.php"><span
                      class="badge badge-info float-right">Pending</span>View</a>
                </li>
              </ul>
            </li>

            <li class="parent"><a href="#"><i class="icon mdi  mdi-square-inc-cash"></i><span>Accounting</span></a>
              <ul class="sub-menu">
                <li><a href="emp-view-accounting.php"><span class="badge badge-success float-right">Ticket
                      Payments</span>View</a>
                </li>
              </ul>
            </li>
            <?php
            $aid = $_SESSION['admin_id']; //assaign session a varible [PASSENGER ID]
            $ret = "select * from qollab_admin where admin_id=?";
            $stmt = $mysqli->prepare($ret);
            $stmt->bind_param('i', $aid);
            $stmt->execute(); //ok
            $res = $stmt->get_result();
            //$cnt=1;
            while ($row = $res->fetch_object()) {
              ?>
              <li class="parent"><a href="#"><i class="icon mdi mdi-face"></i><span>
                    <?php echo $row->admin_uname; ?>'s Profile
                  </span></a>
                <ul class="sub-menu">
                  <li><a href="emp-profile.php">View</a>
                  </li>
                  <li><a href="emp-profile-update.php">Update</a>
                  </li>

                  <li><a href="emp-profile-avatar.php">Profile Avatar</a>
                  </li>
                  <li><a href="emp-profile-password.php">Change Password</a>
                  </li>

                </ul>
              </li>
            <?php } ?>
            <li><a href="emp-logout.php "><i class="icon mdi mdi-exit-run"></i><span>Logout</span></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>