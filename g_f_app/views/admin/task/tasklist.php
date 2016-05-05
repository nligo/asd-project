<?php $header?>
<form class="form-inline" method="post" action="<?php echo $this->config->item('base_url').	'/admin/Task/index/';?>">
                <div class="panel-search">	
                	<div class="form-group">
                        <label for="studentName">请输入任务标题：</label>
                        <input type="text" name="tasktitle" id="tasktitle" class="form-control" value="<?php echo (!empty($param['tasktitle'])) ? $param['tasktitle'] : '';?>"/>
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
                                    任务ID
                                </th>
                                <th>
                                    任务标题
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
                        <?php if(!empty($tasklist)) foreach($tasklist as $k=>$v){?>
                            <tr>
                                <td>
                                    <?php echo !empty($v['tId']) ? $v['tId'] : '';?>
                                </td>
                             	<td>
                                    <?php echo !empty($v['tasktitle']) ? $v['tasktitle'] : '';?>
                                </td>
                                 <td>
                                    <?php echo !empty($v['principal']) ? $v['principal'] : '';?>元 
                                </td>
                                <td>
                                    <?php echo !empty($v['taskmoney']) ? $v['taskmoney'] : '';?>元 
                                </td>
                                <td>
                                    <?php echo !empty($v['taskNum']) ? $v['taskNum'] : '';?>
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
                    	<a>共(<?php echo $count;?>)条任务</a>
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
