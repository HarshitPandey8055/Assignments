        <!--body wrapper start-->
        <div class="wrapper">
              
          <!--Start Page Title-->
           <div class="page-title-box">
                <h4 class="page-title">Payments</h4>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?= base_url(); ?>dashboard">Dashboard</a>
                    </li>
                    <li class="active">
                        Payments
                    </li>
                </ol>
                <div class="clearfix"></div>
             </div>
              <!--End Page Title-->

             
           
               <!--Start row-->
               <div class="row">
                   <div class="col-md-12">
                       <div class="white-box">
                           <h2 class="header-title">Payments List</h2>
                            <div class="table-responsive">
                             <table id="example" class="display table">
                                    <thead>
                                      <tr>
                                          <th class="percent1" >
                                              #
                                          </th>
                                          <th class="percent1">
                                              Booking ID
                                          </th>
                                          <th class="percent15">
                                              Name
                                          </th>
                                           <th class="percent20">
                                              Email
                                          </th>
                                          <th class="percent13">
                                              Amount
                                          </th>
                                          <th class="percent10">
                                              Txn ID
                                          </th>
                                          <th class="percent10">
                                             Status
                                          </th>
                                          
                                          <th class="percent20">
                                            Date
                                          </th>
                                      </tr>
                                  </thead>
                                    <tbody>
                                      <?php if(!empty($pylist)){ 

                                       $count=1;
                                      foreach($pylist as $pylistdata){
                                      ?>
                                        <tr>
                                            <td><?php echo output($count); $count++; ?></td>
                                            <td><?php echo output('BKID'.$pylistdata['bk_id']);?>
                                            <td><?php echo output($pylistdata['bk_fname']);?>
                                               <br>
                                                <small>
                                                     <?php echo output($pylistdata['bk_lname']);?>
                                                </small>
                                            </td>
                                             <td><?php echo output($pylistdata['bk_email']);?>
                                             <td><?php echo output($pylistdata['paid_amount']);?></td>
                                            <td><?php echo output($pylistdata['txn_id']);?>
                                              <?php if($pylistdata['payment_status']=='Completed' && $pylistdata['txn_id']!='cash'  && $pylistdata['txn_id']!='bank transfer') 
                                                    { 
                                                      echo '(Paypal)'; 
                                                    } elseif($pylistdata['payment_status']=='succeeded') {
                                                      echo '(Stripe)'; 
                                                    } ?> 

                                            </td>
                                             <td><?php echo output($pylistdata['payment_status']);?></td>  
                                              <td><?php echo output($pylistdata['created']);?></td>  
                                                
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