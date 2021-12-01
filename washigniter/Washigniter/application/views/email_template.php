        <!--body wrapper start-->
        <div class="wrapper">
              
          <!--Start Page Title-->
           <div class="page-title-box">
                <h4 class="page-title">Email Template</h4>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?= base_url(); ?>dashboard">Dashboard</a>
                    </li>
                    <li class="active">
                        Service List
                    </li>
                </ol>
                <div class="clearfix"></div>
             </div>
              <!--End Page Title-->

            

           
               <!--Start row-->
               <div class="row">
                   <div class="col-md-12">
                       <div class="white-box">
                           <h2 class="header-title">Service List</h2>
                            <div class="table-responsive">
                             <table id="example" class="display table">
                                    <thead>
                                        <tr>
                                          <th class="w-1">S.No</th>
                                          <th>Name</th>
                                          <th>Template Content</th>
                                          <th>Action</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <?php if(!empty($emailtemplate)){ 
                                       $count=1;
                                          foreach($emailtemplate as $emailtemplates){
                                          ?>
                                       <tr>
                                          <td> <?php echo output($count); $count++; ?></td>
                                          <td> <?php echo output($emailtemplates['et_name']); ?></td>
                                          <td> <?php echo output($emailtemplates['et_body']); ?></td>
                                          <td>
                                             <a class="btn btn-primary white-box-btn" href="<?php echo base_url(); ?>settings/edit_email_template/<?php echo output($emailtemplates['et_id']); ?>">
                                             <i class="fa fa-edit"></i>
                                             </a>
                                          </td>
                                       </tr>
                                       <?php } } ?>
                                    </tbody>
                                   </table>  
                            </div>
                       </div>
                   </div>
               </div>
               <!--End row-->
               
			    </div>
        <!-- End Wrapper-->