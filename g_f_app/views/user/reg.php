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
    <link rel="stylesheet" href="<?php echo $this->config->item('base_url').'/public/asd/reg/'?>css/normalize.css">
    <link rel="stylesheet" href="<?php echo $this->config->item('base_url').'/public/asd/reg/'?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $this->config->item('base_url').'/public/asd/reg/'?>css/bootstrap.offcanvas.min.css">

    <link rel="stylesheet" href="<?php echo $this->config->item('base_url').'/public/asd/reg/'?>css/font-awesome/font-awesome.css" type="text/css" charset="utf-8">
    <link rel="stylesheet" href="<?php echo $this->config->item('base_url').'/public/asd/reg/'?>css/style.css">
    <script type="text/javascript" src="<?php echo $this->config->item('base_url');?>/public/admin/js/jquery-1.7.2.min.js">
</script>
    <title>注册页面</title>
</head>
<body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">您正在使用一个 <strong>老旧的</strong> 浏览器. 为了您能获取更好的互联网体验，请 <a href="http://browsehappy.com.cn/" target="_blank">升级</a> 您的浏览器.</p>
            <![endif]-->

    <!-- =========================================== mycode =====================================- -->
    <div class="container-fluid top">
        <img src="<?php echo $this->config->item('base_url').'/public/asd/reg/'?>img/16.png" class="img-responsive" alt="Responsive image">
    </div>
    <div class="container width">
        <!-- <img src="<?php echo $this->config->item('base_url').'/public/asd/reg/'?>img/16.png" class="img-responsive" alt="Responsive image"> -->
        <div class="tip center-block"  style="margin-top:20px">
            <div class="btns center-block" style="margin-left:30%">
                <a href="<?php echo $this->config->item('base_url').'/Reg/index/1'?>" class="btn btn-warning btn-lg">商家注册</button></a>
				<a href="<?php echo $this->config->item('base_url').'/Reg/index/2'?>"  class="btn  btn-info btn-lg">接手注册</a>
            </div>
            <p class="text-center">为了更好的保障平台所有会员的利益，请务必填写真实有效的信息数据！</p>
        </div>
        <div style="margin-bottom:20px">
		<button class="btn  btn-danger btn-lg"><?php if($userType == 1) echo '商家注册';?><?php if($userType == 2) echo '接手注册';?></button>
        </div>
			<div class="alert alert-success alert-dismissable" id="warningdiv" style="display:none; width:30%;position:fixed;right:1%;top:1%">
				
                 <div id="warningtext">
				<h4>
					注意!
				</h4>
                </div>
			</div>
        <form action="<?php echo $this->config->item('base_url');?>/Reg/doreg" method="post" name="form1" id="form1"  class="form" enctype="multipart/form-data">
            <h4>会员基本信息</h4>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 control-label"><span class="xx">*</span>手机号码:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="">
                    <span>请输入正确的手机号码，这将成为您的登录用户名</span>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 control-label"><span class="xx">*</span>密码:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="passwordS" name="passwordS">
                    <input type="hidden" class="form-control" id="userType" name="userType" value="<?php echo !empty($userType) ? $userType : 1;?>">
                    <span>6个字符以上，建议使用字母或数字（区分大小写）</span>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 control-label"><span class="xx">*</span>确认密码:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="passwordF" name="passwordF">
                    <span> 请再输入一遍您上面填写的密码</span>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 control-label"><span class="xx">*</span>电子邮箱:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email"  name="email" placeholder="">
                    <span>用于邮件服务，请务必填写真实可用的邮箱</span>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 control-label"><span class="xx">*</span>QQ号:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="qq" name="qq" >
                    <span>任务交易联系QQ，注册后无法修改</span>
                </div>
            </div>
            <h4>实名认证</h4>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 control-label"><span class="xx">*</span>真实姓名:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control h" id="realName" name="realName" placeholder="">
                    <div class="sex">
                        <input name="usersex" checked="checked" type="radio" value="1">先生
                        <input name="usersex" type="radio" value="2">女士
                    </div>
                    <span>注：个人信息将被严格保密，只限于内部沟通</span>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 control-label"><span class="xx">*</span>身份证号码:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="IDnumber" name="IDnumber">
                    <span>请正确填写真实有效，证件号码。</span>
                </div>
            </div>
            <?php if($userType == 1){?>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 control-label"><span class="xx">*</span>店铺链接:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="shopUrl" name="shopUrl" placeholder="">
                    <span>任务交易联系QQ，注册后无法修改</span>
                </div>
            </div>
            <div class="form-group row imgup">
                <label for="inputEmail3" class="col-sm-2 control-label"><span class="xx">*</span>身份证正面:</label>
                <div class="col-sm-10 clearfix">
                        <img src="<?php echo $this->config->item('base_url').'/public/asd/reg/'?>img/18.png" width="260" height="180" class="img" id="IDpositivePath" alt="">
                        <input type="file" class="form-control" id="IDpositivePath" name="IDpositivePath" placeholder="">
                        <br>
                        <span>严格保密，只限于内部审核，请上传清晰照片，大小可大于800Kb</span>
                </div>
            </div>
            <div class="form-group row imgup">
                <label for="inputEmail3" class="col-sm-2 control-label"><span class="xx">*</span>身份证背面:</label>
                <div class="col-sm-10 clearfix">
                        <img src="<?php echo $this->config->item('base_url').'/public/asd/reg/'?>img/19.png"  width="260" height="180" class="img" id= "IDoppositePath" alt="">
                        <input type="file" class="form-control" id="IDoppositePath" name="IDoppositePath" placeholder="">
                        <br>
                        <span>严格保密，只限于内部审核，请上传清晰照片，大小可大于800Kb</span>
                </div>
            </div>
            <div class="form-group row imgup">
                <label for="inputEmail3" class="col-sm-2 control-label"><span class="xx">*</span>其他带本人照片证件:</label>
                <div class="col-sm-10 clearfix">
                        <img src="<?php echo $this->config->item('base_url').'/public/asd/reg/'?>img/27.png" class="img" width="260" height="180" id="otherIDPath" alt="">
                        <input type="file" class="form-control" id="otherIDPath"  name="otherIDPath" placeholder="">
                        <br>
                        <span>严格保密，只限于内部审核，请上传清晰照片，大小可大于800Kb</span>
                </div>
            </div>
            <div class="form-group row imgup">
                <label for="inputEmail3" class="col-sm-2 control-label"><span class="xx">*</span>支付宝实名截图:</label>
                <div class="col-sm-10 clearfix">
                        <img src="<?php echo $this->config->item('base_url').'/public/asd/reg/'?>img/21.png" class="img" width="260" height="180" id="realpayPath" alt="">
                        <input type="file" class="form-control" id="realpayPath" name="realpayPath" placeholder="">
                        <br>
                        <span>严格保密，只限于内部审核，请上传清晰照片，大小可大于800Kb</span>
                        <div class="anli">

                            案例:<img src="<?php echo $this->config->item('base_url').'/public/asd/reg/'?>img/24.png" class="img-responsive" alt="Responsive image">
                        </div>
                </div>
            </div>
            <div class="form-group row imgup">
                <label for="inputEmail3" class="col-sm-2 control-label"><span class="xx">*</span>卖家中心截图:</label>
                <div class="col-sm-10 clearfix">
                       <img src="<?php echo $this->config->item('base_url').'/public/asd/reg/'?>img/22.png"  width="260" height="180" id="sellerPath" class="img" alt="">
                        <input type="file" class="form-control" id="sellerPath" name="sellerPath" placeholder="">
                        <br>
                        <span>严格保密，只限于内部审核，请上传清晰照片，大小可大于800Kb</span>
                        <div class="anli">

                            案例:<img src="<?php echo $this->config->item('base_url').'/public/asd/reg/'?>img/24.png" class="img-responsive" alt="Responsive image">
                        </div>
                </div>
            </div>
            <?php }else{?>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 control-label"><span class="xx">*</span>银行卡号:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="bankNum" name="bankNum" placeholder="">
                    <span>用于核查您的信息是否真实，这将是您的收款账号，请务必填写真实可用的号码</span>
                </div>
            </div>
            <div class="form-group row imgup">
                <label for="inputEmail3" class="col-sm-2 control-label"><span class="xx">*</span>身份证正面:</label>
                <div class="col-sm-10 clearfix">
                        <img src="<?php echo $this->config->item('base_url').'/public/asd/reg/'?>img/18.png" width="260" height="180" class="img" id="IDpositivePath" alt="">
                        <input type="file" class="form-control" id="IDpositivePath" name="IDpositivePath" placeholder="">
                        <br>
                        <span>严格保密，只限于内部审核，请上传清晰照片，大小可大于800Kb</span>
                </div>
            </div>
            <div class="form-group row imgup">
                <label for="inputEmail3" class="col-sm-2 control-label"><span class="xx">*</span>身份证背面:</label>
                <div class="col-sm-10 clearfix">
                        <img src="<?php echo $this->config->item('base_url').'/public/asd/reg/'?>img/19.png"  width="260" height="180" class="img" id= "IDoppositePath" alt="">
                        <input type="file" class="form-control" id="IDoppositePath"  name="IDoppositePath" placeholder="">
                        <br>
                        <span>严格保密，只限于内部审核，请上传清晰照片，大小可大于800Kb</span>
                </div>
            </div>

            <div class="form-group row imgup">
                <label for="inputEmail3" class="col-sm-2 control-label"><span class="xx">*</span>其他带本人照片证件:</label>
                <div class="col-sm-10 clearfix">
                        <img src="<?php echo $this->config->item('base_url').'/public/asd/reg/'?>img/27.png" class="img" width="260" height="180" id="otherIDPath" alt="">
                        <input type="file" class="form-control" id="otherIDPath" name="otherIDPath" placeholder="">
                        <br>
                        <span>严格保密，只限于内部审核，请上传清晰照片，大小可大于800Kb</span>
                        <div class="anli">

                            案例:<img src="<?php echo $this->config->item('base_url').'/public/asd/reg/'?>img/28.png" class="img-responsive" alt="Responsive image">
                        </div>
                </div>
            </div>

                        <div class="form-group row imgup">
                <label for="inputEmail3" class="col-sm-2 control-label"><span class="xx">*</span>支付宝实名截图:</label>
                <div class="col-sm-10 clearfix">
                       <img src="<?php echo $this->config->item('base_url').'/public/asd/reg/'?>img/21.png" class="img" width="260" height="180" id="realpayPath" alt="">
                        <input type="file" class="form-control" id="realpayPath" name="realpayPath" placeholder="">
                        <br>
                        <span>严格保密，只限于内部审核，请上传清晰照片，大小可大于800Kb</span>
                        <div class="anli">

                            案例:<img src="<?php echo $this->config->item('base_url').'/public/asd/reg/'?>img/24.png" class="img-responsive" alt="Responsive image">
                        </div>
                </div>
            </div>

            <div class="form-group row imgup">
                <label for="inputEmail3" class="col-sm-2 control-label"><span class="xx">*</span>本人银行卡照片:</label>
                <div class="col-sm-10 clearfix">
                        <img src="<?php echo $this->config->item('base_url').'/public/asd/reg/'?>img/22.png"  width="260" height="180" id="sellerPath" class="img" alt="">
                        <input type="file" class="form-control" id="sellerPath"  name="sellerPath" placeholder="">
                        <br>
                        <span>严格保密，只限于内部审核，请上传清晰照片，大小可大于800Kb</span>
                        <div class="anli">
                            案例:<img src="<?php echo $this->config->item('base_url').'/public/asd/reg/'?>img/29.png" class="img-responsive" alt="Responsive image">
                        </div>
                </div>
            </div>
            <?php }?>				
            <div class="form-group row">
                <div class="col-sm-2">&nbsp;</div>
                <div class="col-sm-10">
                    <button class="btn btn-lg btn-primary" type="submit"  onclick="javascript:return checkButton()">
                        同意协议并注册
                    </button>
                    <br>
            <a href="#" class="xy">《ASD服务协议》</a>

                </div>
            </div>


        </form>

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
    <script src="<?php echo $this->config->item('base_url').'/public/asd/reg/'?>js/jquery-1.9.1.min.js" ></script>
    <script src="<?php echo $this->config->item('base_url').'/public/asd/reg/'?>js/bootstrap.min.js"></script>
    <script src="<?php echo $this->config->item('base_url').'/public/asd/reg/'?>js/bootstrap.offcanvas.min.js"></script>

    <script src="<?php echo $this->config->item('base_url').'/public/asd/reg/'?>js/jquery.cookie.js"></script>
    <script>

    </script>
    <script type="text/javascript">
