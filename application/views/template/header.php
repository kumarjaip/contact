<?php
/*
 * Created on Jan 21, 2016
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->config->item('site_title');?>:: Admin Panel ::</title>
<link href="<?php echo base_url();?>css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>css/font-awesome.css" rel="stylesheet" type="text/css" />
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/common.js"></script>
</head>
<body class="innerBg">
<div id="webHolder">
    <div id="mainWrapper">

        <!-- Header Start -->
        <div id="header" class="marginT15">
            <div class="logo floatL"><img src="<?php echo base_url();?>images/logo.png" title="CashBack" height="60px"></div>
            <div class="wdAuto floatR">
                <p class="colorWhite alignR">Signed in as  <?php echo $name; ?></p>
                <div class="clear"></div>
                <div class="block topLinks marginT15">
                    <ul>
                        <li><a href="<?php echo base_url() ?>index.php/dashboard/settings"><span class="floatL marginR10"><img src="<?php echo base_url();?>images/settings.png" alt="" /></span><span class="floatL marginT2">Settings</span></a></li>
                        <li><a href="<?php echo base_url() ?>index.php/login/logout_user"><span class="floatL marginR10 marginT1"><img src="<?php echo base_url();?>images/logout.png" alt="" /></span><span class="floatL marginT2">Logout</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Header Ends -->

        <div class="clear"></div>
        <?php $this->load->view('template/topmenu.php');?>
        <div class="clear"></div>

		<!-- Contatiner Start -->
        <div id="container" class="marginT60 paddingB20">

