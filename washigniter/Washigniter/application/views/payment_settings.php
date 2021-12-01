<!--body wrapper start-->
        <div class="wrapper">
              
              <!--Start Page Title-->
               <div class="page-title-box">
                    <h4 class="page-title">Payment Settings</h4>
                    <ol class="breadcrumb">
                      <li>
                          <a href="<?= base_url(); ?>dashboard">Dashboard</a>
                      </li>
                      <li class="active">
                        Payment Settings
                      </li>
                  </ol>
                    <div class="clearfix"></div>
                 </div>
                  <!--End Page Title-->         

                
           
             <!--Start row-->
             <div class="row">
                 <div class="col-md-12">
                   <div class="white-box">

                     <div class="panel-group accordion-main faq-main" id="accordion">



                           <div class="panel">
                               <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" data-target="#collapseOne" aria-expanded="true">
                              <h6 class="panel-title accordion-toggle">
                                  Stripe
                              </h6>
                            </div>
                        <div id="collapseOne" class="panel-collapse collapse in" aria-expanded="true" style="">
                                <div class="panel-body">
                                    <p>

                            <form id="addnewservice" role="form" action="<?= base_url(); ?>settings/payment_settings_save" method="post">
                              
                              <div class="form-group">
                                <label class="col-md-2 control-label">Status</label>
                                <div class="col-md-10">
                                  <select class="form-control" id="ps_status" name="ps_status"> 
                                    <option  value="">Select</option>
                                    <option <?= (isset($payment_settings['ps_status']) && ($payment_settings['ps_status'])=='1')?'Selected':'' ?> value="1">Enable</option>
                                    <option <?= (isset($payment_settings['ps_status']) && ($payment_settings['ps_status'])=='0')?'Selected':'' ?> value="0">Disable</option>
                                  </select>
                                </div>
                              </div>

                              <div class="form-group">
                                <label class="col-md-2 control-label">Publishable Key</label>
                                <div class="col-md-10">
                                  <input type="text" autocomplete="off" class="form-control" required="true" value="<?= (isset($payment_settings['ps_publishable_key']) && ($payment_settings['ps_publishable_key'])!='')?($payment_settings['ps_publishable_key']):'' ?>" id="ps_publishable_key" name="ps_publishable_key" placeholder="Enter publishable key">
                                </div>
                              </div>

                              <div class="form-group">
                                <label class="col-md-2 control-label">Secret Key</label>
                                <div class="col-md-10">
                                  <input type="test" class="form-control" value="<?= (isset($payment_settings['ps_secret_key']) && $payment_settings['ps_secret_key']!='')?$payment_settings['ps_secret_key']:'' ?>" required="true" id="ps_secret_key" name="ps_secret_key" placeholder="Enter Secret Key">
                                </div>
                              </div>

                              <div class="form-group">
                                <label class="col-md-2 control-label">Currency Code</label>
                                <div class="col-md-10">
                                  <input type="test" class="form-control" value="<?= (isset($payment_settings['ps_currency']) && $payment_settings['ps_currency']!='')? $payment_settings['ps_currency']:'' ?>" required="true" id="ps_currency" name="ps_currency" placeholder="Enter Currency Code">
                                </div>
                              </div>

                              <div class="form-group">
                                <label class="col-md-2 control-label">Currency Info</label>
                                <div class="col-md-10">
                                  <span>(For Information on currency code : <a href="https://stripe.com/docs/currencies)">https://stripe.com/docs/currencies)</a></span>
                                </div>
                              </div>

                              <input type="hidden" name="ps_type" value="stripe">

                              <div class="form-group m-b-0">
                                  <div class="col-sm-offset-2 col-sm-9">
                                    <button type="submit" class="btn btn-primary">Update <i class="fa fa-check"></i></button>
                                  </div>
                              </div>
                              
                            </form>

                                  </p>
                            </div>
                        </div>
                      </div>
                      


                      <div class="panel">
                           <div class="panel-heading collapsed" data-toggle="collapse" data-parent="#accordion" data-target="#collapseTwo" aria-expanded="false">
                          <h6 class="panel-title accordion-toggle">
                              Paypal
                          </h6>
                           </div>
                        <div id="collapseTwo" class="panel-collapse collapse" aria-expanded="false">
                                <div class="panel-body">
                                  <p>
                                    <form id="addnewservice" role="form" action="<?= base_url(); ?>settings/payment_settings_save_paypal" method="post">
                              
                                    <div class="form-group">
                                      <label class="col-md-2 control-label">Status</label>
                                      <div class="col-md-10">
                                        <select class="form-control" id="ps_status_paypal" name="ps_status_paypal"> 
                                          <option value="">Select</option>
                                          <option <?= (isset($paymentpaypal_settings['ps_status']) && ($paymentpaypal_settings['ps_status'])=='1')?'Selected':'' ?> value="1">Enable</option>
                                          <option <?= (isset($paymentpaypal_settings['ps_status']) && ($paymentpaypal_settings['ps_status'])=='0')?'Selected':'' ?> value="0">Disable</option>
                                        </select>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label class="col-md-2 control-label">Paypal Mode</label>
                                      <div class="col-md-10">
                                        <select class="form-control" id="ps_mode_paypal" name="ps_mode_paypal"> 
                                          <option value="">Select Mode</option>
                                          <option <?= (isset($paymentpaypal_settings['ps_publishable_key']) && ($paymentpaypal_settings['ps_publishable_key'])=='https://www.sandbox.paypal.com/cgi-bin/webscr')?'Selected':'' ?> value="https://www.sandbox.paypal.com/cgi-bin/webscr">Sandbox</option>
                                          <option <?= (isset($paymentpaypal_settings['ps_publishable_key']) && ($paymentpaypal_settings['ps_publishable_key'])=='https://www.paypal.com/cgi-bin/webscr')?'Selected':'' ?> value="https://www.paypal.com/cgi-bin/webscr">Production</option>
                                        </select>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label class="col-md-2 control-label">Paypal Email</label>
                                      <div class="col-md-10">
                                        <input type="text" class="form-control" value="<?= (isset($paymentpaypal_settings['ps_secret_key']) && $paymentpaypal_settings['ps_secret_key']!='')?$paymentpaypal_settings['ps_secret_key']:'' ?>" required="true" id="ps_secret_key_paypal" name="ps_secret_key_paypal" placeholder="Enter Secret Key">
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label class="col-md-2 control-label">Currency Code</label>
                                      <div class="col-md-10">
                                        <input type="test" class="form-control" value="<?= (isset($paymentpaypal_settings['ps_currency']) && $paymentpaypal_settings['ps_currency']!='')? $paymentpaypal_settings['ps_currency']:'' ?>" required="true" id="ps_currency_paypal" name="ps_currency_paypal" placeholder="Enter Currency Code">
                                      </div>
                                    </div>

                                    <input type="hidden" name="ps_type" value="paypal">

                                    <div class="form-group m-b-0">
                                        <div class="col-sm-offset-2 col-sm-9">
                                          <button type="submit" class="btn btn-primary">Update <i class="fa fa-check"></i></button>
                                        </div>
                                    </div>
                                    
                                  </form>
                                  </p>
                            </div>
                        </div>
                      </div>
    


                      <div class="panel">
                          <div class="panel-heading collapsed" data-toggle="collapse" data-parent="#accordion" data-target="#collapseThree" aria-expanded="false">
                              <h6 class="panel-title accordion-toggle">
                                  Cash
                              </h6>
                            </div>
                        <div id="collapseThree" class="panel-collapse collapse" aria-expanded="false">
                                <div class="panel-body">
                                   <p>
                                    <form id="addnewservice" role="form" action="payment_settings_save_cash" method="post">

                                     <div class="form-group">
                                      <label class="col-md-2 control-label">Status</label>
                                      <div class="col-md-10">
                                        <select class="form-control" id="ps_status_cash" name="ps_status_cash"> 
                                          <option value="">Select</option>
                                          <option <?= (isset($cash_settings['ps_status']) && ($cash_settings['ps_status'])=='1')?'Selected':'' ?> value="1">Enable</option>
                                          <option <?= (isset($cash_settings['ps_status']) && ($cash_settings['ps_status'])=='0')?'Selected':'' ?> value="0">Disable</option>
                                        </select>
                                      </div>
                                    </div>

                                    <input type="hidden" name="ps_type" value="cash">

                                    <div class="form-group m-b-0">
                                        <div class="col-sm-offset-2 col-sm-9">
                                          <button type="submit" class="btn btn-primary">Update <i class="fa fa-check"></i></button>
                                        </div>
                                    </div>

                                  </form>
                                   </p>
                            </div>
                        </div>
                      </div>
    



                     <div class="panel">
                         <div class="panel-heading collapsed" data-toggle="collapse" data-parent="#accordion" data-target="#collapseFour" aria-expanded="false">
                              <h6 class="panel-title accordion-toggle">
                                  Bank Transfer
                              </h6>
                            </div>
                        <div id="collapseFour" class="panel-collapse collapse" aria-expanded="false">
                                <div class="panel-body">
                                    <p>

                                      <form id="addnewservice" role="form" action="payment_settings_save_banktransfer" method="post">

                                     <div class="form-group">
                                      <label class="col-md-2 control-label">Status</label>
                                      <div class="col-md-10">
                                        <select class="form-control" id="ps_status_banktransfer" name="ps_status_banktransfer"> 
                                          <option value="">Select</option>
                                          <option <?= (isset($bank_settings['ps_status']) && ($bank_settings['ps_status'])=='1')?'Selected':'' ?> value="1">Enable</option>
                                          <option <?= (isset($bank_settings['ps_status']) && ($bank_settings['ps_status'])=='0')?'Selected':'' ?> value="0">Disable</option>
                                        </select>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label class="col-md-2 control-label">Bank Details</label>
                                      <div class="col-md-10">
                                        <textarea class="form-control" rows="5" id="ps_publishable_key" name="ps_publishable_key"><?= (isset($bank_settings['ps_publishable_key']) && ($bank_settings['ps_publishable_key']))?$bank_settings['ps_publishable_key']:'' ?></textarea>
                                      </div>
                                    </div>

                                    <input type="hidden" name="ps_type" value="bank transfer">

                                    <div class="form-group m-b-0">
                                        <div class="col-sm-offset-2 col-sm-9">
                                          <button type="submit" class="btn btn-primary">Update <i class="fa fa-check"></i></button>
                                        </div>
                                    </div>

                                  </form>

                                </p>
                            </div>
                        </div>
                      </div>


                      
                    </div><!-- panel-group -->

                   </div>
                  </div>
              </div>
             <!--End row-->
			   
			    </div>
        <!-- End Wrapper-->