function checkButton(){	
	var phoneNumber = $('#phoneNumber').val();
	var reg = /^0?1[3|4|5|8][0-9]\d{8}$/;
	$.ajax
	({ //一个Ajax过程
	type: "post", //以post方式与后台沟通
	url : "<?php echo $this->config->item('base_url').'/Reg/ajaxPhone';?>", //与此php页面沟通
	dataType:'json',//从php返回的值以 JSON方式 解释
	async:false,
	data: 'phoneNumber='+phoneNumber,
	success: function(response)
	{//如果调用php成功
		phoneres = response;
	}
	});
	if(phoneNumber == '')
	{
		alert('请输入您的手机号码');return false;
	}
	if(reg.test(phoneNumber) == false)
	{
		alert('手机号码格式不正确，请重新输入');return false;
		warning('<strong>错误：&nbsp;&nbsp;<font color="#993300"/font></strong>');return false;
	}
	if(phoneres.err == 1)
	{
		alert('手机号码已经存在，请重新输入');return false;
	}
	

	var passwordS = $('#passwordS').val();
	if(passwordS == '')
	{
		alert('请输入您的密码');return false;
	}
	if(passwordS.length <6)
	{
		alert('密码太过简单');return false;
	}
	if(passwordS.length >15)
	{
		alert('密码不能超过15位');return false;
	}
	
	var passwordF = $('#passwordF').val();
	if(passwordF == '')
	{
		alert('请核对您的密码');return false;
	}
	if(passwordF != passwordS)
	{
		alert('两次输入密码不一致,请重新输入');return false;
	}

	////验证邮箱格式
	var email = $('#email').val();
	var reyx= /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/;
	if(email == '')
	{
		alert('邮箱不能为空');return false;
	}
	if(reyx.test(email) == false)
	{
		alert('邮箱格式不对');return false;
	}
	
	var qq = $('#qq').val();
	var numberreg = new RegExp("^[0-9]*$");  
	if(qq == '')
	{
		alert('请输入您的qq号码');return false;
	}
	if(numberreg.test(qq) == false)
	{
		alert('格式不正确，请重新输入');return false;
	}
	
	var realName = $('#realName').val();
	if(realName == '')
	{
		alert('请输入您的真实姓名');return false;
	}
	
	var IDpositivePath = $('input[name="IDpositivePath"]').prop('files');//获取到文件列表
	if(IDpositivePath.length == 0)
	{
		alert('请上传您的身份证正面照');return false;
	}
	
	var IDoppositePath = $('input[name="IDoppositePath"]').prop('files');//获取到文件列表
	if(IDoppositePath.length == 0)
	{
		alert('请上传您的身份证反面照');return false;
	}
	
	var otherIDPath = $('input[name="otherIDPath"]').prop('files');//获取到文件列表
	if(otherIDPath.length == 0)
	{
		alert('请上传您其他证件照');return false;
	}
	
	var realpayPath = $('input[name="realpayPath"]').prop('files');//获取到文件列表
	if(realpayPath.length == 0)
	{
		alert('请您上传您的支付宝实名图');return false;
	}
	
	var sellerPath = $('input[name="sellerPath"]').prop('files');//获取到文件列表
	if(sellerPath.length == 0)
	{
		alert('>请上传您的淘宝账号截图');return false;
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
<script type="text/javascript">
	$('input[name="IDpositivePath"]').on('change',function() {
		
		if(typeof this.files == 'undefined'){
			return;
		}
		var img		 = this.files[0];//获取图片信息
		var type		 = img.type;//获取图片类型，判断使用
		var url		 = getObjectURL(this.files[0]);//使用自定义函数，获取图片本地url
		var fd			 = new FormData();//实例化表单，提交数据使用
		fd.append('img',img);//将img追加进去
		if(url)
			$('#IDpositivePath').attr('src',url).show();//展示图片
		if(type.substr(0,5) != 'image'){//无效的类型过滤
			alert('非图片类型，无法上传！');
			return;
		}
	});
	
	$('input[name="IDoppositePath"]').on('change',function() {
		
		if(typeof this.files == 'undefined'){
			return;
		}
		var img		 = this.files[0];//获取图片信息
		var type		 = img.type;//获取图片类型，判断使用
		var url		 = getObjectURL(this.files[0]);//使用自定义函数，获取图片本地url
		var fd			 = new FormData();//实例化表单，提交数据使用
		fd.append('img',img);//将img追加进去
		if(url)
			$('#IDoppositePath').attr('src',url).show();//展示图片
		if(type.substr(0,5) != 'image'){//无效的类型过滤
			alert('非图片类型，无法上传！');
			return;
		}
	});
	
	$('input[name="otherIDPath"]').on('change',function() {
		
		if(typeof this.files == 'undefined'){
			return;
		}
		var img		 = this.files[0];//获取图片信息
		var type		 = img.type;//获取图片类型，判断使用
		var url		 = getObjectURL(this.files[0]);//使用自定义函数，获取图片本地url
		var fd			 = new FormData();//实例化表单，提交数据使用
		fd.append('img',img);//将img追加进去
		if(url)
			$('#otherIDPath').attr('src',url).show();//展示图片
		if(type.substr(0,5) != 'image'){//无效的类型过滤
			alert('非图片类型，无法上传！');
			return;
		}
	});
	
	$('input[name="realpayPath"]').on('change',function() {
		
		if(typeof this.files == 'undefined'){
			return;
		}
		var img		 = this.files[0];//获取图片信息
		var type		 = img.type;//获取图片类型，判断使用
		var url		 = getObjectURL(this.files[0]);//使用自定义函数，获取图片本地url
		var fd			 = new FormData();//实例化表单，提交数据使用
		fd.append('img',img);//将img追加进去
		if(url)
			$('#realpayPath').attr('src',url).show();//展示图片
		if(type.substr(0,5) != 'image'){//无效的类型过滤
			alert('非图片类型，无法上传！');
			return;
		}
	});
	
	$('input[name="sellerPath"]').on('change',function() {
		
		if(typeof this.files == 'undefined'){
			return;
		}
		var img		 = this.files[0];//获取图片信息
		var type		 = img.type;//获取图片类型，判断使用
		var url		 = getObjectURL(this.files[0]);//使用自定义函数，获取图片本地url
		var fd			 = new FormData();//实例化表单，提交数据使用
		fd.append('img',img);//将img追加进去
		if(url)
			$('#sellerPath').attr('src',url).show();//展示图片
		if(type.substr(0,5) != 'image'){//无效的类型过滤
			alert('非图片类型，无法上传！');
			return;
		}
	});

	//自定义获取图片路径函数
	function getObjectURL(file) {
		var url = null ;
		if (window.createObjectURL!=undefined) { // basic
			url = window.createObjectURL(file) ;
		} else if (window.URL!=undefined) { // mozilla(firefox)
			url = window.URL.createObjectURL(file) ;
		} else if (window.webkitURL!=undefined) { // webkit or chrome
			url = window.webkitURL.createObjectURL(file) ;
		}
		return url ;
	}
</script>
</body>
</html>
