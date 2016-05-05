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
<div class="container pay">
	<h3>
				尊敬的<?php if($info['userType'] == 1){echo '商家用户';}else{echo '接手用户';}?>. 您已经成功注册，激活账号以后就可以使用了！
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
            <form class="form-horizontal" role="form" action="<?php echo $this->config->item('base_url');?>/Apaysuccess/doadd" method="post" name="form1" id="form1">
            	<div class="form-group">
                     <label for="inputEmail3" class="col-sm-4 control-label">
                     <span class="xx">*</span>选择支付类型:</label>
                    <div class="col-sm-4">
                       <select name="payType" id="payType" class="form-control">
                       <option value="3" selected="selected">请选择</option>
                       	<option value="0">支付宝</option>
               
                       </select>
                    </div>
                </div>
                <div class="form-group">
                     <label for="inputEmail3" class="col-sm-4 control-label">
                     <span class="xx">*</span>会员转账账号:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="apayNum" name="apayNum"/>
                        <input type="hidden" class="form-control" id="UId" name="UId" value="<?php echo $info['uId']?>"/>
                    </div>
                </div>
                <div class="form-group">
                     <label for="inputEmail3" class="col-sm-4 control-label">
                     <span class="xx">*</span>手机号码:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="phoneNumber" name="phoneNumber"/>
                    </div>
                </div>
                <?php if($info['userType'] == 1){?>
                <h3 class="text-center">您的会员类型为商家：需支付500元</h3>
                <?php }else{?>
                <h3 class="text-center">您的会员类型为接手：需支付100元</h3>
                <?php }?>
                <ul class="list-unstyled list-inline text-center">

                    <li><a href="">客服1：<img src="<?php echo $this->config->item('base_url').'/public/asd/'?>img/qq.png" class="img-responsive" alt="Responsive image"></a></li>
                    <li><a href="">客服1：<img src="<?php echo $this->config->item('base_url').'/public/asd/'?>img/qq.png" class="img-responsive" alt="Responsive image"></a></li>
                    <li><a href="">客服1：<img src="<?php echo $this->config->item('base_url').'/public/asd/'?>img/qq.png" class="img-responsive" alt="Responsive image"></a></li>
                    <li><a href="">客服1：<img src="<?php echo $this->config->item('base_url').'/public/asd/'?>img/qq.png" class="img-responsive" alt="Responsive image"></a></li>
                    <li><a href="">客服1：<img src="<?php echo $this->config->item('base_url').'/public/asd/'?>img/qq.png" class="img-responsive" alt="Responsive image"></a></li>
                </ul>
                <div class="form-group">
                     <label for="inputEmail3" class="col-sm-4 control-label">
                     <span class="xx">*</span>请输入转账交易号:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="apayStreamNum" name="apayStreamNum" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10 clearfix">
                         <button type="submit" class="btn btn1 btn-primary pull-right"   onclick="javascript:return checkButton()">提交审核</button>
                    </div>
                </div>
            </form>
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
	var phoneNumber = $('#phoneNumber').val();
	if(phoneNumber == '')
	{
		warning('<strong>错误：&nbsp;&nbsp;<font color="#993300">请输入正确的手机号码，这将是我们联系您的方式</font></strong>');return false;
	}
	var reg = /^0?1[3|4|5|8][0-9]\d{8}$/;
	if(reg.test(phoneNumber) == false)
	{
		warning('<strong>错误：&nbsp;&nbsp;<font color="#993300">手机号码格式不正确，请重新输入</font></strong>');return false;
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
