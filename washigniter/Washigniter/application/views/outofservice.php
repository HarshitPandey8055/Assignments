        <!--body wrapper start-->
        <div class="wrapper">
              
          <!--Start Page Title-->
           <div class="page-title-box">
                <h4 class="page-title">Out of Service</h4>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?= base_url(); ?>dashboard">Dashboard</a>
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
                        <a href="<?= base_url(); ?>outofservice/add" class="btn btn-primary white-box-btn">Add New <i class="mdi mdi-plus"></i></a>
                           <h2 class="header-title">Out of Service List</h2>
                            <div class="table-responsive">
                             <table id="example" class="display table">
                                    <thead>
                                        <tr>
                                            <th class="percent10">
                                                #
                                            </th>
                                            <th class="percent40">
                                              Date
                                            </th>
                                            <th class="percent5">
                                                Status
                                            </th>
                                            <th class="percent20">
                                              Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php if(!empty($outofservice_list)){
                                      $count=1;
                                      foreach($outofservice_list as $outofservice_listdata){
                                      ?>
                                        <tr>
                                            <td>
                                               <?php echo output($count); $count++; ?>
                                            </td>
                                             <td><?php echo output($outofservice_listdata['oos_srtdate']);?></td>
                                            <td>
                                              <?php echo ($outofservice_listdata['oos_status']=='1')? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-warning">Inactive</span>';
                                               ?>
                                            </td>
                                            <td >
                                              <?php echo ($outofservice_listdata['oos_status']=='1')? '<a class="btn btn-danger btn-sm" href="outofservice/updateoutofservice/'.$outofservice_listdata['oos_id'].'/status/0">
                                              <i class="fa fa-times">
                                                    </i>
                                                    Deactivate
                                                  </a>' : '<a class="btn btn-success btn-sm" href="outofservice/updateoutofservice/'.$outofservice_listdata['oos_id'].'/status/1">
                                                  <i class="fa fa-check">
                                                    </i>
                                                    Activate
                                                  </a>';
                                                ?>
                                                  <a class="btn btn-danger btn-sm" href="outofservice/deleteoutofservice/<?php echo output($outofservice_listdata['oos_id']);?> ">
                                                    <i class="fa fa-trash">
                                                    </i>
                                                    
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