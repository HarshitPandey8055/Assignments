<!--body wrapper start-->
        <div class="wrapper">
              
              <!--Start Page Title-->
               <div class="page-title-box">
                    <h4 class="page-title">Packages</h4>
                    <ol class="breadcrumb">
                      <li>
                          <a href="<?= base_url(); ?>dashboard">Dashboard</a>
                      </li>
                      <li>
                          <a href="<?= base_url(); ?>vehicletype">Packages</a>
                      </li>
                      <li class="active">
                        Packagese Add
                      </li>
                  </ol>
                    <div class="clearfix"></div>
                 </div>
                  <!--End Page Title-->         

                  
             <!--Start row-->
             <div class="row">
                 <div class="col-md-12">
                   <div class="white-box">
                     <h2 class="header-title"><?php echo (isset($packagedata))?'Edit Package':'Package Add' ?></h2>

                          <form id="addnewservice" role="form" action="<?php echo base_url();?>packages/<?php echo (isset($packagedata))?'updatepackage':'add_save'; ?>"  method="post">

                            <?php if(isset($packagedata)) { ?>
                           <input type="hidden" name="p_id" id="p_id" value="<?php echo (isset($packagedata)) ? $packagedata[0]['p_id']:'' ?>" >
                           <?php } ?>
                          
                          <div class="form-group">
                            <label class="col-md-2 control-label">Vehicle Type</label>
                            <div class="col-md-10">
                              <select name="p_vt_id" id="p_vt_id" class="form-control">
                                  <option value="">Select Vehicle type</option>
                               <?php foreach ($vehicletype as $vehiclety){
                              ?>
                                <option  <?php if((isset($vehicletype)) && $vehicletype[0]['vt_id'] == $vehiclety['vt_id']){ echo 'selected';} ?> value="<?php echo output($vehiclety["vt_id"]);?>"><?php echo output($vehiclety["vt_name"]);?></option>       
                              <?php
                                } ?>
                              </select>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-2 control-label">Package Title</label>
                            <div class="col-md-10">
                              <input type="text" class="form-control" value="<?php echo (isset($packagedata)) ? $packagedata[0]['p_name']:'' ?>" required="true" id="p_name" name="p_name" placeholder="Enter Package Title">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-2 control-label">Package Price</label>
                            <div class="col-md-10">
                              <input type="number" class="form-control" value="<?php echo (isset($packagedata)) ? $packagedata[0]['p_price']:'' ?>" required="true" id="p_price" name="p_price" placeholder="Enter Package Price">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-2 control-label">Approx Package Time</label>
                            <div class="col-md-10">
                              <input type="text" class="form-control" value="<?php echo (isset($packagedata)) ? $packagedata[0]['p_time']:'' ?>" required="true" id="p_time" name="p_time" placeholder="Enter Approx Package Time in Minutes">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-2 control-label">Services</label>
                            <div class="col-md-10">
                              <select name="p_s_list[]" id="p_s_list" class="form-control" multiple data-live-search="true" required="true">
                               <?php foreach ($serviceslist as $services){
                              ?>
                                <option <?php if(isset($packagedata)) { echo ((preg_match('/\b' . $services['ser_id'] . '\b/', $packagedata[0]['p_s_list'])))?'selected':''; }  ?> value="<?php echo output($services["ser_id"]);?>"><?php echo output($services["ser_name"]);?></option>       
                              <?php
                                } ?>
                              </select>
                            </div>
                          </div>

                          <div class="form-group m-b-0">
                              <div class="col-sm-offset-2 col-sm-9">
                                <button type="submit" class="btn btn-primary"><?php echo (isset($packagedata))?'Update Package':'Add Package' ?> <i class="fa fa-check"></i></button>
                                <a href="<?= base_url(); ?>packages" class="btn btn-danger">Back <i class="fa fa-times"></i></a>
                              </div>
                          </div>
                          
                        </form>
                   </div>
                  </div>
              </div>
             <!--End row-->
			   
			    </div>
        <!-- End Wrapper-->