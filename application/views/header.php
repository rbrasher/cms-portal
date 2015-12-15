<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Powerboard Employee Portal</title>
<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>css/styles.css" />
</head>
<body>
<div class="container">
    <div class="header">
        <div class="navbar-header pull-left">
            <a style="padding: 0;" class="navbar-brand" href="<?php echo base_url();?>main">
                <img src="<?php echo base_url();?>img/logo.jpg" />
            </a>
        </div>
        <ul class="nav nav-pills pull-right">
            <li class="
            <?php
                if(!$this->uri->segment(2)) {
                    if($this->uri->segment(1) == 'main') {echo 'active';};
                }
            ?>">
                <a href="<?php echo base_url();?>main"><span class="glyphicon glyphicon-home"></span> Home</a>
            </li>
            <!--
            <li>
                <a href="<?php //echo base_url();?>"><span class="glyphicon glyphicon-question-sign"></span> FAQs</a>
            </li>
            -->
            <?php if($this->session->userdata('group_id') <= 2) : ?>
            <li>
                <a href="<?php echo base_url();?>admin/dashboard"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a>
            </li>
            <?php endif;?>
            
            <li>
                <a href="<?php echo base_url();?>authenticate/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
            </li>
        </ul>
    </div>
    
