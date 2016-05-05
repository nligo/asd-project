 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1">
    -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Amaze UI"/>
    <meta name="msapplication-TileImage" content="assets/i/app-icon72x72@2x.png">
    <meta name="msapplication-TileColor" content="#0e90d2">
    <!-- <link rel="icon" sizes="192x192" href="assets/i/app-icon72x72@2x.png">
    -->
    <!-- <link rel="apple-touch-icon-precomposed" href="assets/i/app-icon72x72@2x.png">
    -->
    <!-- <link rel="icon" type="image/png" href="assets/i/favicon.png">
    -->
    <link rel="stylesheet" href="<?php $this->config->item('base_url').'/public/asd/';?><?php echo $this->config->item('base_url').'/public/asd/'?>css/normalize.css">
    <link rel="stylesheet" href="<?php echo $this->config->item('base_url').'/public/asd/'?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $this->config->item('base_url').'/public/asd/'?>css/bootstrap.offcanvas.min.css">

    <link rel="stylesheet" href="<?php echo $this->config->item('base_url').'/public/asd/'?>css/font-awesome/font-awesome.css" type="text/css" charset="utf-8">
    <link rel="stylesheet" href="<?php echo $this->config->item('base_url').'/public/asd/'?>css/main.css">
    <script type="text/javascript" src="<?php echo $this->config->item('base_url');?>/public/admin/js/jquery-1.7.2.min.js">
</script>
<script src="<?php echo $this->config->item('base_url').'/public/asd/'?>js/ajax.js"></script>
    <title>ASD系统管理</title>
</head>
<body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">您正在使用一个 <strong>老旧的</strong> 浏览器. 为了您能获取更好的互联网体验，请 <a href="http://browsehappy.com.cn/" target="_blank">升级</a> 您的浏览器.</p>
            <![endif]-->

    <!-- =========================================== mycode =====================================- -->

<div class="container-fluid">
    <div class="row clearfix">
        <div class="left col-md-4">
            <div class="logo">
                <img src="<?php echo $this->config->item('base_url').'/public/asd/'?>img/4.png" class="img-responsive  center-block" alt="Responsive image">
            </div>
            <div class="menuleft">
                <ul class="list-unstyled">
                    <li class="li1">
                        <a class="menu1" href=""><img src="<?php echo $this->config->item('base_url').'/public/asd/'?>img/4.png" class="img-responsive" alt="Responsive image">
                        我的工作台</a>
                    </li>
                    <li class="li1 active">
                        <a class="menu1" href=""><img src="<?php echo $this->config->item('base_url').'/public/asd/'?>img/4.png" class="img-responsive" alt="Responsive image">
                        我的工作台</a>

                        <ul class="list-unstyled">
                            <li class="li2 text-center"><a href="<?php echo $this->config->item('base_url').'/admin/Checkuser/index';?>">激活用户</a></li>
                            <li class="li2 text-center"><a href="<?php echo $this->config->item('base_url').'/admin/Useradmin/index';?>">用户中心</a></li>
                            <li class="li2 text-center"><a href="<?php echo $this->config->item('base_url').'/admin/Task/index';?>">任务中心</a></li>
                        </ul>
                    </li>
                </ul>

            </div>
            <div class="leftbottom">
                <ul class="list-unstyled">
                    <li class="text-center"><a href="#">ASD集团介绍</a></li>
                    <li class="text-center"><a href="#">ASD系统使用说明</a></li>
                    <li class="text-center"><a href="#">下载安卓客户端</a></li>
                </ul>
            </div>
        </div>
        <div class="right col-md-8">
            <div class="top clearfix">
                <h1 class="pull-left">
                <?php
				if($headerparam == 'Task') {echo '任务中心';}
				if($headerparam == 'Checkuser') {echo '激活用户';}
				if($headerparam == 'Useradmin') {echo '用户中心';}
				?>
                </h1>
                <ul class="list-unstyled list-inline pull-right">
                    <li><a href="">
                            <img src="<?php echo $this->config->item('base_url').'/public/asd/'?>img/5.png" class="img-responsive  center-block" alt="Responsive image">
                        </a></li>
                    <li><a href="">
                            <img src="<?php echo $this->config->item('base_url').'/public/asd/'?>img/4.png" class="img-responsive  center-block" alt="Responsive image">
                        </a></li>
                    <li class="username">
                        <p>ASD集团：<?php  if($sessioninfo['userType'] == 1){echo '商家';}elseif($sessioninfo['userType']== 2){echo '接手';}else{echo '系统管理员';}?></p>
                        <a href=""><?php echo !empty($sessioninfo['realName']) ? $sessioninfo['realName'] : '';?>:<?php echo !empty($sessioninfo['username']) ? $sessioninfo['username'] : '';?></a>
                    </li>
                    <li>
                        <a href="<?php echo $this->config->item('base_url').'/Login/adminloginOut'?>" onClick="return confirm('确认注销吗？');">
                           <h3>注销</h3>
                        </a>
                    </li>
                    
                </ul>
            </div>