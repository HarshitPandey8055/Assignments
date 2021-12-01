        <!--body wrapper start-->
        <div class="wrapper">
              
          <!--Start Page Title-->
           <div class="page-title-box">
                <h4 class="page-title">Vehicle Type</h4>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?= base_url(); ?>dashboard">Dashboard</a>
                    </li>
                    <li class="active">
                        Vehicle Type
                    </li>
                </ol>
                <div class="clearfix"></div>
             </div>
              <!--End Page Title-->

             
           
               <!--Start row-->
               <div class="row">
                   <div class="col-md-12">
                       <div class="white-box">
                        <a href="<?= base_url(); ?>vehicletype/add" class="btn btn-primary white-box-btn">Add New <i class="mdi mdi-plus"></i></a>
                           <h2 class="header-title">Vehicle Type</h2>
                            <div class="table-responsive">
                             <table id="example" class="display table">
                                    <thead>
                                        <tr>
                                          <th class="percent1">
                                              #
                                          </th>
                                          <th class="percent25">
                                              Vehicle Type
                                          </th>
                                          <th class="percent25">
                                              Image
                                          </th>
                                         
                                          <th class="percent25">
                                              Status
                                          </th>
                                          <th class="percent25">
                                            Action
                                          </th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(!empty($vehicletype)){ 
                                        $count=1;
                                        foreach($vehicletype as $vehicletypedata){
                                        ?>
                                          <tr>
                                              <td>
                                                 <?php echo output($count); $count++; ?>
                                              </td>
                                              <td>
                                                  <a>
                                                      <?php echo output($vehicletypedata['vt_name']);?>
                                                  </a>
                                                  <br>
                                                  <small>
                                                      Created <?php echo output($vehicletypedata['vt_created_date']);?>
                                                  </small>
                                              </td>
                                              <td>
                                                  <ul class="list-inline">
                                                      <li class="list-inline-item">
                                                          <img alt="vehicletype" class="table-avatar" src="<?= base_url(); ?>assets/uploads/<?php echo output($vehicletypedata['vt_image']);?>">
                                                      </li>
                                                      
                                                  </ul>
                                              </td>
                                        
                                              <td>
                                                <?php echo ($vehicletypedata['vt_status']=='1')? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-warning">Inactive</span>';
                                                 ?>
                                                  
                                              </td>
                                              <td >
                                                <?php echo ($vehicletypedata['vt_status']=='1')? '<a class="btn btn-danger btn-sm" href="vehicletype/updatevehicletype/'.$vehicletypedata['vt_id'].'/status/0">
                                                      <i class="fa fa-close">
                                                      </i>
                                                      Deactivate
                                                    </a>' : '<a class="btn btn-success btn-sm" href="vehicletype/updatevehicletype/'.$vehicletypedata['vt_id'].'/status/1">
                                                    <i class="fa fa-check">
                                                      </i>
                                                      Activate
                                                    </a>';
                                                  ?>
                                                    <a class="btn btn-danger btn-sm" href="<?= base_url(); ?>vehicletype/deletevehicletype/<?php echo output($vehicletypedata['vt_id']);?> ">
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