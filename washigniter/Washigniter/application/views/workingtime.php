<!--body wrapper start-->
        <div class="wrapper">
              
              <!--Start Page Title-->
               <div class="page-title-box">
                    <h4 class="page-title">Working Time</h4>
                    <ol class="breadcrumb">
                      <li>
                          <a href="<?= base_url(); ?>dashboard">Dashboard</a>
                      </li>
                      <li class="active">
                        Working Time
                      </li>
                  </ol>
                    <div class="clearfix"></div>
                 </div>
                  <!--End Page Title-->         

                 
           
             <!--Start row-->
             <div class="row">
                 <div class="col-md-12">
                   <div class="white-box">
                     <h2 class="header-title">Working Time</h2>

                          <form id="addnewservice" role="form" action="<?= base_url(); ?>settings/workingtime" method="post">
                          
                          <div class="form-group">
                            <label class="col-md-2 control-label">Time From</label>
                            <div class="col-md-10">
                              <input type="text" id="wrkingfromtime" value="<?php echo output(isset($workingtime[0]['time_from'])?$workingtime[0]['time_from']:''); ?>" name="wrkingfromtime" required="true" class="form-control">
                              <span class="badge badge-success">AM</span>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-2 control-label">Time To</label>
                            <div class="col-md-10">
                              <input type="text" id="wrkingtotime" value="<?php echo output(isset($workingtime[0]['time_to'])?$workingtime[0]['time_to']:''); ?>" name="wrkingtotime" required="true" class="form-control">
                              <span class="badge badge-success">PM</span>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-2 control-label">Interval</label>
                            <div class="col-md-10">
                              <input type="text" id="diff" required="true" value="<?php echo output(isset($workingtime[0]['diff'])?$workingtime[0]['diff']:'30'); ?>" name="diff" class="form-control">
                            </div>
                          </div>

                          <div class="form-group m-b-0">
                              <div class="col-sm-offset-2 col-sm-9">
                                <button type="submit" class="btn btn-primary">Submit <i class="fa fa-check"></i></button>
                              </div>
                          </div>
                          
                        </form>

                   </div>
                  </div>
              </div>
             <!--End row-->
			   
			    </div>
        <!-- End Wrapper-->