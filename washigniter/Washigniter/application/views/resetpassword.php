<!--body wrapper start-->
        <div class="wrapper">
              
              <!--Start Page Title-->
               <div class="page-title-box">
                    <h4 class="page-title">Reset Password</h4>
                    <ol class="breadcrumb">
                      <li>
                          <a href="<?= base_url(); ?>dashboard">Dashboard</a>
                      </li>
                      <li class="active">
                        Reset Password
                      </li>
                  </ol>
                    <div class="clearfix"></div>
                 </div>
                  <!--End Page Title-->         

                  
           
             <!--Start row-->
             <div class="row">
                 <div class="col-md-12">
                   <div class="white-box">
                     <h2 class="header-title">Reset Password</h2>

                          <form id="addnewservice" role="form" action="<?= base_url(); ?>resetpassword/resetpasswordsave" method="post">
                          
                          <div class="form-group">
                            <label class="col-md-2 control-label">Username</label>
                            <div class="col-md-10">
                              <input type="text" autocomplete="off" class="form-control" required="true" value="<?= (isset($u_username) && $u_username!='')?$u_username:'' ?>" id="u_username" name="u_username" placeholder="Enter Username">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-2 control-label">Password</label>
                            <div class="col-md-10">
                              <input type="password" class="form-control" required="true" id="password" name="password" placeholder="Enter Password">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-2 control-label">Confirm Password</label>
                            <div class="col-md-10">
                              <input type="password" class="form-control" required="true" id="cnfpassword" name="cnfpassword" placeholder="Enter Confirm Password">
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