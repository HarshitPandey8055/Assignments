<!--body wrapper start-->
        <div class="wrapper">
              
              <!--Start Page Title-->
               <div class="page-title-box">
                    <h4 class="page-title">Integration</h4>
                    <ol class="breadcrumb">
                      <li>
                          <a href="<?= base_url(); ?>dashboard">Dashboard</a>
                      </li>
                      <li class="active">
                        Integration
                      </li>
                  </ol>
                    <div class="clearfix"></div>
                 </div>
                  <!--End Page Title-->         

               
           
             <!--Start row-->
             <div class="row">
                 <div class="col-md-12">
                   <div class="white-box">
                     <h2 class="header-title">Integration</h2>

                        <form id="generatereport" role="form" action="<?= base_url(); ?>reports/generatereport" method="post">
                          
                          <div class="form-group">
                            <label class="col-md-2 control-label">Embeded Code</label>
                            <div class="col-md-10">
                              <textarea class="form-control" rows="6"><div id="bookigniter" data-url="<?= base_url(); ?>" class="direct-load"></div><script src="<?= base_url(); ?>assets/frontend/js/jquery-3.4.1.min.js" type="text/javascript"></script><script src="<?= base_url(); ?>assets/integration.js?time=1584558956" type="text/javascript" ></script></textarea>
                              <p class="embeded-code-content">Copy embed code and paste to show booking widget on your website</p>
                            </div>
                          </div>
                          
                        </form>

                   </div>
                  </div>
              </div>
             <!--End row-->
			   
			    </div>
        <!-- End Wrapper-->