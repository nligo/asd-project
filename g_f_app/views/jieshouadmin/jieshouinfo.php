<?php $header;?>
            <div class="myinfo">
                <h2><img src="<?php echo $this->config->item('base_url').'/public/asd/'?>img/10.png" class="img-responsive center-block" alt="Responsive image">个人汇总</h2>
                <div class="infos">
                    <div class="row">
                        <div class="col-xs-4">
                            <div class="info info1 center-block text-center">
                                <?php echo !empty($counttask) ? $counttask : 0;?><span>个</span>
                                <h3 class="text-center">我的总任务数</h3>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="info info2 center-block text-center">
                                <?php echo !empty($countend) ? $countend : 0;?><span>个</span>
                                <h3 class="text-center">我的完成任务数</h3>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="info info3 center-block text-center">
                                <?php echo !empty($countmoney['countmoney']) ? $countmoney['countmoney'] : 0;?><span>个</span>
                                <h3 class="text-center">我的佣金总额</h3>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
		
         
        <div class="row clearfix" style="margin-top:50px">
           
		<div class="col-md-12 column"  id="userinfo" >
        <div class="alert alert-success alert-dismissable" id="warningdiv" style="display:none">
				
                 			<div id="warningtext">
                                <h4>
                                    注意!
                                </h4>
                            </div>
						</div>
        <h1>用户信息</h1>
             <form action="<?php echo $this->config->item('base_url');?>/admin/User/changeInfo" method="post" name="form1" id="form1" class="form-horizontal" >
				<div class="form-group">
					 <label for="inputEmail3" class="col-sm-2 control-label">用户名</label>
                     ,<input type="hidden" name="uId" id="uId" value="<?php echo $info['uId'] ? $info['uId'] : '';?>" />
					<div class="col-sm-3">
						<?php echo $info['username']?>
					</div>
				</div>
				<div class="form-group">
					 <label for="inputPassword3" class="col-sm-2 control-label">密码：</label>
					<div class="col-sm-3">
						<input type="password" class="form-control" id="password"  name="password"/>
					</div>
				</div>
                <div class="form-group">
					 <label for="inputPassword3" class="col-sm-2 control-label">请输入新密码：</label>
					<div class="col-sm-3">
						<input type="password" class="form-control" id="passwordS"  name="passwordS"/>
					</div>
				</div>
                <div class="form-group">
					 <label for="inputPassword3" class="col-sm-2 control-label">请重复输入密码：</label>
					<div class="col-sm-3">
						<input type="password" class="form-control" id="passwordF"  name="passwordF"/>
					</div>
				</div>
                <div class="form-group">
					 <label for="inputPassword3" class="col-sm-2 control-label">email:</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" id="email" name="email" value="<?php echo !empty($info['email']) ? $info['email'] : '';?>"/>
					</div>
				</div>
				<div class="form-group">
					 <label for="inputPassword3" class="col-sm-2 control-label">qq:</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" id="qq" name="qq" value="<?php echo !empty($info['qq']) ? $info['qq'] : '';?>" />
					</div>
				</div>
                <div class="form-group">
					 <label for="inputPassword3" class="col-sm-2 control-label">真实姓名:</label>
					<div class="col-sm-3">
						<input type="password"  disabled="disabled" class="form-control" id="realName" name="realName" value="<?php echo !empty($info['realName']) ? $info['realName'] : '';?>" />
					</div>
				</div>
                <div class="form-group">
					 <label for="inputPassword3" class="col-sm-2 control-label">身份证号:</label>
					<div class="col-sm-3">
						<input type="password"  disabled="disabled" class="form-control" id="IDnumber" name="IDnumber" value="<?php echo !empty($info['IDnumber']) ? $info['IDnumber'] : '';?>" />
					</div>
				</div>
                <div class="form-group">
					 <label for="inputPassword3" class="col-sm-2 control-label">手机号码:</label>
					<div class="col-sm-3">
						<input type="password"  disabled="disabled" class="form-control" id="phoneNumber" name="phoneNumber" value="<?php echo !empty($info['phoneNumber']) ? $info['phoneNumber'] : '';?>" />
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						 <button type="submit" class="btn btn-primary"  onclick="javascript:return checkButton()" >确认修改</button>
					</div>
				</div>
			</form>
		</div>
	</div>
        </div>
    </div>
    
    
