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
	$time=time();
	if($action=='do'){
		$cp = $_POST['cp'];
		$ms = $_POST['ms'];

	    $sql="select * from products where cp='$cp'";
        $query=mysql_query($sql);
        $rows = mysql_num_rows($query);
		if($rows > 0){
		   echo("<script language=\"javascript\" type=\"text/javascript\" src=\"/data/assets/js/jquery.min.js\"></script><script language=\"javascript\" type=\"text/javascript\" src=\"/data/assets/layer/layer.js\"></script><script>layer.open({  type: 1  ,title: false   ,closeBtn: false  ,area: '200px;'  ,shade: 0.8  ,id: 'LAY_layuipro'   ,resize: false  ,btn: ['确定']  ,moveType: 1   ,content: '<div style=\"padding: 30px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;\">产品信息已存在！</div>'  ,success: function(layero){ var btn = layero.find('.layui-layer-btn');  btn.find('.layui-layer-btn0').attr({ href: 'products-add.php' });  }});</script>");
		   $sql = "UPDATE `products` SET `time` = '$time' ;";
		   mysql_query($sql);
		}else{
		   $sql = "INSERT INTO `products` (`cp`, `ms`, `time`) VALUES ('$cp', '$ms', '$time');";
	       mysql_query($sql);
		   mysql_close();
		   echo("<script language=\"javascript\" type=\"text/javascript\" src=\"/data/assets/js/jquery.min.js\"></script><script language=\"javascript\" type=\"text/javascript\" src=\"/data/assets/layer/layer.js\"></script><script>layer.open({  type: 1  ,title: false   ,closeBtn: false  ,area: '200px;'  ,shade: 0.8  ,id: 'LAY_layuipro'   ,resize: false  ,btn: ['确定']  ,moveType: 1   ,content: '<div style=\"padding: 30px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;\">添加成功！</div>'  ,success: function(layero){ var btn = layero.find('.layui-layer-btn');  btn.find('.layui-layer-btn0').attr({ href: 'products.php' });  }});</script>");
		   //die;
		}
	}

$li9='class="active"';
$li91='class="active"';
?>
<?php include 'header.php';?>
    <title>添加产品-<?php echo $title?></title>
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
                                <h1>添加新产品</h1>
                                <p>填写产品信息并保存.</p>
                            </div>
                        </div>
						<form action="products-add.php?action=do" method="post"  role="form">
                            <div class="form-group">
                                <label for="txtDomain">产品</label>
                                <input type="text" name="cp" class="form-control" placeholder="输入产品名称">
                            </div>
                            <div class="form-group">
                                <label for="txtDomain">描述</label>
                                <input type="text" name="ms" class="form-control" placeholder="输入描述">
                            </div>

			<div id="bottom" >
			  <button class="btn btn-info" type="submit" value="true" id="submit"/><strong>添加产品</strong></button>
            </div>
                        </form>
                    </section>
                    <!--work progress end-->
                </div>

        </section>
    </section>
    <!--main content end-->

<?php include 'footer.php';?>
