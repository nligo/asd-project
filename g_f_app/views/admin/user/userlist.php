<?php $header;?>
<form class="form-inline" method="post" action="<?php echo $this->config->item('base_url').	'/admin/Useradmin/index/';?>">
                <div class="panel-search">	
                	<div class="form-group">
                        <label for="studentName">请输入用户名：</label>
                        <input type="text" name="username" id="username" class="form-control" value="<?php echo (!empty($param['username'])) ? $param['username'] : '';?>"/>
                    </div>
                    
                    <div class="form-group">
                        <label for="studentName">用户类型：</label>
                        <select name="userType" class="form-control">
                        	<option value="4"<?php if($param['userType'] == 4){echo 'selected';}?>>请选择</option>
                            <option value="1" <?php if($param['userType'] === 1){echo 'selected';}?>>商家用户</option>
                            <option value="2" <?php if($param['userType'] == 2){echo 'selected';}?>>接手用户</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="studentName">是否激活：</label>
                        <select name="isactivate" class="form-control">
                        	<option value="4"<?php if($param['isactivate'] == 4){echo 'selected';}?>>请选择</option>
                            <option value="0" <?php if($param['isactivate'] == 0){echo 'selected';}?>>未激活</option>
                            <option value="1" <?php if($param['isactivate'] == 1){echo 'selected';}?>>已激活</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> 搜 索</button>
                    </div>
				</div>	               	
            </form>            
            <div class="clear"></div>
            <div class="doing">
                <div class="doingtable">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    用户ID
                                </th>
                                <th>
                                    用户手机号
                                </th>
                                <th>
                                	真实姓名    
                                </th>
                                <th>
                                	所属类型    
                                </th>
                                <th>
                                    是否激活
                                </th>
                                <th>
                                    操作
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                       	<?php if($userlist) foreach($userlist as $k=>$v){?>
                            <tr>
                                <td>
                                    <?php echo !empty($v['uId']) ? $v['uId'] : '';?>
                                </td>
                                <td>
                                    <?php echo !empty($v['phoneNumber']) ? $v['phoneNumber'] : '';?>
                                </td>
                                <td>
                                    <?php echo !empty($v['realName']) ? $v['realName'] : '';?>
                                </td>
                                <td>
                                    <?php echo $v['userType'] == 1 ? '商家用户': '接手用户';?>
                                </td>
                                 <td>
                                    <?php if($v['isactivate'] == 1){echo '未激活';}elseif($v['isactivate'] == 2) {echo '已激活';}else{echo '拉黑用户';}?>
                                </td>
                                <td>
                                <a href="<?php echo $this->config->item('base_url').'/admin/Checkuser/userinfo/'.$v['uId'].'?backurl='.$backurl;?>" class="btn btn-sm btn-default" >查看详情</a>
                                </td>
                                </td>
                            </tr>
                             <?php }?>
                        </tbody>
                    </table>
                </div>

            </div>
		<div class="col-md-12 column">
			<ul class="pagination">
				<li>
                    	<a>共(<?php echo $count;?>)位用户</a>
                    </li>
					<?php echo $this->pagination->create_links($pageparam);?>
			</ul>
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
    function show_div(aa){
			var obj_div=document.getElementById(aa);
			obj_div.style.display=(obj_div.style.display=='none')?'block':'none';
		}
    </script>
    
</body>
</html>
