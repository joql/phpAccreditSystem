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
//禁用错误报告
error_reporting(0);
session_start();

$db_server='localhost';
$db_user='accredit_joql_cc';
$db_password='YtN7zkiAtTAZHZFZ';
$db_name='accredit_joql_cc';
$db_charset='UTF8';

$safe = '123456';//此处为安全码，不走数据库

mysql_connect($db_server,$db_user,$db_password);
if(mysql_errno()){
		die('数据库连接失败！'.mysql_error());
}
mysql_select_db($db_name);
mysql_set_charset($db_charset);

?>
