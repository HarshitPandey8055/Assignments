<?php $data = sitedata(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Browser Bar Icon -->
	<link rel="shortcut icon" href="<?= base_url().'assets/uploads/'.output($data['logo']); ?>">

	<!-- Meta Tags -->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Title -->
	<title><?php 
    $data = sitedata();
    echo output($data['webiste_name']);
   ?></title>

	<!-- START CSS -->
		<!-- Bootstrap -->
		<link href="<?= base_url(); ?>assets/frontend/css/bootstrap.min.css" rel="stylesheet">

		<!-- Main custom CSS -->
		<link href="<?= base_url(); ?>assets/frontend/css/style.css" rel="stylesheet">

		<!-- Font awesome CSS -->
		<link href="<?= base_url(); ?>assets/frontend/font/materialdesignicons/css/materialdesignicons.min.css" rel="stylesheet">
		<link href="<?= base_url(); ?>assets/frontend/font/flaticon/flaticon.css" rel="stylesheet">

		<!-- Responsive CSS -->
		<link href="<?= base_url(); ?>assets/frontend/css/responsive.css" rel="stylesheet">

		<!-- Responsive CSS -->
		<link href="<?= base_url(); ?>assets/frontend/css/calendar.css" rel="stylesheet">

		<!-- Responsive CSS -->
		<link href="<?= base_url(); ?>assets/frontend/css/checkbox.css" rel="stylesheet">

		<!-- Animation CSS -->
	<!-- END CSS -->
</head>
<body id="body-top">

	<!-- START HEADER -->
	<div id="header">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="logo">
						<a href="<?php echo base_url(); ?>"><img src="<?= base_url().'assets/uploads/'.output($data['logo']); ?>" alt="Booking" class="brand-image img-circle elevation-3 frlogo"></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END HEADER -->

	<!-- START FORM -->
	<div id="booking-form">
		<div class="container">
			<div class="row">

   <?php $successMessage = $this->session->flashdata('successmessage');  
           $warningmessage = $this->session->flashdata('warningmessage');                    
      if (isset($successMessage)) { echo '<div id="alertmessage" class="col-md-12 mb-3">
          <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   '. output($successMessage).'
                  </div>
          </div>'; } 
      if (isset($warningmessage)) { echo '<div id="alertmessage" class="col-md-12 mb-3">
          <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   '. output($warningmessage).'
                  </div>
          </div>'; }    
      ?>
				<div class="col-lg-12">
      					<form method="post" action="frontend/add_booking" id="booking_form">
						<div class="card">
							<div class="card-header">
								Service Category
							</div>
							<div class="card-body">
								<div class="bform-step-flex align-items-center">
									<div class="bform-step-number">
										<p><span>1</span>/5</p>
									</div>
									<div class="bform-step-head">
										<h3>Category</h3>
										<p>Select service category below</p>
									</div>
								</div>
								<div class="row">
									<?php if(!empty($vehicletype_list)) { 
										foreach ($vehicletype_list as $key => $vehicletype_listdata) {
										?>
									<div class="col-lg <?= 'class_'.$key; ?>">
										<a class="maincat" href="#" data-name="<?= $vehicletype_listdata['vt_name'] ?>" data-id="<?= $vehicletype_listdata['vt_id'] ?>">
										<div class="vehicle-list vlborder_<?= $vehicletype_listdata['vt_id'] ?>">
											<div class="vehicle-list-icon">
												<img src="assets/uploads/<?= $vehicletype_listdata['vt_image'] ?>" alt="<?= $vehicletype_listdata['vt_name'] ?>" height="120" width="120">
											</div>
										</div>
										</a>
									</div>
									<?php } } else { echo '<div class="col-lg-12 mb-30px"><div class="align-middle mb-0 alert alert-info" role="alert">
											  Please add category of service in admin panel
											</div></div>'; } ?>
								<input type="text" required name="servicecategory" id="servicecategory" class="form-control">
								</div>
								<label id="servicecategory-error" class="error text-danger alert-danger" for="servicecategory"></label>
							</div>
						</div>
						<?php if($data['frontend_show']==3 || $data['frontend_show']==1) { ?>
						<div class="card">
							<div class="card-header">
								Packages List
							</div>
							<div class="card-body">
								<div class="bform-step-flex align-items-center">
									<div class="bform-step-number">
										<p><span>2</span>/5</p>
									</div>
									<div class="bform-step-head">
										<h3>Packages</h3>
										<p>Select packages below</p>
									</div>
								</div> 
								<div id="availcalender" class="row package-list overflow-hidden">
								</div>
							</div>
						</div>
						<?php } ?>
						
						<?php if($data['frontend_show']==3 || $data['frontend_show']==2) { ?>
						<div class="card">
							<div class="card-header">
								Services List
							</div>
							<div class="card-body">
								<div class="bform-step-flex align-items-center">
									<div class="bform-step-number">
										<p><span>2</span>/5</p>
									</div>
									<div class="bform-step-head">
										<h3>Services</h3>
										<p>Select services below</p>
									</div>
								</div> 
								<div class="row" id="availcalender">
									<div class="col-lg-12">
										<ul class="services-list">
											<?php if(!empty($service_list)) { 
												foreach ($service_list as $key => $service_listdata) {
											?>
											<li><div class="row"><div class="col-lg-7 text-align-left"><span><?= $service_listdata['ser_name'] ?></span><br><small><?= $service_listdata['ser_desc'] ?></small></div>
											<div class="col-lg-3 text-align-center"><div class="row"><?= $service_listdata['ser_time'] ?> Mins <div class="col-md-6 text-align-center"><span><i class="mdi mdi-currency">Price:</i> <?= $service_listdata['ser_price'] ?></span></div></div></div><div class="col-lg-2 text-align-right">
												<input required="" type="checkbox" data-curr="<?= $service_listdata['ser_price'] ?>"  name="services_list[]" onclick="calculateCost()" id="services_list<?= $service_listdata['ser_id'] ?>" value="<?= $service_listdata['ser_id'] ?>" class="radio service_listdatacheck" autocomplete="off">
												<label class="btn d-block btn-success" for="services_list<?= $service_listdata['ser_id'] ?>">Select</label></div></div></li>
											<?php } } ?>
										</ul>
									</div>
								</div>
								<label id="services_list[]-error" class="error text-danger alert-danger" for="services_list[]"></label>
							</div>
						</div>
					<?php } ?>

						<div class="card">
							<div class="card-header">
								Date &amp; Time
							</div>
							<div class="card-body">
								<div class="bform-step-flex align-items-center">
									<div class="bform-step-number">
										<p><span>3</span>/5</p>
									</div>
									<div class="bform-step-head">
										<h3>Block your time slot</h3>
										<p>Select date &amp; time below</p>
									</div>
								</div>
								<div id="availcalender" class="mb-30px"> 
								<?php
								$reserved = array();
								date_default_timezone_set('Asia/Calcutta');
								$timeFormat    = 'g:iA';
								$weekdayFormat = 'l';
								$dateFormat    = 'F j';
								$valueFormat   = 'YmdHi';
								$now           = time();
								if (isset($_GET['startdate'])) {
								    $currentTime = strtotime($_GET['startdate']);
								} else {
								    $currentTime = $now;
								}
								
								if (!empty($blockeddates)) {
								    //$a = explode(' ', preg_replace('/\s{2,}|[^\s\d]/', ' ', $_GET['reserved']));
								    foreach ($blockeddates as $time) {
								    	//echo strtotime($time['bk_date']); die;
								        $reserved[] = strtotime($time['bk_date']);
								    }
								}
								if(isset($workingtime[0]['time_from'])) {
									$time_from = $workingtime[0]['time_from'];
								} else {
									$time_from = 9;
								}
								if(isset($workingtime[0]['time_to'])) {
									$time_to = $workingtime[0]['time_to'];
								} else {
									$time_to = 6;
								}		
								$endtime = (12-$time_from)+$time_to;


								$startingTime = strtotime('today +'.$time_from.' hours', $currentTime);
								$endingTime    = strtotime('next friday', $startingTime);
								$startingMonth = date('F', $startingTime);
								$endingMonth   = date('F', $endingTime);
								$startingDay   = date('j', $startingTime);
								$endingDay     = date('j', $endingTime);
								$period        = $startingMonth . ' ' . $startingDay . ' - ';
								if ($startingMonth != $endingMonth) {
								    $period .= $endingMonth . ' ';
								}
								$period .= $endingDay;
								?>
								<table class="reservation text-center m-0px-auto">
								<?php
								echo '<tr>';
								for ($i = 0; $i < 7; $i++) {
								    $time = strtotime("+$i days", $startingTime);
								    echo '<th><label>' . date('M-d', $time). '</label></th>';
								}
								echo '</tr>';
								$SplitTimestartingTime = date('Y-m-d').' '.$time_from.':00 AM';
								$SplitTimeendingTime =  date('Y-m-d').' '.$time_to.':00 PM';


								if(isset($workingtime[0]['diff']) && $workingtime[0]['diff']!='' && $workingtime[0]['diff']!=0) {
									$diff = $workingtime[0]['diff'];
								} else {
									$diff = 30;
								}


								$Data = SplitTime($SplitTimestartingTime, $SplitTimeendingTime, $diff);

								foreach ($Data as $slot) {
								    echo '<tr>';
								    for ($i = 0; $i < 7; $i++) {
								        $time  = strtotime("+$i days", strtotime($slot));
								        $value = date($valueFormat, $time);
								        if ($time <= $now) {
								            $class = 'closed btn d-block btn-danger disabled';
								        } else {
								             $class = (in_array($time, $reserved)) ? 'closed btn d-block btn-danger disabled' : 'avail btn d-block btn-success';
								        }
								      
								        $text = date($timeFormat, $time);
								        $jquerydate = date('Y-m-d', $time);
								        echo "<td>
								        <input required class='datecheckbox' data-date='$jquerydate' data-time='$text' type='checkbox' name='dates' id='".$jquerydate.$text."' value='$value'>
								        <label for='".$jquerydate.$text."' class='$class radio'>$text</label>
								        </td>";
								    }
								    echo '</tr>';
								}

								echo '<tr>';
								for ($i = 0; $i < 7; $i++) {
								    $time = strtotime("+$i days", $startingTime);
								    echo '<th><label>' . date('l', $time). '</label></th>';
								}
								echo '</tr>';
								?>
								</table>
								</div>
								<label id="dates-error" class="error text-danger alert-danger" for="dates"></label>
							</div>
						</div>
						<div class="card">
							<div class="card-header">
								Summary
							</div>
							<div class="card-body">
								<div class="bform-step-flex align-items-center">
									<div class="bform-step-number">
										<p><span>4</span>/5</p>
									</div>
									<div class="bform-step-head">
										<h3>Summary</h3>
										<p>Booking details below</p>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6">
										<div class="summary-box">
											<div class="row d-flex align-items-center">
												<div class="col-md-6">
													<div class="text-align-left">
														<i class="flaticon-calendar f-size-60px"></i>
													</div>
												</div>
												<div class="col-md-6">
													<div class="text-align-right">
														<h4 id="appointmentdate">Yet to Choose..</h4>
														<p>Appointment Date</p>
													</div>
												</div>
											</div>
										</div>
										<div class="summary-box">
											<div class="row d-flex align-items-center">
												<div class="col-md-6">
													<div class="text-align-left">
														<i class="flaticon-time f-size-60px"></i>
													</div>
												</div>
												<div class="col-md-6">
													<div class="text-align-right">
														<h4 id="catname">Yet to Choose..</h4>
														<p>Service Category</p>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="summary-box">
											<div class="row d-flex align-items-center">
												<div class="col-md-6">
													<div class="text-align-left">
														<i class="flaticon-clock f-size-60px"></i>
													</div>
												</div>
												<div class="col-md-6">
													<div class="text-align-right">
														<h4 id="appointmenttime">Yet to Choose..</h4>
														<p>Appointment Time</p>
													</div>
												</div>
											</div>
										</div>
										<div class="summary-box">
											<div class="row d-flex align-items-center">
												<div class="col-md-6">
													<div class="text-align-left">
														<i class="flaticon-shopping-cart-1 f-size-60px"></i>
													</div>
												</div>
												<div class="col-md-6">
													<div class="text-align-right">
														<h4 id="totalcst">Yet to Choose..</h4>
														<p>Total Cost</p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header">
								Contact Information
							</div>
							<div class="card-body">
								<div class="bform-step-flex align-items-center">
									<div class="bform-step-number">
										<p><span>5</span>/5</p>
									</div>
									<div class="bform-step-head">
										<h3>Basic Informations</h3>
										<p>Fill out this fields below</p>
									</div>
								</div>
								<input type="hidden" id="servicecategoryid" name="servicecategoryid" value="" class="form-control">
								<input type="hidden" id="bk_amt" name="bk_amt" value="" class="form-control">
								<input type="hidden" id="pckageprice" name="pckageprice" class="pckageprice form-control">
									<input type="hidden" id="pckageid" name="pckageid" class="form-control">

								<input type="hidden" id="servicecategoryname" name="servicecategoryname" value="" class="form-control">
								<div class="booking-fields">
									<div class="row booking-fields-row">
										<div class="col-lg-4">
											<div class="form-group">
												<input type="text" name="first_name" class="form-control" placeholder="First Name *">
											</div>
										</div>
										<div class="col-lg-4">
											<div class="form-group">
												<input type="text" name="last_name" class="form-control" placeholder="Last Name *">
											</div>
										</div>
										<div class="col-lg-4">
											<div class="form-group">
												<input type="text" name="company_name" class="form-control" placeholder="Company Name *">
											</div>
										</div>
									</div>
									<div class="row booking-fields-row">
										<div class="col-lg-6">
											<div class="form-group">
												<input type="text" name="email_id" class="form-control" placeholder="Email Id *">
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<input type="text" name="phone" class="form-control" placeholder="Phone *">
											</div>
										</div>
									</div>
									<div class="row booking-fields-row">
										<div class="col-lg-6">
											<div class="form-group">
												<textarea rows="4" name="address" class="form-control" placeholder="Address *"></textarea>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<textarea rows="4" name="message" class="form-control" placeholder="Message *"></textarea>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<p>We will confirm your appointment with you by phone or e-mail within 24 hours of receiving your request.</p>
							<div class="form-group">
								<input type="checkbox" name="agree" id="agree" class="radio">
								<label for="agree">I agree Terms and Conditions</label><br>
								<label id="agree-error" class="error text-danger alert-danger" for="agree"></label>
							</div>
							<?php if(!empty($paymentgt)) { ?>
							<div class="form-group">
								<select id="pgmethod" class="form-control" name="pgmethod" required="true">
								  <option value="">Select Payment type</option>
								  	<?php
									foreach ($paymentgt as $key => $paymentoption) {
									?>
									<option value="<?=$paymentoption['ps_type'];?>"><?=ucfirst($paymentoption['ps_type']);?></option>
									<?php }	?>
								</select>
								<label id="pgmethod-error" class="error text-danger alert-danger" for="pgmethod"></label>
								<br>
								<div id="bankdetails">
								</div>
							</div>
							<?php } ?>
							<div>
								<input type="submit" name="submit_booking_form" class="btn btn-success" value="Book Now">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- END FORM -->

	<!-- START FOOTER -->
	<div id="footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<ul class="footer-right">
						<li>&copy; 2014 - <?php echo date('Y'); ?>. <a href="<?php echo base_url(); ?>"><?php 
						    $data = sitedata();
						    echo output($data['webiste_name']);
						   ?></a> - All Right Reserved.</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- END FOOTER -->

	<!-- START SCRIPTS -->
		<!-- Jquery -->
	    <script src="<?= base_url(); ?>assets/frontend/js/jquery-3.4.1.min.js"></script>
	    <script src="<?= base_url(); ?>assets/frontend/js/jquery.easing-1.4.1.min.js"></script>

	    <!-- Bootstrap -->
    	<script src="<?= base_url(); ?>assets/frontend/js/bootstrap.bundle.min.js"></script>

    	<!-- Jquery Validate -->
	    <script src="<?= base_url(); ?>assets/frontend/js/jquery.validate-1.19.1.min.js"></script>
	    <script src="<?= base_url(); ?>assets/frontend/js/additional-methods-1.19.1.min.js"></script>
	    <script src="<?= base_url(); ?>assets/frontend/js/custom-jquery.validate.js"></script>

	    <!-- Custom Script -->
	    <script src="<?= base_url(); ?>assets/frontend/js/custom.js"></script>
	<!-- END SCRIPTS -->
</body>
</html>
<?php

function SplitTime($StartTime, $EndTime, $Duration="60"){
    $ReturnArray = array ();// Define output
    $StartTime    = strtotime ($StartTime); //Get Timestamp
    $EndTime      = strtotime ($EndTime); //Get Timestamp

    $AddMins  = $Duration * 60;

    while ($StartTime <= $EndTime) //Run loop
    {
        $ReturnArray[] = date("g:i A", $StartTime);
        $StartTime += $AddMins; //Endtime check
    }
    return $ReturnArray;
}
 ?>