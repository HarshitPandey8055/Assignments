<!--body wrapper start-->
        <div class="wrapper">
              
              <!--Start Page Title-->
               <div class="page-title-box">
                    <h4 class="page-title">Edit Email Template</h4>
                    <ol class="breadcrumb">
                      <li>
                          <a href="<?= base_url(); ?>dashboard">Dashboard</a>
                      </li>
                      <li>
                          <a href="<?= base_url(); ?>settings/email_template">Email Template</a>
                      </li>
                      <li class="active">
                        Edit Email Template
                      </li>
                  </ol>
                    <div class="clearfix"></div>
                 </div>
                  <!--End Page Title-->         

           
             <!--Start row-->
             <div class="row">
                 <div class="col-md-12">
                   <div class="white-box">
                     <h2 class="header-title">Edit Email Template</h2>

                         <form id="addnewcategory" role="form" action="<?php echo base_url(); ?>settings/update_template" method="post" enctype='multipart/form-data'>

                          <input type="hidden" required="true" class="form-control" value="<?php echo output(isset($emailtemplate[0]['et_id'])?$emailtemplate[0]['et_id']:''); ?>" id="et_id" name="et_id" >
                          
                          <div class="form-group">
                            <label class="col-md-2 control-label">Name</label>
                            <div class="col-md-10">
                              <input type="text" class="form-control" required="true" value="<?php echo output(isset($emailtemplate[0]['et_name'])?$emailtemplate[0]['et_name']:''); ?>" id="et_name" name="et_name" placeholder="Enter Name">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-2 control-label">Content</label>
                            <div class="col-md-10">
                              <textarea class="form-control" rows="20" id="et_body" name="et_body" placeholder="Email content"><?php echo output(isset($emailtemplate[0]['et_body'])?$emailtemplate[0]['et_body']:''); ?></textarea>
                              <span class="badge badge-success">Note: Please user "p" tag for each new line.</span>
                            </div>
                          </div>

                          <div class="form-group m-b-0">
                              <div class="col-sm-offset-2 col-sm-9">
                                <button type="submit" class="btn btn-primary">Update <i class="fa fa-check"></i></button>
                                <a href="<?= base_url(); ?>settings/email_template" class="btn btn-danger">Back <i class="fa fa-times"></i></a>
                              </div>
                          </div>
                          
                        </form>

                   </div>
                  </div>
              </div>
             <!--End row-->
			   
			    </div>
        <!-- End Wrapper-->