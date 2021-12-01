<!--body wrapper start-->
        <div class="wrapper">
              
              <!--Start Page Title-->
               <div class="page-title-box">
                    <h4 class="page-title">Out of Service</h4>
                    <ol class="breadcrumb">
                      <li>
                          <a href="<?= base_url(); ?>dashboard">Dashboard</a>
                      </li>
                      <li>
                          <a href="<?= base_url(); ?>servicelist">Service</a>
                      </li>
                      <li class="active">
                        Out of Service
                      </li>
                  </ol>
                    <div class="clearfix"></div>
                 </div>
                  <!--End Page Title-->         

            
             <!--Start row-->
             <div class="row">
                 <div class="col-md-12">
                   <div class="white-box">
                     <h2 class="header-title">Out of Service Add</h2>

                        <form id="addnewservice" role="form" action="add_save" method="post" class="form-horizontal">
                          
                          <div class="form-group">
                            <label class="col-md-2 control-label">Choose Date</label>
                            <div class="col-md-10">
                              <input type="text" class="form-control" required="true" id="oos_srtdate" name="oos_srtdate" placeholder="Enter Choose Date">
                            </div>
                          </div>

                          <div class="form-group m-b-0">
                              <div class="col-sm-offset-2 col-sm-9">
                                <button type="submit" class="btn btn-primary">Submit <i class="fa fa-check"></i></button>
                                <a href="<?= base_url(); ?>outofservice" class="btn btn-danger">Back <i class="fa fa-times"></i></a>
                              </div>
                          </div>
                          
                        </form>

                   </div>
                  </div>
              </div>
             <!--End row-->
			   
			    </div>
        <!-- End Wrapper-->