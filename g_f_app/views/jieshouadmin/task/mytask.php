<?php $header;?>
            <div class="doing">
            <!--
                <div class="notices">
                    <h3>公告中心:</h3>
                    <p>啥电视手机三贱客是的撒加肯定会撒娇看电视杀菌灯会撒娇的好时机可兑换撒娇回到家看撒谎的撒旦撒旦是的教科书和撒娇的好时机可兑换加厚的 sad
jhkjhlklkjlkhhffhsdjddhfhffhfdshfs交换空间水电费和数据库分或慰问和凤凰网IE和的爽肤水的哈佛UI文化的说法撒娇的偶奇偶的说服力卡号发打</p>
                </div>
                -->
                <div class="doingtable">
                    <table class="table">
                        <thead>
                            <tr>
                            	<th>
                                    任务编号
                                </th>
                                <th>
                                    任务标题
                                </th>
                                <th>
                                    类型
                                </th>
                                <th>
                                    商家QQ
                                </th>
                                <th>
                                    商家手机号
                                </th>
                                <th>
                                    任务数量
                                </th>
                                <th>
                                    任务本金 
                                </th>
                                <th>
                                    任务佣金
                                </th>
                                <th align="left">
                                    操作
                                </th>
                            </tr>
                        </thead>
                        <tbody>
							<?php 
							if(!empty($mytasklist))
							foreach($mytasklist as $k=>$v){
							?>
                            <tr>
                            	<td>
                                   	<?php echo !empty($v['jId']) ? $v['jId']: '';?>
                                </td>
                                <td>
                                   	<?php echo !empty($v['tasklist']['tasktitle']) ? $v['tasklist']['tasktitle']: '';?>
                                </td>
                                <td>
									<span>【<?php echo $v['tasklist']['payway'] == 1 ? '远程' : '垫付';?>】</span>
                                <br>
                                <span>【<?php echo $v['tasklist']['optype'] == 1 ? '手机单' : '电脑单';?>】</span>
                                <br>
                                <span>【<?php if($v['tasklist']['optype'] == 1){ echo '立返';}elseif($v['tasklist']['optype'] == 2){echo '三小时';}else{echo '六小时';}?>】</span>
                                </td>
                                <td>
                               		<?php echo !empty($v['userInfo']['qq']) ? $v['userInfo']['qq']: '';?>    
                               	</td>
                                <td>
                               		<?php echo !empty($v['userInfo']['phoneNumber']) ? $v['userInfo']['phoneNumber']: '';?>    
                               	</td>
                                
                                <td>
                                    <?php echo !empty($v['taskNum']) ? $v['taskNum'] : '';?>
                                </td>
                                <td>
                                    <?php echo !empty($v['tasklist']['principal']) ? $v['tasklist']['principal'] : '';?>元 
                                </td>
                                <td>
                                   <?php echo !empty($v['taskMoney']) ? $v['taskMoney'] : '';?>元
                                    
                                </td>
                                <td>
                                   <a href="<?php echo $this->config->item('base_url').'/jieshouadmin/Task/
cancelmytask/'.$v['jId']?>" onClick="return confirm('确认取消吗？取消后订单金额将退还到商家账户')">取消订单</a>                                    
                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
			<div class="col-md-12 column">
                <ul class="pagination">
                    <li>
                            <a>共(<?php echo $count;?>)条任务</a>
                        </li>
                        <?php echo $this->pagination->create_links($pageparam);?>
                </ul>
			</div
            ></div>
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
</body>
</html>
