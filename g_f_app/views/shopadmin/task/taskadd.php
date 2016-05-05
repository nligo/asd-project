<?php $header;?>
            <div class="row">
                <div class="col-md-12">
                    <div class="tasks center-block">

                        <!-- 单个任务 -->
                        <div class="task">
                            <h3>发布任务</h3>
                            <div class="alert alert-success alert-dismissable" id="warningdiv" style="display:none">
				
                 			<div id="warningtext">
                                <h4>
                                    注意!
                                </h4>
                            </div>
						</div>
                            <div class="row">
                                <div class="col-xs-7">
                                    <form action="<?php echo $this->config->item('base_url');?>/shopadmin/Task/taskdoadd" method="post" name="form1" id="form1" class="form-horizontal">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">任务标题:</label>
                                            <div class="col-sm-9">
                                                <textarea type="text" class="form-control" id="tasktitle" placeholder="请输入任务描述" name="tasktitle"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input3" class="col-sm-2 control-label">联系qq:</label>
                                            <div class="col-sm-9">
                                                <p><?php echo !empty($sessioninfo['qq']) ? $sessioninfo['qq'] : '';?></p>
                                                <input type="hidden" name="qq" id="qq" value="<?php echo !empty($sessioninfo['qq']) ? $sessioninfo['qq'] : '';?>">
                                                <span class="hou">提示:后台<span>编辑</span></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input3" class="col-sm-2 control-label">付款方式:</label>
                                            <div class="col-sm-9">
                                                <input type="radio" name="payway" value="2" checked="checked">
                                                垫付
                                                <input type="radio" name="payway" value="1">
                                                远程

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input3" class="col-sm-2 control-label">商品类型:</label>
                                            <div class="col-sm-9">
                                                <img src="<?php echo $this->config->item('base_url').'/public/asd/shopaddtask/'?>img/777.png">是否七天购物
                                                <input type="radio" name="is7days" value="1" checked="checked">
                                                是
                                                <input type="radio" name="is7days"  value="2">
                                                否
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input3" class="col-sm-2 control-label">操作类型:</label>
                                            <div class="col-sm-9">
                                                <img src="<?php echo $this->config->item('base_url').'/public/asd/shopaddtask/'?>img/62.png">
                                                <input type="radio" name="optype" value="1" checked="checked">
                                                手机单
                                                <img src="<?php echo $this->config->item('base_url').'/public/asd/shopaddtask/'?>img/63.png">
                                                <input type="radio" name="optype" value="2">
                                                电脑单
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="input3" class="col-sm-2 control-label">返款时间:</label>
                                            <div class="col-sm-9">
                                                <img src="<?php echo $this->config->item('base_url').'/public/asd/shopaddtask/'?>img/64.png">
                                                <input type="radio" name="fanTime" value="1" checked="checked">
                                                立返
                                                <img src="<?php echo $this->config->item('base_url').'/public/asd/shopaddtask/'?>img/65.png">
                                                <input type="radio" name="fanTime" value="2">
                                                3小时返款
                                                <img src="<?php echo $this->config->item('base_url').'/public/asd/shopaddtask/'?>img/66.png">
                                                <input type="radio" name="fanTime" value="3">
                                                6小时返款
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="input3" class="col-sm-2 control-label">小号要求:</label>
                                            <div class="col-sm-9">
                                                <!-- <input type="text" class="form-control check" id="input3" placeholder=""> -->
                                                <select name="startNum" id="startNum">
                                                	<option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                </select>
                                                <img src="<?php echo $this->config->item('base_url').'/public/asd/'?>img/b_red_1.gif" alt="">
                                                <select name="endNum" id="endNum">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                </select>
                                                <img src="<?php echo $this->config->item('base_url').'/public/asd/'?>img/b_blue_1.gif" alt="">



                                                <span class="hou">提示:后台<span>编辑</span></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input3" class="col-sm-2 control-label">本金：</label>
                                            <div class="col-sm-3">
                                                <input type="text" maxlength="6" class="form-control" id="principal" placeholder="" name="principal">
                                                元

                                                <!-- <input type="checkbox" class="form-control" id="input3" placeholder="">元 --></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input3" class="col-sm-2 control-label">任务佣金</label>
                                            <div class="col-sm-3">
                                                <input type="text" maxlength="6" class="form-control" id="taskmoney" placeholder="" name="taskmoney">
                                                元
                                                <span class="you">优号可议</span>
                                                <span class="hou">提示:后台<span>编辑</span></span>

                                                <!-- <input type="checkbox" class="form-control" id="input3" placeholder="">元 --></div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="input3" class="col-sm-2 control-label">任务数量</label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" maxlength="6"  id="taskNum" placeholder="" name="taskNum">
                                                份
                                                <span class="hou">提示:后台<span>编辑</span></span>

                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-left:40px">
                                            
                                            <div class="col-sm-2">
                                                 <button type="submit"class="btn btn-primary"  name="btn" id="btn"  onclick="javascript:return checkButton()" >确认发布</button>

                                            </div>
                                        </div>
                                    
                                </div>
                                <div class="col-xs-5" style="margin-top:200px">
                                    <div class="mybtn2">
                                       
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                        <!-- 结束 -->

                    </div>
                </div>
                










                    <!-- <div class="pull-right"><p class="text-right">任务编号：15666555555454</p></div> -->
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
    <script type="text/javascript">
	function checkButton(){	
	var tasktitle = $('#tasktitle').val();
 	if(tasktitle == '')
	{
		alert('任务不能为空');return false;
	}
	if(tasktitle.length>150)
	{
		alert('任务描述过长');return false;
	}
	var numberreg = new RegExp("^[0-9]*$");  
	
	var principal = $('#principal').val();
	if(principal == '')
	{
		alert('本金不能为空');return false;
	}
	if(numberreg.test(principal) == false)
	{
		alert('请输入正确的数字金额');return false;
	}
	var taskmoney = $('#taskmoney').val();
	if(taskmoney == '')
	{
		alert('佣金不能为空');return false;
	}
	if(numberreg.test(taskmoney) == false)
	{
		alert('请输入正确的数字');return false;
	}
	if(taskmoney < '6')
	{
		alert('佣金不能低于6元');return false;
	}
	if(taskmoney.length>5)
	{
		alert('佣金金额不能超过五位数');return false;
	}
 	var taskNum = $('#taskNum').val();
	
	if(taskNum == '')
	{
		alert('数量不能为空');return false;
	}
	if(numberreg.test(taskNum) == false)
	{
		alert('请输入正确的数字');return false;
	}
	if(taskNum < '10')
	{
		alert('数量不能少于10份');return false;
	}
	if(taskNum.length>6)
	{
		alert('数量不能少于超过6位数');return false;
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
