<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="assets/images/favicon.png" type="image/png">
  <title><?php
    $data = sitedata();
    echo output($data['webiste_name']);
   ?></title>
   <link href="<?= base_url(); ?>assets/css/icons.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/responsive.css" rel="stylesheet">

</head>

<body class="sticky-header">

 
 <!--Start login Section-->
  <section class="login-section">
       <div class="container">
           <div class="row">
               <div class="login-wrapper">
                   <div class="login-inner">
                       
                       <div class="logo">
            <a href="<?= base_url(); ?>dashboard"><img src="<?= base_url().'assets/uploads/'.output($data['logo']); ?>" alt=""></a>
        </div>
                   		
                   		<h2 class="header-title text-center">Login</h2>

                      <?php $successMessage = $this->session->flashdata('successmessage');  
           $warningmessage = $this->session->flashdata('warningmessage');                    
      if (isset($successMessage)) { echo '<div id="alertmessage">
          <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   '. output($successMessage).'
                  </div>
          </div>'; } 
      if (isset($warningmessage)) { echo '<div id="alertmessage">
          <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   '. output($warningmessage).'
                  </div>
          </div>'; }    
      ?>

                  <?php if(isset($show) && $show==true) { ?>
                  <div class="alert alert-info text-center">
                  <div class="mb-2"><strong>Temporary Username and Password Installed!!</strong></div>
                  <div class="mb-2">(This will work only for first login and need to reset password after getting login)</div>
                  <div>
                  <div>Username : admin</div>
                  <div>Password : admin</div>
                  </div>
                  </div>
                  <?php } ?>
                        
                       <form action="<?= base_url().'admin/login_action'; ?>" method="post">
                           <div class="form-group">
                               <input type="text" name="username" class="form-control"  placeholder="Username">
                           </div>
                           
                           <div class="form-group">
                               <input type="password" name="password" class="form-control"  placeholder="Password">
                           </div>
                          
                           <div class="form-group">
                               <input type="submit" value="Login" class="btn btn-primary btn-block" >
                           </div>
                           
                       </form>
                       
                        <div class="copy-text"> 
                         <p class="m-0">2014 - 2021 &copy; <?php
    $data = sitedata();
    echo output($data['webiste_name']);
   ?></p>
                        </div>
                    
                   </div>
               </div>
               
           </div>
       </div>
  </section>
 <!--End login Section-->




    <!--Begin core plugin -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- End core plugin -->

</body>

</html>
