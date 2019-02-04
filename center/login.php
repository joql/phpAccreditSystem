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
 
	header('content-type:text/html;charset=utf-8');
    include 'farmwork.php';
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$safepassword = $_POST['safepassword'];
	if($safe!==$safepassword){
	   echo("<script language=\"javascript\" type=\"text/javascript\" src=\"/data/assets/js/jquery.min.js\"></script><script language=\"javascript\" type=\"text/javascript\" src=\"/data/assets/layer/layer.js\"></script><script>layer.open({  type: 1  ,title: false   ,closeBtn: false  ,area: '200px;'  ,shade: 0.8  ,id: 'LAY_layuipro'   ,resize: false  ,btn: ['返回']  ,moveType: 1   ,content: '<div style=\"padding: 30px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;\">安全码错误！</div>'  ,success: function(layero){ var btn = layero.find('.layui-layer-btn');  btn.find('.layui-layer-btn0').attr({ href: '../$site_name' });  }});</script>");
	   exit();
	}
	$sql = "select * from user where username='$username' and password='$password'";
	$result = mysql_query($sql);
	if($result && mysql_num_rows($result)>0){
		$data=mysql_fetch_array($result);
		$_SESSION['username']=$data['username'];
		$_SESSION['uid']=$data['id'];
		$_SESSION['email']=$data['email'];
		$_SESSION['time']=$data['lotime'];
		$_SESSION['ip']=$data['login'];
		setcookie(session_name(),session_id(),time()+3600);
		echo "<script>window.location.href='../center/index.php'</script>";
		exit();
	}else{
		echo("<script language=\"javascript\" type=\"text/javascript\" src=\"/data/assets/js/jquery.min.js\"></script><script language=\"javascript\" type=\"text/javascript\" src=\"/data/assets/layer/layer.js\"></script><script>layer.open({  type: 1  ,title: false   ,closeBtn: false  ,area: '200px;'  ,shade: 0.8  ,id: 'LAY_layuipro'   ,resize: false  ,btn: ['返回']  ,moveType: 1   ,content: '<div style=\"padding: 30px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;\">账号或密码错误！</div>'  ,success: function(layero){ var btn = layero.find('.layui-layer-btn');  btn.find('.layui-layer-btn0').attr({ href: '../$site_name' });  }});</script>");
		exit();
	}
?>
