        <!--body wrapper start-->
        <div class="wrapper">
              
          <!--Start Page Title-->
           <div class="page-title-box">
                <h4 class="page-title">Dashboard</h4>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?= base_url(); ?>dashboard">Dashboard</a>
                    </li>
                    
                    <li class="active">
                        Dashboard
                    </li>
                </ol>
                <div class="clearfix"></div>
             </div>
              <!--End Page Title-->

           
                  <!--Start row-->
                  <div class="row">
                   <!--Start info box-->


                   <div class="col-md-3 col-sm-6">
                       <div class="info-box-main">
                          <div class="info-stats">
                              <p><?= $service_count; ?></p>
                              <span>Service</span>
                          </div>
                          <div class="info-icon text-primary ">
                              <i class="mdi mdi-cart"></i>
                          </div>
                          <div class="info-box-progress">
                             <div class="progress">
                              <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100" style="width: 48%;">
                             </div>
                          </div>
                          </div>
                       </div>
                   </div>
                   <!--End info box-->
                   
                   <!--Start info box-->
                   <div class="col-md-3 col-sm-6">
                       <div class="info-box-main">
                          <div class="info-stats">
                              <p><?= $totalbooking_count; ?></p>
                              <span>Total Booking</span>
                          </div>
                          <div class="info-icon text-info">
                             <i class="mdi mdi-account-multiple"></i> 
                          </div>
                          <div class="info-box-progress">
                             <div class="progress">
                              <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100" style="width: 48%;">
                             </div>
                          </div>
                          </div>
                       </div>
                   </div>
                   <!--End info box-->
                
                   <!--Start info box-->
                   <div class="col-md-3 col-sm-6">
                       <div class="info-box-main">
                          <div class="info-stats">
                              <p><?= $todaybooking_count; ?></p>
                              <span>Today Booking</span>
                          </div>
                          <div class="info-icon text-warning">
                              <i class="fa fa-dollar"></i>
                          </div>
                          <div class="info-box-progress">
                             <div class="progress">
                              <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100" style="width: 48%;">
                              </div>
                          </div>
                          </div>
                       </div>
                   </div>
                   <!--End info box-->
                
                   <!--Start info box-->
                   <div class="col-md-3 col-sm-6">
                       <div class="info-box-main">
                          <div class="info-stats">
                              <p><?= $confirmed_count; ?></p>
                              <span>Today Confirmed</span>
                          </div>
                          <div class="info-icon text-danger">
                              <i class="mdi mdi-weight"></i>
                          </div>
                          <div class="info-box-progress">
                             <div class="progress">
                              <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100" style="width: 48%;">
                             </div>
                          </div>
                          </div>
                       </div>
                   </div>
                   <!--End info box-->


            

                  <div class="col-md-12">
                      <div class="white-box">
                          <h2 class="header-title">Total Booking </h2>
                            <ul class="list-inline text-center m-t-10">
                              <li>
                                <h5><i class="fa fa-circle m-r-5" style="color:#03A9F3;"></i>Booking</h5>
                              </li>
                              <li>
                              </li>
                            </ul>
                            <div id="morris2"  style="height:250px;"></div>
                            
                      </div>
                  </div><!-- /col-md-6-->
                   
                
                  </div>
                  <!--End row-->

                  <div class="row">                    
                     <!-- Start inbox widget-->
                     <div class="col-md-12">
                        <div class="white-box">
                          <a href="<?= base_url(); ?>vehicletype/add" class="btn btn-primary white-box-btn">Add New <i class="mdi mdi-plus"></i></a>
                          <h2 class="header-title">Latest Orders</h2>
                            <div class="table-responsive">
                              <table id="example" class="display table">
                                <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Booking Date</th>
                      <th>Phone No</th>
                      <th>Order Status</th>
                    </tr>
                    </thead>
                                <tbody>
                      <?php $count=1;
                        foreach($lastorders as $booking_listdata){
                      ?>

                     <tr>
                      <td><?php echo output($count); $count++; ?></td>
                      <td><?php echo output($booking_listdata['bk_fname'].' '.$booking_listdata['bk_lname']);?>
                       <td><?php echo output($booking_listdata['bk_date']);?>
                     <td><?php echo output($booking_listdata['bk_phone']);?>
                         </td>  
                        <?php
                        $menu = array('1'=>'Pending','2'=>'Confirmed','3'=>'Cancelled');
                          switch ($booking_listdata['bk_status']) {
                              case 1:
                                  $status = 'Pending';
                                  $class = 'warning';
                                  break;
                              case 2:
                                  $status = 'Confirmed';
                                  $class = 'success';
                                  break;
                              case 3:
                                  $status = 'Cancelled';
                                  $class = 'danger';
                                  break;
                          }
                         ?>
                       <td><span class="badge badge-<?= $class; ?>"><?= $status; ?></span></td>
                     
                     
                    </tr>  
                    
             
              <?php } ?>
                    </tbody>

                              </table>
                            </div>
                                
                        </div>
                       </div>
					<!-- Start inbox widget-->
                   </div>
                   <!--End row-->
			   
			    </div>
        <!-- End Wrapper-->
<input type="hidden" id="phpVar" value='<?php echo $chart; ?>'>