</div>

   <!-- ============================================ end =======================================- -->



<!--[if (gte IE 9)|!(IE)]>
<!-->
<!--<![endif]-->
<!--[if lte IE 8 ]>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="http://cdn.bootcss.com/respond.<?php echo $this->config->item('base_url').'/public/asd/'?>js/1.4.2/respond.min.js"></script>
<script src="http://cdn.bootcss.com/html5shiv/r29/html5.min.js"></script>
<script src="assets/<?php echo $this->config->item('base_url').'/public/asd/'?>js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->
    <script src="<?php echo $this->config->item('base_url').'/public/asd/'?>js/jquery-1.9.1.min.js" ></script>
    <script src="<?php echo $this->config->item('base_url').'/public/asd/'?>js/bootstrap.min.js"></script>
    <script src="<?php echo $this->config->item('base_url').'/public/asd/'?>js/bootstrap.offcanvas.min.js"></script>

    <script src="<?php echo $this->config->item('base_url').'/public/asd/'?>js/jquery.cookie.js"></script>
    <script>
 window.onload = function(){
            $(".right").css("width",(document.body.clientWidth-250+10) + "px");
        }
    </script>
    <script>
    function show_div(){
			var obj_div=document.getElementById('userinfo');
			obj_div.style.display=(obj_div.style.display=='none')?'block':'none';
		}
    </script>
      <script type="text/javascript">
function checkButton(){	
	var password = $('#password').val();
	var reg = /^0?1[3|4|5|8][0-9]\d{8}$/;
	$.ajax
	({ //一个Ajax过程
	type: "post", //以post方式与后台沟通
	url : "<?php echo $this->config->item('base_url').'/admin/User/ajaxPass';?>", //与此php页面沟通
	dataType:'json',//从php返回的值以 JSON方式 解释
	async:false,
	data: 'password='+password,
	success: function(response)
	{//如果调用php成功
		passwordres = response;
	}
	});
	if(password == '')
	{
		warning('<strong>错误：&nbsp;&nbsp;<font color="#993300">请输入您的登录密码</font></strong>');return false;
	}

	if(passwordres.err == 0)
	{
		warning('<strong>错误：&nbsp;&nbsp;<font color="#993300">用户密码不正确</font></strong>');return false;
	}
	

	var passwordS = $('#passwordS').val();
	if(passwordS == '')
	{
		warning('<strong>错误：&nbsp;&nbsp;<font color="#993300">请输入新密码</font></strong>');return false;
	}
	
	var passwordF = $('#passwordF').val();
	if(passwordF == '')
	{
		warning('<strong>错误：&nbsp;&nbsp;<font color="#993300">请核对您的密码</font></strong>');return false;
	}
	if(passwordF != passwordS)
	{
		warning('<strong>错误：&nbsp;&nbsp;<font color="#993300">两次输入密码不一致，请重新输入</font></strong>');return false;
	}

	////验证邮箱格式
	var email = $('#email').val();
	var reyx= /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/;
	if(email == '')
	{
		warning('<strong>错误：&nbsp;&nbsp;<font color="#993300">邮箱不能为空</font></strong>');return false;
	}
	if(reyx.test(email) == false)
	{
		warning('<strong>错误：&nbsp;&nbsp;<font color="#993300">邮箱格式不对</font></strong>');return false;
	}
	
	var qq = $('#qq').val();
	var numberreg = new RegExp("^[0-9]*$");  
	if(qq == '')
	{
		warning('<strong>错误：&nbsp;&nbsp;<font color="#993300">请输入您的qq号码</font></strong>');return false;
	}
	if(numberreg.test(qq) == false)
	{
		warning('<strong>错误：&nbsp;&nbsp;<font color="#993300">格式不正确，请重新输入</font></strong>');return false;
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
