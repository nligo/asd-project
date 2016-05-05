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
    <link rel="stylesheet" href="<?php echo $this->config->item('base_url').'/public/asd/'?>css/normalize1.css">
    <link rel="stylesheet" href="<?php echo $this->config->item('base_url').'/public/asd/'?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $this->config->item('base_url').'/public/asd/'?>css/font-awesome/font-awesome1.css" type="text/css" charset="utf-8">
    <link rel="stylesheet" href="<?php echo $this->config->item('base_url').'/public/asd/'?>css/style1.css">
	<script type="text/javascript" src="<?php echo $this->config->item('base_url');?>/public/admin/js/jquery-1.7.2.min.js"></script>
    <title>AMA登陆页面</title>
</head>
<body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">您正在使用一个 <strong>老旧的</strong> 浏览器. 为了您能获取更好的互联网体验，请 <a href="http://browsehappy.com.cn/" target="_blank">升级</a> 您的浏览器.</p>
            <![endif]-->

    <!-- =========================================== mycode =====================================- -->
    <div class="container-fuild top">
        <div class="top-logo center-block">
            <img src="<?php echo $this->config->item('base_url').'/public/asd/'?>img/logo2.png" class="img-responsive center-block" alt="">
        </div>
    </div>

    <div class="container-fuild body">

        <div class="login center-block">
            <div class="row">
                <div class="col-sm-4">
                    <img src="<?php echo $this->config->item('base_url').'/public/asd/'?>img/logo1.png" class="img-responsive center-block" alt="">
                </div>
                <div id="warningdiv" style="display:none">
        			<div id="warningtext">错误：</div>
        		</div>
                <div class="col-sm-8">
                    <form action="<?php echo $this->config->item('base_url');?>/Login/adminloginin" method="post" name="form1" id="form1">
                        <div class="form-group">
                            <label for="username">用户名</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="password">密码</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="">
                        </div>
                       <input type="hidden" name="userType" id="userType" value="0" />
                        <button type="submit" class="btn btn-default"   onclick="javascript:return checkButton()" > 登陆</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid footer">
        <!-- <div class="footer"> -->
            <p class="text-center"><a href="#">ASD介绍</a><span> ︱ </span>
            <a href="#">商家教程</a><span> ︱ </span>
            <a href="#">买家教程</a><span> ︱ </span>
            <a href="#">ASD制度</a><span> ︱ </span>
            <a href="#">新手教程</a></p>
            <p class="text-center">
                ASD 2000-2018 ASD GFHZJH(中国)
            </p>
        <!-- </div> -->
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
    <script src="<?php echo $this->config->item('base_url').'/public/asd/'?>js/jquery-1.9.11.min.js" ></script>
    <script src="<?php echo $this->config->item('base_url').'/public/asd/'?>js/bootstrap1.min1.js"></script>
    <script src="<?php echo $this->config->item('base_url').'/public/asd/'?>js/jquery.cookie1.js"></script>
    <script>
        window.onload = function(){
            // alert(($(document).height()-$(document.body).height()));
            // alert("浏览器当前窗口可视区域高度"+$(window).height()); //浏览器当前窗口可视区域高度
            // alert("浏览器当前窗口文档的高度"+$(document).height()); //浏览器当前窗口文档的高度
            // alert("浏览器当前窗口文档body的高度"+$(document.body).height());//浏览器当前窗口文档body的高度
            if($(document).height()>$(document.body).height()){
                var ll = $(document).height()-$(document.body).height();
                // alert(ll/2);
                $(".login").css("margin-top",ll/2+20+"px");
                $(".login").css("margin-bottom",ll/2+20+"px");
            }
        }
    </script>
    <script type="text/javascript">
function checkButton(){	
	var username = $('#username').val();
	$.ajax
	({ //一个Ajax过程
	type: "post", //以post方式与后台沟通
	url : "<?php echo $this->config->item('base_url').'/Login/ajaxUser';?>", //与此php页面沟通
	dataType:'json',//从php返回的值以 JSON方式 解释
	async:false,
	data: 'username='+username,
	success: function(response)
	{//如果调用php成功
		userres = response;
	}
	});
	if(username == '')
	{
		warning('<strong>错误：&nbsp;&nbsp;<font color="#993300">请输入您的用户名</font></strong>');return false;
	}
	if(userres.err == 0)
	{
		warning('<strong>错误：&nbsp;&nbsp;<font color="#993300">用户名不存在，请重新输入</font></strong>');return false;
	}

	var res = '';
	var password = $('#password').val();
	$.ajax
	({ //一个Ajax过程
	type: "post", //以post方式与后台沟通
	url : "<?php echo $this->config->item('base_url').'/Login/ajaxPass';?>", //与此php页面沟通
	dataType:'json',//从php返回的值以 JSON方式 解释
	async:false,
	data:{password:password , username:username},
	success: function(response)
	{//如果调用php成功
		res = response;
	}
	});
	if(password == '')
	{
		warning('<strong>错误：&nbsp;&nbsp;<font color="#993300">请输入您的密码</font></strong>');return false;
	}
	if(res.err == 0)
	{
		warning('<strong>错误：&nbsp;&nbsp;<font color="#993300">密码错误，请重新输入</font></strong>');return false;
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
