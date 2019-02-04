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
session_start();

	//1.将session数组清空
$_SESSION = null;
	
	//2.将cookie设置失效
setcookie(session_name(),'',time()-1,'/');//PHPSESSID
	
	//3.可以删除session文件【可选】
session_destroy();
	
header('location:/');
?>