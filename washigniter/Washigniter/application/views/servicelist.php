        <!--body wrapper start-->
        <div class="wrapper">
              
          <!--Start Page Title-->
           <div class="page-title-box">
                <h4 class="page-title">Service List</h4>
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
                        <a href="<?= base_url(); ?>servicelist/add" class="btn btn-primary white-box-btn">Add New <i class="mdi mdi-plus"></i></a>
                           <h2 class="header-title">Service List</h2>
                            <div class="table-responsive">
                             <table id="example" class="display table">
                                    <thead>
                                        <tr>
                                            <th class="percent1">
                                                #
                                            </th>
                                           
                                            <th class="percent25">
                                                Service Name
                                            </th>
                                            <th class="percent30">
                                                Service Description
                                            </th>
                                            <th class="percent5">
                                                Price
                                            </th>
                                            <th class="percent5">
                                                Service Tab
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
                                    <?php if(!empty($service_list)){ $count=1;
                                    foreach($service_list as $service_listdata){
                                    ?>
                                      <tr>
                                          <td>
                                             <?php echo output($count); $count++; ?>
                                          </td>
                                          

                                          <td>
                                              <a>
                                                  <?php echo output($service_listdata['ser_name']);?>
                                              </a>
                                              <br>
                                              <small>
                                                  Created <?php echo output($service_listdata['ser_created_date']);?>
                                              </small>
                                          </td>

                                           <td><?php echo output($service_listdata['ser_desc']);?></td>
                                          <td><?php echo output($service_listdata['ser_price']);?></td>
                                           <td> <?php echo ($service_listdata['ser_visibetofrontend']=='1')? '<span class="badge badge-success">Available</span>' : '<span class="badge badge-warning">Not Available</span>';
                                             ?>
                                          </td>
                                          <td>
                                            <?php echo ($service_listdata['ser_status']=='1')? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-warning">Inactive</span>';
                                             ?>
                                          </td>
                                          <td >
                                            <?php echo ($service_listdata['ser_status']=='1')? '<a class="btn btn-danger btn-sm" href="servicelist/updateservice_list/'.$service_listdata['ser_id'].'/status/0">
                                            <i class="fa fa-times">
                                                  </i>
                                                  Deactivate
                                                </a>' : '<a class="btn btn-success btn-sm" href="servicelist/updateservice_list/'.$service_listdata['ser_id'].'/status/1">
                                                <i class="fa fa-check">
                                                  </i>
                                                  Activate
                                                </a>';
                                              ?>
                                              <a class="btn btn-info btn-sm" href="servicelist/editservice/<?php echo output($service_listdata['ser_id']);?> ">
                                                  <i class="fa fa-edit">
                                                  </i>
                                                </a>

                                                <a class="btn btn-danger btn-sm" href="servicelist/deleteservice_list/<?php echo output($service_listdata['ser_id']);?> ">
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