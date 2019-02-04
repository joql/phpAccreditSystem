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
		$title = $_POST['title'];
		$yxtime = $_POST['yxtime'];
		$copyright = $_POST['copyright'];
		$site_name = $_POST['site_name'];
		$route = $_POST['route'];
		$sql = "UPDATE `site` SET `title` = '$title', `yxtime` = '$yxtime', `copyright` = '$copyright', `site_name` = '$site_name', `route` = '$route' ";
	    mysql_query($sql);
		mysql_close();
		echo("<script language=\"javascript\" type=\"text/javascript\" src=\"/data/assets/js/jquery.min.js\"></script><script language=\"javascript\" type=\"text/javascript\" src=\"/data/assets/layer/layer.js\"></script><script>layer.open({  type: 1  ,title: false   ,closeBtn: false  ,area: '200px;'  ,shade: 0.8  ,id: 'LAY_layuipro'   ,resize: false  ,btn: ['确定']  ,moveType: 1   ,content: '<div style=\"padding: 30px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;\">更新成功！</div>'  ,success: function(layero){ var btn = layero.find('.layui-layer-btn');  btn.find('.layui-layer-btn0').attr({ href: 'setup.php' });  }});</script>");
	}

$li6='class="active"';
$li60='class="active"';
?>
<?php include 'header.php';?>
    <title>常规设置-<?php echo $title?></title>
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
	
           <form class="form-horizontal tasi-form" action="setup.php?action=do" method="post" role="form">
  
                                

                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">站点标题</label>
                                        <div class="col-sm-10">
                                             <input type="text" name="title" class="form-control" value='<?php echo $title?>'>
                                        </div>
                                    </div>
									
                                  <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">登录命名</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="site_name" class="form-control" value='<?php echo $site_name?>'>
											<span class="help-block">修改登录路命名，请留意修改根目录的（index.php）.</span>
                                        </div>
                                    </div>
									
                                  <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">css/js/img路径</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="route" class="form-control" value='<?php echo $route?>'>
											<span class="help-block">如果是二级目录的朋友，请加域名http://weby.cc/xxx .</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">运行时间</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="yxtime" class="form-control" id="time1" value='<?php echo $yxtime?>'>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">版权设置</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="copyright" clos="100" rows="3"/><?php echo $copyright?></textarea>
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