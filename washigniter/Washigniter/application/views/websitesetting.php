<!--body wrapper start-->
        <div class="wrapper">
              
              <!--Start Page Title-->
               <div class="page-title-box">
                    <h4 class="page-title">Website Setting</h4>
                    <ol class="breadcrumb">
                      <li>
                          <a href="<?= base_url(); ?>dashboard">Dashboard</a>
                      </li>
                      <li class="active">
                        Website Setting
                      </li>
                  </ol>
                    <div class="clearfix"></div>
                 </div>
                  <!--End Page Title-->         

                  
           
             <!--Start row-->
             <div class="row">
                 <div class="col-md-12">
                   <div class="white-box">
                     <h2 class="header-title">Website Setting</h2>

                           <form id="addnewcategory" role="form" action="<?= base_url(); ?>settings/websitesetting_save" method="post" enctype='multipart/form-data'>
                          
                          <div class="form-group">
                            <label class="col-md-2 control-label">Website Name</label>
                            <div class="col-md-10">
                              <input type="text" class="form-control" required="true" value="<?php echo output(isset($website_setting[0]['webiste_name'])?$website_setting[0]['webiste_name']:''); ?>" id="website_name" name="website_name" placeholder="Enter Website Name">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-2 control-label">Frontend Settings</label>
                            <div class="col-md-10">
                              <div>
                                <input type="radio" name="frontend_show" id="frontend_show1" value="1" <?php echo output((isset($website_setting[0]['frontend_show']) && $website_setting[0]['frontend_show']==1)?'checked="true"':''); ?>>
                                <label for="frontend_show1">Show Package Alone</label>
                              </div>
                              <div>
                                <input type="radio" name="frontend_show" id="frontend_show2" value="2" <?php echo output((isset($website_setting[0]['frontend_show']) && $website_setting[0]['frontend_show']==2)?'checked="true"':''); ?>>
                                <label for="frontend_show2">Show Service List Alone</label>
                              </div>
                              <div>
                                <input type="radio" name="frontend_show" id="frontend_show3" value="3" <?php if($website_setting[0]['frontend_show']==3) { echo 'checked="true"'; } ?>>
                                <label for="frontend_show3">Show Both</label>
                              </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-2 control-label">Choose Logo</label>
                            <div class="col-md-10">
                              <input type="file" class="form-control" id="file" name="file">
                              <span class="badge badge-success">Image sholud be in 250 X 50px and png format</span>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-2 control-label">Website Logo</label>
                            <div class="col-md-3">
                              <?php if($website_setting[0]['logo']!='') { ?>
                                 <img src = "<?= base_url().'assets/uploads/'.$website_setting[0]['logo']; ?>" alt = "Website Log" class="w-100 mb-10px">
                                  <button type="button" class="logodelete btn btn-danger">Delete <i class="fa fa-times"></i></button>
                               <?php } ?>
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