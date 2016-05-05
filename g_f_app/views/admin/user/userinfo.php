
    <title>用户信息</title>
</head>
<body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">您正在使用一个 <strong>老旧的</strong> 浏览器. 为了您能获取更好的互联网体验，请 <a href="http://browsehappy.com.cn/" target="_blank">升级</a> 您的浏览器.</p>
            <![endif]-->

    <!-- =========================================== mycode =====================================- -->
    <div class="container-fluid top">
        <img src="<?php echo $this->config->item('base_url').'/public/asd/reg/'?>img/16.png" class="img-responsive" alt="Responsive image">
    </div>
    <div class="container" style="width:100%">
        <!-- <img src="<?php echo $this->config->item('base_url').'/public/asd/reg/'?>img/16.png" class="img-responsive" alt="Responsive image"> -->
            <h4>会员基本信息</h4>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 control-label"><span class="xx">*</span>用户类型:</label>
                <div class="col-sm-10">
                    <span><?php echo ($info['userType'] == 1) ? '商家用户' : '接手会员';?></span>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 control-label"><span class="xx">*</span>手机号码:</label>
                <div class="col-sm-10">
                    <span><?php echo !empty($info['phoneNumber']) ? $info['phoneNumber'] : '';?></span>
                </div>
            </div>
            
            
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 control-label"><span class="xx">*</span>电子邮箱:</label>
                <div class="col-sm-10">
                    <span><?php echo !empty($info['email']) ? $info['email'] : '';?></span>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 control-label"><span class="xx">*</span>QQ号:</label>
                <div class="col-sm-10">
                    
                    <span><?php echo !empty($info['qq']) ? $info['qq'] : '';?></span>
                </div>
            </div>
            <h4>实名认证</h4>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 control-label"><span class="xx">*</span>真实姓名:</label>
                <div class="col-sm-10">
                    <span><?php echo !empty($info['realName']) ? $info['realName'] : '';?></span>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 control-label"><span class="xx">*</span>身份证号码:</label>
                <div class="col-sm-10">
                    <span><?php echo !empty($info['IDnumber']) ? $info['IDnumber'] : '';?></span>
                </div>
            </div>
            <?php if($info['userType'] == 1){?>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 control-label"><span class="xx">*</span>店铺链接:</label>
                <div class="col-sm-10">
                    <span><?php echo !empty($info['shopUrl']) ? $info['shopUrl'] : '';?></span>
                </div>
            </div>
            <div class="form-group row imgup">
                <label for="inputEmail3" class="col-sm-2 control-label"><span class="xx">*</span>身份证正面:</label>
                <div class="col-sm-10 clearfix">
                        <img src="<?php echo $this->config->item('img_url')?><?php echo !empty($userinfo['IDpositivePath']) ? $userinfo['IDpositivePath'] : '';?>" width="260" height="180" class="img" id="IDpositivePath" alt="">
                </div>
            </div>
            <div class="form-group row imgup">
                <label for="inputEmail3" class="col-sm-2 control-label"><span class="xx">*</span>身份证背面:</label>
                <div class="col-sm-10 clearfix">
                        <img src="<?php echo $this->config->item('img_url')?><?php echo !empty($userinfo['IDoppositePath']) ? $userinfo['IDoppositePath'] : '';?>"  width="260" height="180" class="img" id= "IDoppositePath" alt=""> 
                </div>
            </div>
            <div class="form-group row imgup">
                <label for="inputEmail3" class="col-sm-2 control-label"><span class="xx">*</span>其他带本人照片证件:</label>
                <div class="col-sm-10 clearfix">
                        <img src="<?php echo $this->config->item('img_url')?><?php echo !empty($userinfo['otherIDPath']) ? $userinfo['otherIDPath'] : '';?>" class="img" width="260" height="180" id="otherIDPath" alt="">
                </div>
            </div>
            <div class="form-group row imgup">
                <label for="inputEmail3" class="col-sm-2 control-label"><span class="xx">*</span>支付宝实名截图:</label>
                <div class="col-sm-10 clearfix">
                        <img src="<?php echo $this->config->item('img_url')?><?php echo !empty($userinfo['realpayPath']) ? $userinfo['realpayPath'] : '';?>" class="img" width="260" height="180" id="realpayPath" alt="">
                            </div>
            </div>
            <div class="form-group row imgup">
                <label for="inputEmail3" class="col-sm-2 control-label"><span class="xx">*</span>卖家中心截图:</label>
                <div class="col-sm-10 clearfix">
                       <img src="<?php echo $this->config->item('img_url')?><?php echo !empty($userinfo['IDoppositePath']) ? $userinfo['IDoppositePath'] : '';?>"  width="260" height="180" id="sellerPath" class="img" alt="">
                </div>
            </div>
            <?php }else{?>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 control-label"><span class="xx">*</span>银行卡号:</label>
                <div class="col-sm-10">
                    <span><?php echo !empty($info['bankNum']) ? $info['bankNum'] : '';?></span>
                </div>
            </div>
            <div class="form-group row imgup">
                <label for="inputEmail3" class="col-sm-2 control-label"><span class="xx">*</span>身份证正面:</label>
                <div class="col-sm-10 clearfix">
                        <img src="<?php echo $this->config->item('img_url')?><?php echo !empty($userinfo['IDoppositePath']) ? $userinfo['IDpositivePath'] : '';?>" width="260" height="180" class="img" id="IDpositivePath" alt="">
                       </div>
            </div>
            <div class="form-group row imgup">
                <label for="inputEmail3" class="col-sm-2 control-label"><span class="xx">*</span>身份证背面:</label>
                <div class="col-sm-10 clearfix">
                        <img src="<?php echo $this->config->item('img_url')?><?php echo !empty($userinfo['IDoppositePath']) ? $userinfo['IDoppositePath'] : '';?>"  width="260" height="180" class="img" id= "IDoppositePath" alt="">
                     
            </div>

            <div class="form-group row imgup">
                <label for="inputEmail3" class="col-sm-2 control-label"><span class="xx">*</span>其他带本人照片证件:</label>
                <div class="col-sm-10 clearfix">
                        <img src="<?php echo $this->config->item('img_url')?><?php echo !empty($userinfo['otherIDPath']) ? $userinfo['otherIDPath'] : '';?>" class="img" width="260" height="180" id="otherIDPath" alt="">
                </div>
            </div>

                        <div class="form-group row imgup">
                <label for="inputEmail3" class="col-sm-2 control-label"><span class="xx">*</span>支付宝实名截图:</label>
                <div class="col-sm-10 clearfix">
                       <img src="<?php echo $this->config->item('img_url')?><?php echo !empty($userinfo['IDoppositePath']) ? $userinfo['IDoppositePath'] : '';?>" class="img" width="260" height="180" id="realpayPath" alt="">
                        
                </div>
            </div>

            <div class="form-group row imgup">
                <label for="inputEmail3" class="col-sm-2 control-label"><span class="xx">*</span>本人银行卡照片:</label>
                <div class="col-sm-10 clearfix">
                        <img src="<?php echo $this->config->item('img_url')?><?php echo !empty($userinfo['sellerPath']) ? $userinfo['sellerPath'] : '';?>"  width="260" height="180" id="sellerPath" class="img" alt="">
                       
                </div>
            </div>
            <?php }?>				
            <div class="form-group row">
                <div class="col-sm-2">&nbsp;</div>
                <div class="col-sm-10">
                    <br>

                </div>
            </div>

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
</body>
</html>
