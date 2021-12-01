        <!--body wrapper start-->
        <div class="wrapper">
              
          <!--Start Page Title-->
           <div class="page-title-box">
                <h4 class="page-title">Packages</h4>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?= base_url(); ?>dashboard">Dashboard</a>
                    </li>
                    <li class="active">
                        Packages
                    </li>
                </ol>
                <div class="clearfix"></div>
             </div>
              <!--End Page Title-->


               <!--Start row-->
               <div class="row">
                   <div class="col-md-12">
                       <div class="white-box">
                        <a href="<?= base_url(); ?>packages/add" class="btn btn-primary white-box-btn">Add New <i class="mdi mdi-plus"></i></a>
                           <h2 class="header-title">Packages</h2>
                            <div class="table-responsive">
                             <table id="example" class="display table">
                                    <thead>
                                    <tr>
                                        <th class="percent1">
                                            #
                                        </th>
                                       
                                        <th class="percent25">
                                            Package Name
                                        </th>
                                         <th class="percent25">
                                            Vehicle Type
                                        </th>
                                         <th class="percent5">
                                            Services
                                        </th>

                                        <th class="percent5">
                                            Price
                                        </th>
                                        <th class="percent5">
                                            Time
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
                                      <?php if(!empty($pk)){ $count=1;
                                      foreach($pk as $package){
                                      ?>
                                        <tr>
                                            <td>
                                               <?php echo output($count); $count++; ?>
                                            </td>
                                            

                                            <td>
                                                <a>
                                                    <?php echo output($package['p_name']);?>
                                                </a>
                                                <br>
                                                <small>
                                                    Created On : <?php echo output($package['p_created_date']);?>
                                                </small>
                                            </td>
                                           <td><?php echo output($package['vt_name']);?></td>
                                           <td style="width: 20%;"><?php echo output(implode(",", array_column($package['service_list'], "ser_name")));?></td>
                                             <td><?php echo output($package['p_price']);?></td>
                                            <td><?php echo output($package['p_time']);?></td>


                                            <td>
                                              <?php echo ($package['p_status']=='1')? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-warning">Inactive</span>';
                                               ?>
                                            </td>
                                            <td >
                                              <?php echo ($package['p_status']=='1')? '<a class="btn btn-danger btn-sm" href="packages/updatepackage_list/'.$package['p_id'].'/status/0">
                                              <i class="fa fa-times">
                                                    </i>
                                                    Deactivate
                                                  </a>' : '<a class="btn btn-success btn-sm" href="packages/updatepackage_list/'.$package['p_id'].'/status/1">
                                                  <i class="fa fa-check">
                                                    </i>
                                                    Activate
                                                  </a>';
                                                ?>
                                                <a class="btn btn-info btn-sm" href="packages/editpackage/<?php echo output($package['p_id']);?> ">
                                                    <i class="fa fa-edit">
                                                    </i>
                                                  </a>

                                                  <a class="btn btn-danger btn-sm" href="packages/deletepackage_list/<?php echo output($package['p_id']);?> ">
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