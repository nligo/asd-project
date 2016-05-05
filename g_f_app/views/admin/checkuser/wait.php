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
    <link rel="stylesheet" href="<?php echo $this->config->item('base_url').'/public/asd/'?>css/normalize.css">
    <link rel="stylesheet" href="<?php echo $this->config->item('base_url').'/public/asd/'?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $this->config->item('base_url').'/public/asd/'?>css/bootstrap.offcanvas.min.css">

    <link rel="stylesheet" href="<?php echo $this->config->item('base_url').'/public/asd/'?>css/font-awesome/font-awesome.css" type="text/css" charset="utf-8">
    <link rel="stylesheet" href="<?php echo $this->config->item('base_url').'/public/asd/'?>css/style.css">
        <script type="text/javascript" src="<?php echo $this->config->item('base_url');?>/public/admin/js/jquery-1.7.2.min.js">
</script>
    <title>激活页面</title>
</head>
<body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">您正在使用一个 <strong>老旧的</strong> 浏览器. 为了您能获取更好的互联网体验，请 <a href="http://browsehappy.com.cn/" target="_blank">升级</a> 您的浏览器.</p>
            <![endif]-->

    <!-- =========================================== mycode =====================================- -->
<div class="row clearfix">
        <div class="col-md-12 column">
            <nav class="navbar navbar-default navbar-static-top" role="navigation">
                <ul class="nav navbar-nav" style="float: right">
                    <li>
                        <a href="<?php echo $this->config->item('base_url').'/Login/index';?>">返回页面</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
<div class="container pay">

	<h3>
				尊敬的<?php if($info['userType'] == 1){echo '商家用户';}else{echo '接手用户';}?>. 您已经成功提交激活申请，管理员正在审核当中！审核完毕，您的账户就可以使用了！请您耐心等待！
	</h3>
    <div class="alert alert-success alert-dismissable" id="warningdiv" style="display:none">
				
                 <div id="warningtext">
				<h4>
					注意!
				</h4>
                </div>
			</div>
    <div class="row clearfix">
        <div class="col-md-12 column">
            
        </div>
        <h4>转账案例</h4>
        <img src="<?php echo $this->config->item('base_url').'/public/asd/'?>img/1.png" class="img-responsive" alt="Responsive image">
        <img src="<?php echo $this->config->item('base_url').'/public/asd/'?>img/2.png" class="img-responsive" alt="Responsive image">

    </div>
</div>

   <!-- ============================================ end =======================================- -->



<!--[if (gte IE 9)|!(IE)]>
<!-->
<!--<![endif]-->
<!--[if lte IE 8 ]>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
<script src="http://cdn.bootcss.com/html5shiv/r29/html5.min.js"></script>
<script src="assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->
    <script src="<?php echo $this->config->item('base_url').'/public/asd/'?>js/jquery-1.9.1.min.js" ></script>
    <script src="<?php echo $this->config->item('base_url').'/public/asd/'?>js/bootstrap.min.js"></script>
    <script src="js/bootstrap.offcanvas.min.js"></script>

    <script src="<?php echo $this->config->item('base_url').'/public/asd/'?>js/jquery.cookie.js"></script>
    <script>

    </script>
    <script type="text/javascript">
function checkButton(){	
	var payType = $('#payType').val();
 	if(payType == 3)
	{
		warning('<strong>错误：&nbsp;&nbsp;<font color="#993300">请选择您的付款方式</font></strong>');return false;
	}
	var apayNum = $('#apayNum').val();
	if(apayNum == '')
	{
		warning('<strong>错误：&nbsp;&nbsp;<font color="#993300">请输入您的支付账号</font></strong>');return false;
	}
 	var apayStreamNum = $('#apayStreamNum').val();
	if(apayStreamNum == '')
	{
		warning('<strong>错误：&nbsp;&nbsp;<font color="#993300">请输入您的支付流水号</font></strong>');return false;
	}
	
	$('#form1').submit(function (){
 		$(this).serialize();
 	});
 }
	     
function warning(a)
{
	$('#warningtext').html(a);
	$('#warningdiv').show();
}
</script>
</body>
</html>
sss