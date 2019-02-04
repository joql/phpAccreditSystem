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
		$message_1 = $_POST['message_1'];
		$message_2 = $_POST['message_2'];
		$message_3 = $_POST['message_3'];
		$sql = "UPDATE `message` SET `message_1` = '$message_1', `message_2` = '$message_2', `message_3` = '$message_3'";
	    mysql_query($sql);
		mysql_close();
		echo("<script language=\"javascript\" type=\"text/javascript\" src=\"/data/assets/js/jquery.min.js\"></script><script language=\"javascript\" type=\"text/javascript\" src=\"/data/assets/layer/layer.js\"></script><script>layer.open({  type: 1  ,title: false   ,closeBtn: false  ,area: '200px;'  ,shade: 0.8  ,id: 'LAY_layuipro'   ,resize: false  ,btn: ['确定']  ,moveType: 1   ,content: '<div style=\"padding: 30px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;\">更新成功！</div>'  ,success: function(layero){ var btn = layero.find('.layui-layer-btn');  btn.find('.layui-layer-btn0').attr({ href: 'message.php' });  }});</script>");
	}

$li6='class="active"';
$li61='class="active"';
?>
<?php include 'header.php';?>
    <title>授权提示-<?php echo $title?></title>
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
                        更新授权提示
                        </header>
                        <div class="panel-body">
		  
           <form class="form-horizontal tasi-form" action="message.php?action=do" method="post" role="form">
  


                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">未授权提示</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="message_1" clos="100" rows="3"/><?php echo $message_1?></textarea>
                                        </div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">到期提示</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="message_2" clos="100" rows="3"/><?php echo $message_2?></textarea>
                                        </div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">IP不正确错误提示</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="message_3" clos="100" rows="3"/><?php echo $message_3?></textarea>
                                        </div>
                                    </div>
									
                                
			<div id="bottom" class="form-group">
			<label class="col-sm-2 col-sm-2 control-label"></label>
			  <button class="btn btn-info btn-lg" type="submit" value="true" id="submit"/><i class="fa fa-refresh" id="spinner"></i> <span id="btnText">更新授权提示</span></button>
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