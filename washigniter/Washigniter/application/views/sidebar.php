        <div class="left-side-inner">
            <!--Sidebar nav-->
            <ul class="nav nav-pills nav-stacked custom-nav">

                <li class="<?php echo activate_menu('dashboard');?>"><a href="<?= base_url(); ?>dashboard"><i class="mdi mdi-speedometer mdi-24px"></i> <span>Dashboard</span></a></li>

                <li class="<?php echo activate_menu('vehicletype');?>"><a href="<?= base_url(); ?>vehicletype"><i class="mdi mdi-car mdi-24px"></i> <span>Vehicle Type</span></a></li>

                <li class="<?php echo activate_menu('servicelist');?> <?php echo activate_menu('editservice');?>"><a href="<?= base_url(); ?>servicelist"><i class="mdi mdi-file mdi-24px"></i> <span>Service List</span></a></li>

                <li class="<?php echo activate_menu('packages');?> <?php echo activate_menu('editpackage');?>"><a href="<?= base_url(); ?>packages"><i class="mdi mdi-cube mdi-24px"></i> <span>Packages</span></a></li>

                <li class="<?php echo activate_menu('bookings');?> <?php echo activate_menu('invoice');?>"><a href="<?= base_url(); ?>bookings"><i class="mdi mdi-cart mdi-24px"></i> <span>Bookings</span></a></li>

                <li class="<?php echo activate_menu('payment_list');?>"><a href="<?= base_url(); ?>payment_list"><i class="mdi mdi-credit-card mdi-24px"></i> <span>Payments</span></a></li>

                <li class="<?php echo activate_menu('outofservice');?>"><a href="<?= base_url(); ?>outofservice"><i class="mdi mdi-calendar mdi-24px"></i> <span>Out of Service</span></a></li>

                <li class="<?php echo activate_menu('reports');?>"><a href="<?= base_url(); ?>reports"><i class="mdi mdi-file-chart mdi-24px"></i> <span>Reports</span></a></li>

                <li class="<?php echo activate_menu('integration');?>"><a href="<?= base_url(); ?>integration"><i class="mdi mdi-code-braces mdi-24px"></i> <span>Integration</span></a></li>

                <li class="menu-list <?php echo ((activate_menu('settings'))=='active') ? 'active':'' ?>
          <?php echo ((activate_menu('workingtime'))=='active') ? 'active':'' ?>
           <?php echo ((activate_menu('websitesetting'))=='active') ? 'active':'' ?>
           <?php echo ((activate_menu('smtpconfig'))=='active') ? 'active':'' ?>
            <?php echo ((activate_menu('edit_email_template'))=='active') ? 'active':'' ?>
            <?php echo ((activate_menu('email_template'))=='active') ? 'active':'' ?>
          <?php echo ((activate_menu('resetpassword'))=='active') ? 'active':'' ?>"><a href="#"><i class="mdi mdi-settings mdi-24px"></i> <span>
                    Settings
                </span></a>
                    <ul class="sub-menu-list">
                        <li class="<?php echo activate_menu('workingtime'); ?>"><a href="<?= base_url(); ?>settings/workingtime">Working Time</a></li>
                        <li class="<?php echo activate_menu('websitesetting'); ?>"><a href="<?= base_url(); ?>settings/websitesetting">Website Setting</a></li>
                        <li class="<?php echo activate_menu('payment_settings'); ?>"><a href="<?= base_url(); ?>settings/payment_settings">Payment Setting</a></li>
                        <li class="<?php echo activate_menu('smtpconfig'); ?>"><a href="<?= base_url(); ?>settings/smtpconfig">SMTP Configuration</a></li>
                        <li class="<?php echo activate_menu('email_template'); ?> <?php echo activate_menu('edit_email_template'); ?>"><a href="<?= base_url(); ?>settings/email_template">Email Template</a></li>
                        <li class="<?php echo activate_menu('resetpassword'); ?>"><a href="<?= base_url(); ?>resetpassword">Reset Password</a></li>
                    </ul>
                </li>

            </ul>
            <!--End sidebar nav-->

        </div>
    </div>
    <!--End left side menu-->


    <!-- main content start-->
      <div class="main-content" >

          <!-- header section start-->
          <div class="header-section">

              <a class="toggle-btn"><i class="fa fa-bars"></i></a>

              <a href="<?= base_url(); ?>" class="btn btn-primary mt-mb-7px">View Frontend</a>

              <!--notification menu start -->
              <div class="menu-right">
                  <ul class="notification-menu">
                      <li>
                          <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                              <!-- <img src="assets/images/users/avatar-6.jpg" alt="" /> -->
                              <?php echo $this->session->userdata("session_data")['name']; ?>
                              <span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                            <li> <a href="<?= base_url(); ?>settings/websitesetting"> <i class="fa fa-wrench"></i> Settings </a> </li>
                            <li> <a href="<?= base_url(); ?>resetpassword"> <i class="fa fa-user"></i> Profile </a> </li>
                            <li> <a href="<?= base_url(); ?>admin/logout"> <i class="fa fa-lock"></i> Logout </a> </li>
                          </ul>
                      </li>

                  </ul>
              </div>
              <!--notification menu end -->

          </div>
          <!-- header section end-->