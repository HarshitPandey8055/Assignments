<?php
   error_reporting(E_ERROR | E_PARSE);
   //error_reporting(0); //Setting this to E_ALL showed that that cause of not redirecting were few blank lines added in some php files.
   $db_config_path = '../application/config/database.php';
   $cachepath = '../application/cache/session';
   // Only load the classes in case the user submitted the form
   if($_POST) {
   	// Load the classes and create the new objects      
   	require_once('includes/core_class.php');
   	require_once('includes/database_class.php');
   	$core = new Core();
   	$database = new Database();
      // install path
      $path = '../';
      $install = 'install';
      $dir = $path.$install;
   	// Validate the post data
   	if($core->validate_post($_POST) == true)
   	{
         
   		// First create the database, then create tables, then write config file
   		if($database->create_database($_POST) == false) {
   			$message = $core->show_message('error',"Unable to create database, please verify your settings");
   		} else if ($database->create_tables($_POST) == false) {
   			$message = $core->show_message('error',"Unable to create table's, please verify your settings.");
   		} else if ($core->write_config($_POST) == false) {
   			$message = $core->show_message('error',"The database configuration file could not be written, Please chmod application/config/database.php file to 777");
   		}
   		// If no errors, redirect to registration page
   		if(!isset($message)) {
   		  $redir = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
         $redir .= "://".$_SERVER['HTTP_HOST'];
         $redir .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
         $redir = str_replace('install/','',$redir);
         sleep(15);
            // remove install folder
            emptyDir($dir);
            rmdir($dir);
            // after redirect
            $login = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
            $login .= "://".$_SERVER['HTTP_HOST'];
            $login .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
            $loginr = str_replace('install/',"",$login);
            
   			header( 'Location: ' . $loginr . 'admin' ) ;
   		}
   	}
   	else {
   		$message = $core->show_message('error','The host, username, password, and database name are required.');
   	}
   }
   ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Install</title>
   <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">
   <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>

   <div class="flex-center position-ref full-height">
<div class="col-md-6 card p-6">

 <div class="col-md-12"><p class="company-name"><i class="icon-calendar"></i> Install - Bookigniter</p>
   
</div>
 <br>
      <?php if(is_writable($db_config_path) && is_writable(dirname($cachepath))) {?>
      <div>
         <?php if(isset($message)) {echo '<p class="alert alert-danger">' . $message . '</p>';}?>
         <form class="needs-validation" novalidate id="install_form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group row">
               <label class="col-sm-4 col-form-label">Host Name</label>
               <div class="col-sm-8">
                  <input type="text" id="hostname" value="localhost" class="input_text form-control" name="hostname" required />			
               </div>
            </div>
            <div class="form-group row">
               <label class="col-sm-4 col-form-label">Database Name</label>
               <div class="col-sm-8">
                  <input type="text" id="database" class="input_text form-control" name="database" required />
               </div>
            </div>
            <div class="form-group row">
               <label class="col-sm-4 col-form-label">Mysql Username</label>
               <div class="col-sm-8">
                  <input type="text" id="username" class="input_text form-control" name="username" required />	
               </div>
            </div>
            <div class="form-group row">
               <label class="col-sm-4 col-form-label">Mysql Password</label>
               <div class="col-sm-8">
                  <input type="password" id="password" class="input_text form-control" name="password" /> 
               </div>
            </div>
            
            
            <div>
               <hr>
            </div>
    
            <button type="submit" id="submit" class="btn btn-primary float-right">Install</button>
         </form>
      </diV>
      <?php } else { if(!is_writable($db_config_path)) { ?>

      <p class="error">Please make the application/config/database.php file writable. <strong>Example</strong>:<br /><br /><code>chmod 777 application/config/database.php</code></p>
      <?php } }  if(!is_writable($cachepath))  { ?>
          <p class="error">Please make the application/cache/session is must writable. <strong>Example</strong>:<br /><br /><code>chmod 777 application/cache/session</code></p>
      <?php } ?>
   </div>
</div>
<script src="assets/js/jquery-3.4.1.min.js"></script>
<script src="assets/js/bootstrap.bundle.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>