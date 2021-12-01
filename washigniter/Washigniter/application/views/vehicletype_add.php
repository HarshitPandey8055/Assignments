<!--body wrapper start-->
        <div class="wrapper">
              
              <!--Start Page Title-->
               <div class="page-title-box">
                    <h4 class="page-title">Vehicle Type</h4>
                    <ol class="breadcrumb">
                      <li>
                          <a href="<?= base_url(); ?>dashboard">Dashboard</a>
                      </li>
                      <li>
                          <a href="<?= base_url(); ?>vehicletype">Vehicle Type</a>
                      </li>
                      <li class="active">
                        Vehicle Type Add
                      </li>
                  </ol>
                    <div class="clearfix"></div>
                 </div>
                  <!--End Page Title-->         

                  
           
             <!--Start row-->
             <div class="row">
                 <div class="col-md-12">
                   <div class="white-box">
                     <h2 class="header-title">Vehicle Type Add</h2>

                          <form id="addnewcategory" role="form" action="add_save" method="post" class="form-horizontal" enctype='multipart/form-data'>
                          
                          <div class="form-group">
                            <label class="col-md-2 control-label">Vehicle Type Name</label>
                            <div class="col-md-10">
                              <input type="text" class="form-control" required="true" id="vt_name" name="vt_name" placeholder="Enter Type Name">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-2 control-label">Vehicle Image</label>
                            <div class="col-md-10">
                              <input type="file" class="form-control" id="file" name="file">
                              <span class="badge badge-success">Image sholud be in 600 X 600px and jpg | jpeg | png format</span>
                            </div>
                          </div>

                          <div class="form-group m-b-0">
                              <div class="col-sm-offset-2 col-sm-9">
                                <button type="submit" class="btn btn-primary">Submit <i class="fa fa-check"></i></button>
                                <a href="<?= base_url(); ?>vehicletype" class="btn btn-danger">Back <i class="fa fa-times"></i></a>
                              </div>
                          </div>
                          
                        </form>
                   </div>
                  </div>
              </div>
             <!--End row-->
			   
			    </div>
        <!-- End Wrapper-->