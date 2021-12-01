<!--body wrapper start-->
        <div class="wrapper">
              
              <!--Start Page Title-->
               <div class="page-title-box">
                    <h4 class="page-title">Reports</h4>
                    <ol class="breadcrumb">
                      <li>
                          <a href="<?= base_url(); ?>dashboard">Dashboard</a>
                      </li>
                      <li class="active">
                        Reports
                      </li>
                  </ol>
                    <div class="clearfix"></div>
                 </div>
                  <!--End Page Title-->         

                
           
             <!--Start row-->
             <div class="row">
                 <div class="col-md-12">
                   <div class="white-box">
                     <h2 class="header-title">Generate Reports</h2>

                        <form id="generatereport" role="form" action="<?= base_url(); ?>reports/generatereport" method="post">
                          
                          <div class="form-group">
                            <label class="col-md-2 control-label">Choose Date</label>
                            <div class="col-md-10">
                              <input type="text" name="reportdate" id="reportdate" class="form-control" placeholder="Choose date">
                            </div>
                          </div>

                          <div class="form-group m-b-0">
                              <div class="col-sm-offset-2 col-sm-9">
                                <button type="submit" class="btn btn-primary">Submit <i class="fa fa-check"></i></button>
                                <a href="<?= base_url(); ?>reports" class="btn btn-danger">Back <i class="fa fa-times"></i></a>
                              </div>
                          </div>
                          
                        </form>

                   </div>
                  </div>
              </div>
             <!--End row-->

                <div class="<?= (empty($reportdata))?'displaynone':''?>">
                      <div class="form-group">
                       <button type="button"  class="printPage btn btn-primary">Print</button>
                      </div>
                    </div>
             
             <div class="row">
               <div class="col-md-12">
                 <div class="white-box <?= (empty($reportdata))?'displaynone':''?>"">
                   <h2 class="header-title <?= (empty($reportdata))?'displaynone':''?>">Reports Details</h2>
           <span id="pp" class="<?= (empty($reportdata))?'displaynone':''?>">
     
          <div class="table-responsive ">
          <table id="example" class="table table-bordered table-striped dataTable " >
              <thead>
                  <tr>
                      <th class="percent1">
                          #
                      </th>
                      <th class="percent15">
                          Name
                      </th>
                      <th class="percent13">
                          Booking Date
                      </th>
                      <th class="percent10">
                          Phone No
                      </th>
                      <th class="percent30">
                         Service
                      </th>
                      <th class="percent15">
                        Order Status
                      </th>
                     
                  </tr>
              </thead>
              <tbody>
                <?php if(!empty($reportdata)){
                 $count=1;
                foreach($reportdata as $booking_listdata){
                ?>
                  <tr>
                      <td><?php echo output($count); $count++; ?></td>
                      <td><?php echo output($booking_listdata['bk_fname']);?>
                         <br>
                          <small>
                               <?php echo output($booking_listdata['bk_lname']);?>
                          </small>
                      </td>
                       <td><?php echo output($booking_listdata['bk_date']);?></td>
                      <td><?php echo output($booking_listdata['bk_phone']);?></td>
                         <td>
                          <a>
                              <?php echo output($booking_listdata['bk_cat_name']);?>
                          </a>
                          <br>
                          <small>
                              Created <?php echo output($booking_listdata['bk_ser_name']);?>
                          </small>
                      </td>
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
                        <span class="badge badge-<?= $class; ?>"><?= $status; ?></span>
                      </td>
                     
                  </tr>
              <?php } } ?>
              </tbody>
          </table>
         </div>
        </div>
        <!-- /.card-body -->
      </div>

       </span>
             </div>
			     <div class="alert alert-warning alert-dismissible  <?= (empty($reportdata))?'':'displaynone'?>">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Please choose date to make report
                  </div>
          </div>
        <!-- End Wrapper-->