<?php
/**
 * PHP域名授权系统
 * =======================================================
 * 版权所有 (C) 2010-2020 www.weby.cc，并保留所有权利。
 * 网站地址: http://www.weby.cc
 * Q Q: 403700890
 * -------------------------------------------------------
 *
 * @version :    v2.6.x
 * =======================================================
 */
    include 'farmwork.php';
	header("content-type:text/html;charset=utf-8");
	login();

	$action = $_GET['action'];
	if($action=='do'){
		$prompt = $_POST['prompt'];
		$website = $_POST['website'];
		$qq = $_POST['qq'];
		$sql = "UPDATE `selfhelp` SET `prompt` = '$prompt', `website` = '$website', `qq` = '$qq' ";
	    mysql_query($sql);
		mysql_close();
		echo("<script language=\"javascript\" type=\"text/javascript\" src=\"/data/assets/js/jquery.min.js\"></script><script language=\"javascript\" type=\"text/javascript\" src=\"/data/assets/layer/layer.js\"></script><script>layer.open({  type: 1  ,title: false   ,closeBtn: false  ,area: '200px;'  ,shade: 0.8  ,id: 'LAY_layuipro'   ,resize: false  ,btn: ['确定']  ,moveType: 1   ,content: '<div style=\"padding: 30px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;\">更新成功！</div>'  ,success: function(layero){ var btn = layero.find('.layui-layer-btn');  btn.find('.layui-layer-btn0').attr({ href: 'selfhelp.php' });  }});</script>");
	}

$li6='class="active"';
$li63='class="active"';
?>
<?php include 'header.php';?>
    <title>自助设置-<?php echo $title?></title>
<?php include 'list.php';?>
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
<?php include 'overview.php';?>
            <div class="row">
                <div class="col-md-12">
                    <!--work progress start-->
                    <section class="panel">
                        <header class="panel-heading">
                        系统设置
                        </header>
                        <div class="panel-body">
	
           <form class="form-horizontal tasi-form" action="selfhelp.php?action=do" method="post" role="form">
  
                                

                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">自助授权公告</label>
                                        <div class="col-sm-10">
                                             <textarea class="form-control" name="prompt" clos="100" rows="3"/><?php echo $prompt?></textarea>
                                             <span class="help-block">这里填写您的自助授权页面的公告！</span>
                                        </div>
                                    </div>
									
                                  <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">购卡网址</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="website" class="form-control" value='<?php echo $website?>'>
											<span class="help-block">这里填写您的卡密发货平台！</span>
                                        </div>
                                    </div>
                                    
                                  <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">联系客服</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="qq" class="form-control" value='<?php echo $qq?>'>
											<span class="help-block">这里填写您的客服QQ！</span>
                                        </div>
                                    </div>




                                
			<div id="bottom" class="form-group">
			<label class="col-sm-2 col-sm-2 control-label"></label>
			  <button class="btn btn-info btn-lg" type="submit" value="true" id="submit"/><i class="fa fa-refresh" id="spinner"></i> <span id="btnText">更新设置</span></button>
            </div>
                            </form>
                        </div>
                    </section>
                    <!--work progress end-->
                </div>

        </section>
    </section>
    <!--main content end-->

<?php include 'footer.php';?>
