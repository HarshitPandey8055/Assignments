
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="assets/images/favicon.png" type="image/png">
  <title><?php echo $sitedata['webiste_name'].' - Invoice'; ?></title>
    <link href="<?= base_url(); ?>assets/css/icons.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/responsive.css" rel="stylesheet">
    
 

</head>



        <!--body wrapper start-->
        <div class="wrapper">
   
                  
                <!--Start row-->  
                <div class="row">
                   <div class="col-md-12">
                      <div class="white-box">
                          <h3><b>INVOICE</b> <span class="pull-right">#<?php echo substr(strtoupper($sitedata['webiste_name']),0,2).$booking_list['bk_id']; ?></span></h3>
                          <hr>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="pull-left">
                         
                          <h3> <strong><?php echo $sitedata['webiste_name']; ?></strong></h3>
                        
                         
                        </div>
                        <div class="pull-right text-right">
                          
                          <h3>To,</h3>
                          <h4 class="font-bold"><?php echo $booking_list['bk_fname'] .' '.$booking_list['bk_lname']; ?></h4>
                          <p class="text-muted m-l-30"><?php echo $booking_list['bk_address']; ?> <br>
                            <?php echo $booking_list['bk_email']; ?> <br>
                           <?php echo $booking_list['bk_phone']; ?> <br>
                            </p>
                         
                          
                        </div>
                      </div>
                    </div>
                      <div class="col-lg-12">
                        <div class="table-responsive m-t-40">
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                <th class="text-center">#</th>
                                <th>Category</th>
                                <th class="text-center">Service</th>
                                <th class="text-center">Total</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td class="text-center">1</td>
                                <td><?php echo $booking_list['bk_cat_name']; ?></td>
                                <td class="text-center"><?php echo $booking_list['bk_ser_name']; ?> </td>
                                <td class="text-center"> <?php echo $booking_list['bk_amt']; ?> </td>
                              </tr>
                              
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="pull-right m-t-30 text-right">
                          <hr>
                          <h3><b>Total :</b> <?php echo $booking_list['paid_amount_currency']; ?><?php echo $booking_list['bk_amt']; ?></h3>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="text-right">
                          <button onclick="javascript:window.print();" class="btn btn-warning btn-outline" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
                        </div>
                      </div>
                    </div>
          </div>
                    </div>
                </div>
                <!--End row-->
                  
          </div>
        <!-- End Wrapper-->

