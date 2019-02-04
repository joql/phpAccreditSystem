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
		$username = 'admin';
		$password=md5($_POST['password']);
        $rpassword=md5($_POST['rpassword']);

		if(!$_POST['password']){
			echo("<script language=\"javascript\" type=\"text/javascript\" src=\"/data/assets/js/jquery.min.js\"></script><script language=\"javascript\" type=\"text/javascript\" src=\"/data/assets/layer/layer.js\"></script><script>layer.open({  type: 1  ,title: false   ,closeBtn: false  ,area: '200px;'  ,shade: 0.8  ,id: 'LAY_layuipro'   ,resize: false  ,btn: ['确定']  ,moveType: 1   ,content: '<div style=\"padding: 30px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;\">填写密码！</div>'  ,success: function(layero){ var btn = layero.find('.layui-layer-btn');  btn.find('.layui-layer-btn0').attr({ href: 'profile.php' });  }});</script>");
			die;
		}
		if($password!=$rpassword){
			echo("<script language=\"javascript\" type=\"text/javascript\" src=\"/data/assets/js/jquery.min.js\"></script><script language=\"javascript\" type=\"text/javascript\" src=\"/data/assets/layer/layer.js\"></script><script>layer.open({  type: 1  ,title: false   ,closeBtn: false  ,area: '200px;'  ,shade: 0.8  ,id: 'LAY_layuipro'   ,resize: false  ,btn: ['确定']  ,moveType: 1   ,content: '<div style=\"padding: 30px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;\">两次密码不一致！</div>'  ,success: function(layero){ var btn = layero.find('.layui-layer-btn');  btn.find('.layui-layer-btn0').attr({ href: 'profile.php' });  }});</script>");
        }else{
			$sql = "UPDATE `user` SET `password` = '$password' WHERE `user`.`username` = '$username';";
	        mysql_query($sql);
		    mysql_close();

	session_start();

	//1.将session数组清空
	$_SESSION = null;
	
	//2.将cookie设置失效
	setcookie(session_name(),'',time()-1,'/');//PHPSESSID
	
	//3.可以删除session文件【可选】
	session_destroy();
			echo("<script language=\"javascript\" type=\"text/javascript\" src=\"/data/assets/js/jquery.min.js\"></script><script language=\"javascript\" type=\"text/javascript\" src=\"/data/assets/layer/layer.js\"></script><script>layer.open({  type: 1  ,title: false   ,closeBtn: false  ,area: '200px;'  ,shade: 0.8  ,id: 'LAY_layuipro'   ,resize: false  ,btn: ['确定']  ,moveType: 1   ,content: '<div style=\"padding: 30px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;\">修改成功！</div>'  ,success: function(layero){ var btn = layero.find('.layui-layer-btn');  btn.find('.layui-layer-btn0').attr({ href: 'profile.php' });  }});</script>");
		}
	}

$li6='class="active"';
$li62='class="active"';
?>
<?php include 'header.php';?>
    <title>修改密码-<?php echo $title?></title>
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
                        修改密码
                        </header>
                        <div class="panel-body">
		   
           <form class="form-horizontal tasi-form" action="profile.php?action=do" method="post" role="form">
  
                                

                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">账号</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="username" type="text" value="admin" readonly="true">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">新密码</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="password" type="password" >
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">确认密码</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="rpassword" type="password"  >
                                        </div>
                                    </div>



			<div id="bottom" class="form-group">
			<label class="col-sm-2 col-sm-2 control-label"></label>
			  <button class="btn btn-info btn-lg" type="submit" value="true" id="submit"/><i class="fa fa-refresh" id="spinner"></i> <span id="btnText">更新密码</span></button>
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
