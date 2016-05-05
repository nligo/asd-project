<?php $header;?>
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
                                    支付账号
                                </th>
                                <th>
                                    流水单号
                                </th>
                                <th>
                                    申请时间
                                </th>
                                <th>
                                    操作
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                       	<?php if($paylist) foreach($paylist as $k=>$v){?>
                            <tr>
                                <td>
                                    <?php echo !empty($v['uId']) ? $v['uId'] : '';?>
                                </td>
                                <td>
                                    <?php echo !empty($v['phoneNumber']) ? $v['phoneNumber'] : '';?>
                                </td>
                                <td>
                                    <?php echo !empty($v['apayNum']) ? $v['apayNum'] : '';?>
                                </td>
                                <td>
                                    <?php echo !empty($v['apayStreamNum']) ? $v['apayStreamNum'] : '';?>
                                </td>
                                 <td>
                                    <?php echo !empty($v['createTime']) ? date('Y-m-d H:i',$v['createTime']) : '';?>
                                </td>
                                <td>
                                <?php if($v['isactivate'] == 0){?>
                                	<a href="<?php echo $this->config->item('base_url').'/admin/Checkuser/changeUser/'.$v['aId'].'/1?backurl='.$backurl;?>" class="btn btn-sm btn-primary" onClick="return confirm('确认激活该用户吗？')">确定激活</a>
                                 <?php }else{?>
                                 <a href="<?php echo $this->config->item('base_url').'/admin/Checkuser/changeUser/'.$v['aId'].'/0?backurl='.$backurl;?>" onClick="return confirm('确认取消用户的激活信息吗？')" class="btn btn-sm btn-danger">取消激活</a>
                                 <?php }?>   
                                 <a href="<?php echo $this->config->item('base_url').'/admin/Checkuser/userinfo/'.$v['uId'].'?backurl='.$backurl;?>" class="btn btn-sm btn-default" >查看详情</a>
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
                    	<a>共(<?php echo $count;?>)条激活信息</a>
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
