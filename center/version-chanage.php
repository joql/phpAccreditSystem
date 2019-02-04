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
 
	$id = $_GET['id'];
	$sql = "SELECT * FROM `version` WHERE id ='$id';";
	$result=mysql_query($sql);
	if($result&&mysql_num_rows($result)){
	   while ($row=mysql_fetch_assoc($result)) {
			  $name = $row['name'];
			  $content = base64_decode($row['content']);
			  $file = $row['file'];
			  $datae = base64_decode($row['datae']);
	   }
	}
	
	$action = $_GET['action'];
	if($action=='do'){
		$id = $_POST['id'];
		$name = $_POST['name'];
		$content = base64_encode($_POST['content']);
		$file = $_POST['file'];
		$datae = base64_encode($_POST['datae']);
		$sql = "UPDATE `version` SET `name` = '$name', `content` = '$content', `file` = '$file', `datae` = '$datae' WHERE `id` = '$id';";
	    mysql_query($sql);
		mysql_close();
		echo("<script language=\"javascript\" type=\"text/javascript\" src=\"/data/assets/js/jquery.min.js\"></script><script language=\"javascript\" type=\"text/javascript\" src=\"/data/assets/layer/layer.js\"></script><script>layer.open({  type: 1  ,title: false   ,closeBtn: false  ,area: '200px;'  ,shade: 0.8  ,id: 'LAY_layuipro'   ,resize: false  ,btn: ['确定']  ,moveType: 1   ,content: '<div style=\"padding: 30px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;\">更新成功！</div>'  ,success: function(layero){ var btn = layero.find('.layui-layer-btn');  btn.find('.layui-layer-btn0').attr({ href: 'version-index.php' });  }});</script>");
		die;
	}

$li3='class="active"';
$li30='class="active"';
?>
<?php include 'header.php';?>
    <title>修改版本-<?php echo $title?></title>
<?php include 'list.php';?>
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
<?php include 'overview.php';?>
            <div class="row">
                <div class="col-lg-12">
                    <!--work progress start-->
                    <section class="panel">
                        <div class="panel-body progress-panel">
                            <div class="task-progress">
                                <h1>修改版本</h1>
                                <p>填写版本信息并保存.</p>
                            </div>
                        </div>
                        <form action="version-chanage.php?action=do" method="post" role="form">
                            <div class="form-group">
                                <label for="txtDomain">版本号</label>
                                <input type="text" name="name" class="form-control" value='<?php echo $name?>'>
                            </div>
                            <div class="form-group">
                                <label for="txtDomain">更新内容</label>
								<textarea class="form-control" name="content" clos="100" rows="10"/><?php echo $content?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="txtDomain">文件名</label>
                                <input type="text" name="file" class="form-control" value='<?php echo $file?>'>
                            </div>
                            <div class="form-group">
                                <label for="txtDomain">数据库更新列表</label>
								<textarea class="form-control" name="datae" clos="100" rows="10"/><?php echo $datae?></textarea>
                            </div>

							<input type='hidden' name="id" class="user" value='<?php echo $id?>'/>
			<div id="bottom">
			  <button class="btn btn-info" type="submit" value="true" id="submit"/><strong>更新</strong></button>
            </div>
                        </form>
                    </section>
                    <!--work progress end-->
                </div>

        </section>
    </section>
    <!--main content end-->

<?php include 'footer.php';?>
