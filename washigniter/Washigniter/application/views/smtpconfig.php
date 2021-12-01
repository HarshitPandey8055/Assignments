<!--body wrapper start-->
        <div class="wrapper">
              
              <!--Start Page Title-->
               <div class="page-title-box">
                    <h4 class="page-title">SMTP Config</h4>
                    <ol class="breadcrumb">
                      <li>
                          <a href="<?= base_url(); ?>dashboard">Dashboard</a>
                      </li>
                      <li class="active">
                        SMTP Config
                      </li>
                  </ol>
                    <div class="clearfix"></div>
                 </div>
                  <!--End Page Title-->         

           
             <!--Start row-->
             <div class="row">
                 <div class="col-md-12">
                   <div class="white-box">
                     <h2 class="header-title">SMTP Config</h2>

                         <form id="addnewcategory" role="form" action="<?php echo base_url(); ?>settings/smtpconfigsave" method="post" enctype='multipart/form-data'>
                          
                          <div class="form-group">
                            <label class="col-md-2 control-label">Host</label>
                            <div class="col-md-10">
                              <input type="text" class="form-control" required="true" value="<?php echo output(isset($smtpconfig[0]['smtp_host'])?$smtpconfig[0]['smtp_host']:''); ?>" id="smtp_host" name="smtp_host" placeholder="Enter Host">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-2 control-label">SMTPAuth</label>
                            <div class="col-md-10">
                              <select class="form-control" id="smtp_auth" required="true" name="smtp_auth">
                                <option value="">Select SMTPAuth</option>
                                <option <?php echo (isset($smtpconfig[0]['smtp_auth']) && $smtpconfig[0]['smtp_auth']=='true') ? 'selected':'' ?> value="true">True</option>
                                <option <?php echo (isset($smtpconfig[0]['smtp_auth']) && $smtpconfig[0]['smtp_auth']=='false') ? 'selected':'' ?> value="false">False</option>
                              </select>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-2 control-label">Username</label>
                            <div class="col-md-10">
                              <input type="text" class="form-control" required="true" value="<?php echo output(isset($smtpconfig[0]['smtp_uname'])?$smtpconfig[0]['smtp_uname']:''); ?>" id="smtp_uname" name="smtp_uname" placeholder="Enter Username">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-2 control-label">Password</label>
                            <div class="col-md-10">
                              <input type="text" class="form-control" required="true" value="<?php echo output(isset($smtpconfig[0]['smtp_pwd'])?$smtpconfig[0]['smtp_pwd']:''); ?>" id="s_inovicess_prefix" name="smtp_pwd" placeholder="Enter SMTP Password">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-2 control-label">SMTPSecure</label>
                            <div class="col-md-10">
                              <select class="form-control" id="smtp_issecure" required="true" name="smtp_issecure">
                                <option value="">Select SMTP Secure</option>
                                <option <?php echo (isset($smtpconfig[0]['smtp_issecure']) && $smtpconfig[0]['smtp_issecure']=='ssl') ? 'selected':'' ?> value="ssl">SSL</option>
                                <option <?php echo (isset($smtpconfig[0]['smtp_issecure']) && $smtpconfig[0]['smtp_issecure']=='tls') ? 'selected':'' ?> value="tls">TLS</option>
                              </select>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-2 control-label">Port</label>
                            <div class="col-md-10">
                              <input type="text" class="form-control" required="true" value="<?php echo output(isset($smtpconfig[0]['smtp_port'])?$smtpconfig[0]['smtp_port']:''); ?>" id="smtp_port" name="smtp_port" placeholder="Enter Port">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-2 control-label">Email From</label>
                            <div class="col-md-10">
                              <input type="text" class="form-control" required="true" value="<?php echo output(isset($smtpconfig[0]['smtp_emailfrom'])?$smtpconfig[0]['smtp_emailfrom']:''); ?>" id="smtp_emailfrom" name="smtp_emailfrom" placeholder="Enter Email From Address">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-2 control-label">ReplyTo</label>
                            <div class="col-md-10">
                              <input type="text" class="form-control" required="true" value="<?php echo output(isset($smtpconfig[0]['smtp_emailfrom'])?$smtpconfig[0]['smtp_emailfrom']:''); ?>" id="smtp_replyto" name="smtp_replyto" placeholder="Enter ReplyTo">
                            </div>
                          </div>

                          <div class="form-group m-b-0">
                              <div class="col-sm-offset-2 col-sm-9">
                                <button type="submit" class="btn btn-primary">Submit <i class="fa fa-check"></i></button>
                                <button type="button" data-toggle="modal" data-target="#modal-default" class="btn btn-success">Test Email <i class="fa fa-check"></i></button>
                              </div>
                          </div>
                          
                        </form>

                   </div>
                  </div>
              </div>
             <!--End row-->
			   
			    </div>
        <!-- End Wrapper-->

 <div class="modal fade" id="modal-default" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Test SMTP Configuration</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>

          <form action="<?php echo base_url(); ?>settings/smtpconfigtestemail" method="post" >

          <div class="modal-body">

          <div class="row">

           <div class="form-group">
                <label class="col-md-3 control-label">Service Titile</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" value="<?php echo (isset($servicedata)) ? $servicedata[0]['ser_name']:'' ?>" required="true" id="ser_name" name="ser_name" placeholder="Enter Service Titile">
                </div>
              </div>

              </div><!-- roe -->    

          </div>

            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Send Email</button>
            </div>

          </form>

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>