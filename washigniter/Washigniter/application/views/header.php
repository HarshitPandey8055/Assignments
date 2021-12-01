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

    <!--Begin  Page Level  CSS -->
    <link href="<?= base_url(); ?>assets/plugins/morris-chart/morris.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet"/>
        <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css">

     <!--End  Page Level  CSS -->
    <link href="<?= base_url(); ?>assets/css/icons.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/responsive.css" rel="stylesheet">

    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="<?= base_url(); ?>assets/plugins/datatables/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?= base_url(); ?>assets/plugins/datatables/css/jquery.dataTables-custom.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url(); ?>assets/plugins/jquery-toast/jquery.toast.min.css" rel="stylesheet" type="text/css"/>


</head>

<body class="sticky-header">


    <!--Start left side Menu-->
    <div class="left-side sticky-left-side">

        <!--logo-->
        <div class="logo">
            <a href="<?= base_url(); ?>dashboard"><img src="<?= base_url().'assets/uploads/'.output($data['logo']); ?>" alt=""></a>
        </div>

        <div class="logo-icon text-center">
            <a href="<?= base_url(); ?>dashboard"><img src="<?= base_url().'assets/uploads/'.output($data['logo']); ?>" alt=""></a>
        </div>
        <!--logo-->