        <!--body wrapper start-->
        <div class="wrapper">
              
          <!--Start Page Title-->
           <div class="page-title-box">
                <h4 class="page-title">Bookings</h4>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?= base_url(); ?>dashboard">Dashboard</a>
                    </li>
                    <li class="active">
                        Bookings
                    </li>
                </ol>
                <div class="clearfix"></div>
             </div>
              <!--End Page Title-->

             
           
               <!--Start row-->
               <div class="row">
                   <div class="col-md-12">
                       <div class="white-box">
                           <h2 class="header-title">Bookings List</h2>
                            <div class="table-responsive">
                             <table id="example" class="display table">
                                    <thead>
                                      <tr>
                                          <th class="percent1" >
                                              ID
                                          </th>
                                          <th class="percent10">
                                              Name
                                          </th>
                                          <th class="percent10">
                                              Booking Date
                                          </th>
                                        
                                          <th class="percent30">
                                             Service
                                          </th>
                                           <th class="percent10">
                                            Payment Status
                                          </th>
                                           <th class="percent15">
                                            Email                      
                                          </th>
                                          <th class="percent10">
                                          Email                                          
                                        </th>
                                          <th class="percent10">
                                            #
                                          </th>
                                      </tr>
                                  </thead>
                                    <tbody>
                                      <?php if(!empty($booking_list)){ 
                                      

                                       $count=1;
                                      foreach($booking_list as $booking_listdata){
                                      ?>
                                        <tr>
                                             <td><?php echo output('BKID'.$booking_listdata['bk_id']);?>
                                            <td><?php echo output($booking_listdata['bk_fname']);?>
                                               <br>
                                                <small>
                                                     <?php echo output($booking_listdata['bk_lname']);?>
                                                </small>
                                            </td>
                                             <td><?php echo output($booking_listdata['bk_date']);?></td>
                                               <td>
                                                <a>
                                                    <?php echo output($booking_listdata['bk_cat_name']);?>
                                                </a>
                                                <?php if(isset($booking_listdata['bk_ser_name']) && $booking_listdata['bk_ser_name']!='') { ?>
                                                <br>
                                                <small>
                                                    <b>Service : </b> <?php echo output($booking_listdata['bk_ser_name']);?>
                                                </small>
                                                 <?php  } ?>
                                                 
                                                  <?php if(isset($booking_listdata['bk_pkage_name']) && $booking_listdata['bk_pkage_name']!='') { ?>
                                                <br>
                                                 <small>
                                                    <b>Package : </b> <?php $CI =& get_instance();
                                                    $CI->db->from('packages');
                                                    $CI->db->where('p_id',$booking_listdata['bk_pkage_name']);
                                                    $query = $CI->db->get();


                                                    if($query->num_rows() > 0 ) {
                                                      echo $query->result_array()[0]['p_name'];
                                                    } else {
                                                      echo '-';
                                                    } ?>
                                                </small>
                                              <?php  } ?>
                                            </td>
                                            <td><?= ($booking_listdata['payment_status']=='succeeded' || $booking_listdata['payment_status']=='Completed')?'<span class="right badge badge-success">Success</span>':'<span class="right badge badge-danger">Failed</span>'?></td>
                                            <td>
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
                                             <div class="btn-group">
                                               <select id="" class="bookingstatuschge form-control text-<?= $class ?>">
                                               <?php foreach ($menu as $key => $menulist) { ?>
                                                             <option <?= ($key==$booking_listdata['bk_status'])?'selected="selected"':'' ?> 
                                                             value="bookings/updatebookings/<?= $booking_listdata['bk_id'] ?>/<?=$key ?>"><?= $menulist ?></option>
                                                <?php } 
                                                ?>
                                                  </select>
                                          </div>
                                           <td>
                                            <?php if($booking_listdata['bk_confirm_email']==0) { ?>
                                            <?= ($booking_listdata['bk_status']==2)?'<a href="bookings/sendemailconfirmation/email/'.urlencode(output($booking_listdata["bk_email"])).'/bk_id/'.output($booking_listdata["bk_id"]).'"><button type="button" class="btn btn-block btn-outline-info btn-sm">Email</button></a>':'-' ?>
                                            <?php } else { echo 'Sent';} ?>
                                             </td>
                                            </td>
                                                <td>

                                                  <button class="btn btn-info" data-toggle="modal" data-target="#modal-normal<?php echo output($booking_listdata['bk_id']);?>" type="button"> <i class="fa fa-eye"></i></button>
                                                  <?php if($booking_listdata['payment_status']=='succeeded' || $booking_listdata['payment_status']=='Completed') { ?>
                                                  <a target="_new" href="<?= base_url(); ?>invoice/print/<?php echo $booking_listdata['bk_id']; ?>" class="btn btn-success"> <i class="fa fa-print"></i></a>
                                                <?php } else { ?>
                                                  <a href="#" class="disabled btn btn-success"> <i class="fa fa-print"></i></a>
                                                <?php } ?>
                                          </td>
                                        </tr>
                                        <!-- Normal Modal -->
                              <div id="modal-normal<?php echo output($booking_listdata['bk_id']);?>" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                              
                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Booking Info - <?php echo output($booking_listdata['bk_fname']);?></h4>
                                    </div>
                                   <div class="modal-body">
                                        <div class="card-body">
                                          <div class="row">
                                    <div class="col-md-6">
                                      <div class="card">
                                        <div class="card-header">
                                          <h4 class="card-title">
                                          <strong><i class="fa fa-user mr-1"></i> User Informations</strong>

                                          </h4>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                           <p class="text-muted bkname"><b>Name : </b></p>
                                          <p class="text-muted bkemail"><b>Email : </b></p>
                                          <p class="text-muted bkphone"><b>Phone : </b></p>
                                          <p class="text-muted bkaddress"><b>Address : </b></p>
                                        </div>
                                        <!-- /.card-body -->
                                      </div>
                                      <!-- /.card -->
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-md-6">
                                      <div class="card">
                                        <div class="card-header">
                                          <h4 class="card-title">
                                             <strong><i class="fa fa-book mr-1"></i> Booking Information</strong>
                                          </h4>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body clearfix">
                                         <p class="text-muted bk_date"><b>Date : </b>2021-04-18 09:46:53</p>
                                          <p class="text-muted bk_cat_name"><b>Category: </b></p>
                                          <p class="text-muted bk_ser_name"><b>Service : </b>null</p>
                                          <p class="text-muted bk_status"><b>Status : </b>Pending</p>
                                        </div>
                                        <!-- /.card-body -->
                                      </div>
                                      <!-- /.card -->
                                    </div>
                                    <!-- ./col -->
                                  </div>  
                                         

                                          <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                                          <p class="text-muted bknotes mb-0"></p>
                                        
                                        </div>
                                      </div><!-- modal-body - end modal content -->

                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>
                                  </div>
                              
                                </div>
                              </div>
                               <!-- END Normal Modal -->
                                    <?php } } ?>
                                    </tbody>
                                   </table>
                            </div>

                       </div>
                   </div>
               </div>
               <!--End row-->
               
			    </div>
        <!-- End Wrapper-->