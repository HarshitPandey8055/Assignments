<!--body wrapper start-->
        <div class="wrapper">
              
              <!--Start Page Title-->
               <div class="page-title-box">
                    <h4 class="page-title">Service List</h4>
                    <ol class="breadcrumb">
                      <li>
                          <a href="<?= base_url(); ?>dashboard">Dashboard</a>
                      </li>
                      <li>
                          <a href="<?= base_url(); ?>servicelist">Service List</a>
                      </li>
                      <li class="active">
                        <?php echo (isset($servicedata))?'Edit Service':'Service Add' ?>
                      </li>
                  </ol>
                    <div class="clearfix"></div>
                 </div>
                  <!--End Page Title-->         

                  
           
             <!--Start row-->
             <div class="row">
                 <div class="col-md-12">
                   <div class="white-box">
                     <h2 class="header-title"><?php echo (isset($servicedata))?'Edit Service':'Service Add' ?></h2>

                          <form id="addnewservice" role="form" action="<?php echo base_url();?>servicelist/<?php echo (isset($servicedata))?'updateservice':'add_save'; ?>"  method="post">

                            <?php if(isset($servicedata)) { ?>
                             <input type="hidden" name="ser_id" id="ser_id" value="<?php echo (isset($servicedata)) ? $servicedata[0]['ser_id']:'' ?>" >
                             <?php } ?>
                          
                          <div class="form-group">
                            <label class="col-md-2 control-label">Service Titile</label>
                            <div class="col-md-10">
                              <input type="text" class="form-control" value="<?php echo (isset($servicedata)) ? $servicedata[0]['ser_name']:'' ?>" required="true" id="ser_name" name="ser_name" placeholder="Enter Service Titile">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-2 control-label">Service Description</label>
                            <div class="col-md-10">
                              <input type="text" class="form-control" value="<?php echo (isset($servicedata)) ? $servicedata[0]['ser_desc']:'' ?>" id="ser_desc" name="ser_desc" placeholder="Enter Service Description">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-2 control-label">Service Price</label>
                            <div class="col-md-10">
                              <input type="text" class="form-control" value="<?php echo (isset($servicedata)) ? $servicedata[0]['ser_price']:'' ?>" required="true" id="ser_price" name="ser_price" placeholder="Enter Service Price">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-2 control-label">Approx Service Time</label>
                            <div class="col-md-10">
                              <input type="text" class="form-control" value="<?php echo (isset($servicedata)) ? $servicedata[0]['ser_time']:'' ?>" required="true" id="ser_time" name="ser_time" placeholder="Enter Approx Service Time in Minutes">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-2 control-label">Need to show in frontend service tab</label>
                            <div class="col-md-10">
                              <?php if (isset($servicedata)) {?>
                                <input type="checkbox" id="ser_visibetofrontend" name="ser_visibetofrontend" value="1" <?php echo ($servicedata[0]['ser_visibetofrontend']==1)?'checked="true"':'' ?>>
                              <?php } else {
                                echo '<input type="checkbox" id="ser_visibetofrontend" name="ser_visibetofrontend" value="1" checked="true">';
                              } ?>
                            </div>
                          </div>

                          <div class="form-group m-b-0">
                              <div class="col-sm-offset-2 col-sm-9">
                                <button type="submit" class="btn btn-primary"><?php echo (isset($servicedata))?'Update Service':'Add Service' ?> <i class="fa fa-check"></i></button>
                                <a href="<?= base_url(); ?>servicelist" class="btn btn-danger">Back <i class="fa fa-times"></i></a>
                              </div>
                          </div>
                          
                        </form>
                   </div>
                  </div>
              </div>
             <!--End row-->
			   
			    </div>
        <!-- End Wrapper-->