<?php $header?>
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
                                    详细描述
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
                                    <?php echo !empty($v['taskmoney']) ? $v['taskmoney'] : '';?>元
                                <br>
                                    <span class="you">优号可议</span>
                                </td>
                                <td>
                                    <?php echo !empty($v['taskNum']) ? $v['taskNum'] : '';?>
                                </td>
                                <td>
                                <?php if($v['isend'] == 0){?>
                                    <a href="<?php echo $this->config->item('base_url').'/shopadmin/Task/cancelTask/'.$v['tId'].'/1?backurl='.$backurl;?>" class="btn btn-sm btn-primary" onClick="return confirm('确认取消并停用该任务吗？')">取消任务</a>
                                <?php }elseif($v['isend'] == 1){?>
                                <a href="<?php echo $this->config->item('base_url').'/shopadmin/Task/cancelTask/'.$v['tId'].'/2?backurl='.$backurl;?>" onClick="return confirm('确认废弃该任务吗？')" class="btn btn-sm btn-danger">废弃任务</a>
								<?php }elseif($v['isend'] == 2){?>
                                <a href="<?php echo $this->config->item('base_url').'/shopadmin/Task/cancelTask/'.$v['tId'].'/0?backurl='.$backurl;?>" class="btn btn-sm btn-warning" onClick="return confirm('确认重新启用该任务吗？')">恢复任务</a>
                                <a href="<?php echo $this->config->item('base_url').'/shopadmin/Task/deleteTask/'.$v['tId'].'?backurl='.$backurl;?>" class="btn btn-sm btn-danger">删除任务</a>
								<?php }?>    
                                     <a class="btn btn-sm btn-success" onClick="show_div(<?php echo !empty($v['tId']) ? $v['tId'] : '';?>)">显示接手</a>

                                </td>


                            </tr>
                            <tr>
                                <td colspan="6">
                                <div id="<?php echo !empty($v['tId']) ? $v['tId'] : '';?>" style="display:none">
                                
                                    	<?php if(!empty($v['jieshoulist'])) foreach($v['jieshoulist'] as $key=>$val){?>
                                    <p class="text-right">
                                        <span><?php echo !empty($val['userinfo']['realName']) ? $val['userinfo']['realName']: '';?>：已接:数量为:<?php echo $val['taskNum']?>份</span>
                                        <span><img src="<?php echo $this->config->item('base_url').'/public/asd/'?>img/11.png" class="img-responsive center-block" alt="Responsive image">QQ：<?php echo !empty($v['userinfo']['qq']) ? $v['userinfo']['qq'] : '';?><img src="<?php echo $this->config->item('base_url').'/public/asd/'?>img/12.png" class="img-responsive center-block" alt="Responsive image"></span><a href="<?php echo $this->config->item('base_url').'/shopadmin/Task/canelTask/'.!empty($val['juId']) ? $val['juId'] : '' .'/'.$v['tId'].'?backurl='.$backurl?>" onclick="return confirm('确认取消该用户的资格吗');">取消资格</a>   <a href="<?php echo $this->config->item('base_url').'/shopadmin/Task/endJiehsouTask/'.$val['juId'].'/'.$v['tId'].'/1?backurl='.$backurl?>" onclick="return confirm('确认完成该任务吗？');">确认完成</a>
                                    </p>
                                    	<?php }else{?>
                                    <p class="text-right">
                                    	暂时没有人接收您的任务！
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
