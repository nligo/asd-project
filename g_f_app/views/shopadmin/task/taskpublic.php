<?php $header?>
<div class="doing">
                <div class="notices">
                    <form class="form-inline" method="post" action="<?php echo $this->config->item('base_url').	'/shopadmin/Task/taskpublic/';?>">
                <div class="panel-search">	
                	<div class="form-group">
                        <label for="studentName">支付方式：</label>
                        <select name="payway" style="color:#000">
                        	<option value="3" <?php if($param['payway'] == 3) echo 'selected';?>>请选择</option>
                            <option value="1" <?php if($param['payway'] == 1) echo 'selected';?>>远程</option>
                            <option value="2" <?php if($param['payway'] == 2) echo 'selected';?>>垫付</option
                        ></select>
                    </div>
                    
                    <div class="form-group">
                        <label for="studentName">是否七天购物：</label>
                        <select name="is7days" style="color:#000">
                        	<option value="3" <?php if($param['is7days'] == 3) echo 'selected';?>>请选择</option>
                            <option value="1" <?php if($param['is7days'] == 1) echo 'selected';?>>是</option>
                            <option value="2" <?php if($param['is7days'] == 2) echo 'selected';?>>否</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="studentName">操作类型：</label>
                        <select name="optype" style="color:#000">
                        	<option value="3" <?php if($param['optype'] == 3) echo 'selected';?>>请选择</option>
                            <option value="1" <?php if($param['optype'] == 1) echo 'selected';?>>手机单</option>
                            <option value="2" <?php if($param['optype'] == 2) echo 'selected';?>>电脑单</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="studentName">返款方式：</label>
                        <select name="fanTime" style="color:#000">
                        	<option value="4" <?php if($param['fanTime'] == 4) echo 'selected';?>>请选择</option>
                            <option value="1" <?php if($param['fanTime'] == 1) echo 'selected';?>>立返</option>
                            <option value="2" <?php if($param['fanTime'] == 2) echo 'selected';?>>三小时</option>
                            <option value="3" <?php if($param['fanTime'] == 3) echo 'selected';?>>六小时</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> 搜 索</button>
                    </div>
				</div>	               	
            </form> 
            </div>      
            <div class="doing">
                <div class="doingtable">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    任务ID
                                </th>
                                <th>
                                    任务标题
                                </th>
                                <th>
                                    类型
                                </th>
                                <th>
                                    任务本金
                                </th>
                                <th>
                                    任务佣金
                                </th>
                                <th>
                                    任务数量
                                </th>
                                <th>
                                    操作
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($tasklist as $k=>$v){?>
                            <tr>
                                <td>
                                    <?php echo !empty($v['tId']) ? $v['tId'] : '';?>
                                </td>
                             	<td>
                                	<?php if($v['optype'] == 1){?>
                                    <img src="<?php echo $this->config->item('base_url').'/public/asd/shopaddtask/'?>img/62.png">&nbsp;
                                    <?php }else{?>
                                    <img src="<?php echo $this->config->item('base_url').'/public/asd/shopaddtask/'?>img/63.png">&nbsp;
                                   
                                    
                                    <?php }?>
                                    <?php if($v['fanTime'] == 1){?>
                                     <img src="<?php echo $this->config->item('base_url').'/public/asd/shopaddtask/'?>img/64.png">
                                    <?php }elseif($v['fanTime'] == 2){?>
                                     <img src="<?php echo $this->config->item('base_url').'/public/asd/shopaddtask/'?>img/65.png">
                                    <?php }else{?>
                                     <img src="<?php echo $this->config->item('base_url').'/public/asd/shopaddtask/'?>img/66.png">
                                    <?php }?> 
                                    <?php echo !empty($v['tasktitle']) ? $v['tasktitle'] : '';?>
                                </td>
                                <td>
									<span>【<?php echo $v['payway'] == 1 ? '远程' : '垫付';?>】</span>
                                <br>
                                <span>【<?php echo $v['optype'] == 1 ? '手机单' : '电脑单';?>】</span>
                                <br>
                                <span>【<?php if($v['optype'] == 1){ echo '立返';}elseif($v['optype'] == 2){echo '三小时';}else{echo '六小时';}?>】</span>
                                </td>
                                <td>
                                    <?php echo !empty($v['principal']) ? $v['principal'] : '';?>元 
                                </td>
                                <td>
                                    <?php echo !empty($v['taskmoney']) ? $v['taskmoney'] : '';?>元
                                <br>
                                    <span class="you">优号可议</span>
                                </td>
                                <td>
                                    <?php echo !empty($v['taskNum']) ? $v['taskNum'] : '';?>
                                </td>
                                <td>   
                                     <a href="#" class="btn btn-sm btn-success" onClick="show_div(<?php echo !empty($v['tId']) ? $v['tId'] : '';?>)">显示接手</a>

                                </td>


                            </tr>
                            <tr>
                                <td colspan="6">
                                <div  id="<?php echo !empty($v['tId']) ? $v['tId'] : '';?>" style="display:none">
                                    <?php if(!empty($v['jieshoulist'])) foreach($v['jieshoulist'] as $key=>$val){?>
                                    <p class="text-right">
                                        <span><?php echo !empty($val['userinfo']['realName']) ? $val['userinfo']['realName']: '';?>：已接</span>

                                        <span><img src="<?php echo $this->config->item('base_url').'/public/asd/'?>img/11.png" class="img-responsive center-block" alt="Responsive image">QQ：<?php echo !empty($v['userinfo']['qq']) ? $v['userinfo']['qq'] : '';?><img src="<?php echo $this->config->item('base_url').'/public/asd/'?>img/12.png" class="img-responsive center-block" alt="Responsive image"></span>
                                    </p>
                                    <?php }else{?>
                                    <p class="text-right">
                                    	暂时无接手的任务！
                                    </p>
                                    <?php }?>
                                   
                                </div>    
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
                    	<a>共(<?php echo $count;?>)条评论</a>
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
