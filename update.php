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
include 'data/weby.php';
date_default_timezone_set('PRC');
header("content-type:text/html;charset=utf-8");

// 查询最后的版本
$sql="SELECT * FROM `version` ORDER BY `id` DESC LIMIT 1";
$result=mysql_query($sql);
if($result&&mysql_num_rows($result)){
   $row=mysql_fetch_assoc($result);
}else{
   echo 'error';
   die;
}

$lastver = $row['name']; // 最新版本
$lastver = sprintf("%1.1f",$lastver); 

$ac = $_GET['a'];
$ver = $_GET['v'];
$url = $_GET['u'];
$key = $_GET['key'];
$ip = getIP();
$file_name = $_GET['f'];
$file_dir = 'http://www.shq.com/upgrade'; //远程升级补丁存放目录


// 版本号0.1递增
$newver = $ver+0.1;
$newver = sprintf("%1.1f",$newver);


if(!$ac){
	echo 'fuck you!';
	die;
}

// 客户端IP
if($ac=='getip'){
    echo getIP();
	die;
}

// 检查新版本更新内容
if($ac=='chanage'){
	$sql="SELECT * FROM  `version` WHERE name = $ver";
    $result=mysql_query($sql);
	if($result&&mysql_num_rows($result)){
       $row=mysql_fetch_assoc($result);
       echo base64_decode($row['content']);
    }else{
		  echo '参数出错！';
		}    
}

// 获取更新文件列表
if($ac=='pr'){
   $sql="SELECT * FROM  `version` WHERE name = $ver";
   $result=mysql_query($sql);
	if($result&&mysql_num_rows($result)){
       $row=mysql_fetch_assoc($result);
       echo base64_decode($row['pr']);
    }else{
		echo '参数出错';
		}
}
// 获取所有更新文件列表
if($ac=='pra'){
	$sql="SELECT * FROM  `version` WHERE name = $ver";
    $result=mysql_query($sql);
	if($result&&mysql_num_rows($result)){
       $row=mysql_fetch_assoc($result);
    }
	$sql = "SELECT * FROM version WHERE id > {$row['id']} order by id asc";
	$result = mysql_query($sql) or die(mysql_error());
	$rows = array();
	while($li = mysql_fetch_array($result))
    $rows[] = $li;
  	foreach($rows as $li){
		$li1 .= base64_decode($li['pr']).'<br>';
	}
  	$li1 = array_unique(explode('<br>', $li1));
  	$li1 = array_filter($li1);
  	$li1 = implode('<br>', $li1);
    echo $li1;
  	die;
}
// 获取更新目录列表
if($ac=='pm'){
	$sql="SELECT * FROM  `version` WHERE name = $ver";
    $result=mysql_query($sql);
	if($result&&mysql_num_rows($result)){
       $row=mysql_fetch_assoc($result);
       echo base64_decode($row['pm']);
    }else{
		echo '参数出错';
		}
}
// 获取更新数据库列表
if($ac=='datae'){
	$sql="SELECT * FROM  `version` WHERE name = $ver";
    $result=mysql_query($sql);
	if($result&&mysql_num_rows($result)){
       $row=mysql_fetch_assoc($result);
       echo base64_decode($row['datae']);
    }else{
		echo '参数出错';
		}
}

// 检查新版本
if($ac=='check'){
	 if($ver<$lastver){
        echo $newver;
        die;
	 }else{
	    echo $lastver;
		die;
	 }
}

// 最新版本
if($ac=='checkl'){
	  echo $lastver;
	  die;
}

/**
 * 升级新版本
 * @package  Common
 * http://sq.weby.cc/update.php?a=update&v=1.2&u=www.meil88.com&key=2c29a500786bccda
 */
 
if($ac=='update'){
	$domain_pd = get_domain($url);
	$time=time();
	
	$sql="SELECT * FROM  `authorize` WHERE domain ='$domain_pd'";
	$result=mysql_query($sql);
	if($result&&mysql_num_rows($result)){
	   while ($row=mysql_fetch_assoc($result)) {
	   $yumi=$row['yumi'];
    }
	  }
	
	$domain_pd = get_domain($url);
	$time=time();
	
	$sql="SELECT * FROM  `authorize` WHERE domain ='$domain_pd'";
	$result=mysql_query($sql);
	if($result&&mysql_num_rows($result)){
	   while ($row=mysql_fetch_assoc($result)) {
	   $yumi=$row['yumi'];
    }
	  }	
	
    $yumi_host = $yumi;
    $yumi_info = file_get_contents($yumi_host);
    if($yumi_info == $yumi_host ){
        $yumi_info = $url;
        }else{
            $yumi_info = get_domain($url);
        }
    // 首先检查域名是否授权

	$domain_url = $yumi_info; //获得系统域名
    $time=time();

	$sql="select * from authorize where domain='$domain_url'";
	$result=mysql_query($sql);
	if($result&&mysql_num_rows($result)){
	    $row=mysql_fetch_assoc($result);
	    $domain_time=$row['time'];
		$domain_sq=$row['domain'];
		$domain_dqversion=$row['version'];
		$dqv=$row['version'];
	    $domain_key=$row['syskey'];
	    $domain_ip=$row['ip'];
		
	}else{
		$sql_d="select * from daoban where domain='$domain_url'";
		$result_d=mysql_query($sql_d);
		if($result_d&&mysql_num_rows($result_d)){
			$row_d=mysql_fetch_assoc($result_d);
			$sql = "UPDATE `daoban` SET `time` = '$time' WHERE `domain` = '$domain_url';";
			mysql_query($sql);
		}else{
			$sql = "INSERT INTO `daoban` (`domain`, `time`) VALUES ('$domain_url', '$time');";
			mysql_query($sql);
		}			
		echo "$message_1";
		
		$status = '未授权用户';
		$status = base64_encode($status);
		$sql = "INSERT INTO `log` (`domain`, `time`, `version`, `status`) VALUES ('$domain_url', '$time', '$ver', '$status');";
	    mysql_query($sql);
		
        die;
	}

	if(!empty($key)){
		if($key != $domain_key){
		echo '<font color=red>KEY错误</font>';	
		$status = 'KEY错误';
		$status = base64_encode($status);
		$sql = "INSERT INTO `log` (`domain`, `time`, `version`, `status`) VALUES ('$domain_url', '$time', '$ver', '$status');";
	    mysql_query($sql);
		 
			die;
		}
	}else{
		echo '<font color=red>KEY为空</font>';	die;
		$status = 'KEY为空';
		$status = base64_encode($status);
		$sql = "INSERT INTO `log` (`domain`, `time`, `version`, `status`) VALUES ('$domain_url', '$time', '$ver', '$status');";
	    mysql_query($sql);
	}

	if($ip!==$domain_ip){

		 // 不提示IP 不正确 迷惑他们 让他们自己找你
         $log = date('Y-m-d H:i:s').'--域名--'.$domain_url.'--绑定IP--'.$domain_ip.'--真实IP--'.$ip."\r\n";
		 file_put_contents('ip.txt',$log,FILE_APPEND);

		 $status = '失败:授权IP错误'.$ip;
		 $status = base64_encode($status);
		 $sql = "INSERT INTO `log` (`domain`, `time`, `version`, `status`) VALUES ('$domain_url', '$time', '$ver', '$status');";
	     mysql_query($sql);

         echo '<font color=red>授权IP不正确</font>';
		 die;
	}
	

    if ($time>$domain_time){

		 $status = '失败:授权时间到期';
		 $status = base64_encode($status);
		 $sql = "INSERT INTO `log` (`domain`, `time`, `version`, `status`) VALUES ('$domain_url', '$time', '$ver', '$status');";
	     mysql_query($sql);

         echo '<font color=red>授权已经到期 到期时间为'.date("Y-m-d",$domain_time).'</font>';
         die;
    }
    
    if($ver==$lastver){

		 $status = '失败:已经是最新版';
		 $status = base64_encode($status);
		 $sql = "INSERT INTO `log` (`domain`, `time`, `version`, `status`) VALUES ('$domain_url', '$time', '$ver', '$status');";
	     mysql_query($sql);

         echo '<font color=red>已经是最新版 不需要升级</font>';
         die;
    }
    
	$status = '成功';
	$status = base64_encode($status);
	$sql = "INSERT INTO `log` (`domain`, `time`, `version`, `status`) VALUES ('$domain_url', '$time', '$ver', '$status');";
	mysql_query($sql);

    // 先升级到最近的版本
    $sql="select * from version where name='$newver'";
	$result=mysql_query($sql);
	if($result&&mysql_num_rows($result)){
	        $row=mysql_fetch_assoc($result);
			$sjbbanbenhao = $row['name'];	//得到 升级到最近的版本 的版本号 
	}
	
	//判断授权域名的库中历史升级版本号 $domain_dqversion    //防止客户站重复升级，只能升级一次（防盗版）
	if($dqv==$sjbbanbenhao){
		echo '<font color=red>贵站已经是最新版了</font>';	die;
	}
	
	if($domain_dqversion<$sjbbanbenhao){
		$sql = "UPDATE `authorize` SET `version` = '$sjbbanbenhao' WHERE `domain` = '$domain_url';";
	    mysql_query($sql);
		$file = $row['file'];
		echo $file;		//得到升级包真实下载地址
	}
	
	die;
    
}

// 客户端检查
if($ac == 'client_check'){
	$domain_pd = get_domain($url);
	$time=time();
	
	$sql="SELECT * FROM  `authorize` WHERE domain ='$domain_pd'";
	$result=mysql_query($sql);
	if($result&&mysql_num_rows($result)){
	   while ($row=mysql_fetch_assoc($result)) {
	   $yumi=$row['yumi'];
    }
	  }	  
    $yumi_host = $yumi;
    $yumi_info = file_get_contents($yumi_host);
    if($yumi_info == $yumi_host ){
        $yumi_info = $_GET['u'];
        }else{
            $yumi_info = get_domain($url);
        }

    // 首先检查域名是否授权
	$domain_url = $yumi_info; //获得系统域名
    $time=time();
	
	$sql="select * from authorize where domain='$domain_url'";
	$result=mysql_query($sql);
	if($result&&mysql_num_rows($result)){
	    $row=mysql_fetch_assoc($result);
	}else{
		$sql_d="select * from daoban where domain='$domain_url'";
		$result_d=mysql_query($sql_d);
		if($result_d&&mysql_num_rows($result_d)){
			$row_d=mysql_fetch_assoc($result_d);
			$sql = "UPDATE `daoban` SET `time` = '$time' WHERE `domain` = '$domain_url';";
			mysql_query($sql);
		}else{
			$sql = "INSERT INTO `daoban` (`domain`, `time`) VALUES ('$domain_url', '$time');";
			mysql_query($sql);
		}	
		echo '1'; //域名未授权
        die;
	}

    $time=time();
	$domain_time=$row['time'];
    $domain_ip=$row['ip'];
	$ip_qh=$row['ip_qh'];

    if ($time>$domain_time){
         echo '2'; //授权过期
         die;
    }
	
    $szsq = $ip_qh;
    $ip_info = file_get_contents($szsq);
    if($ip_info == $szsq ){       
        }else{
	if($ip!==$domain_ip){
	     echo '3'; //授权IP验证
		 die;
	}
		}
		
	echo '0'; //通过
    
}else{
	
// 客户端检查
if($ac == 'check_message'){	
	$domain_pd = get_domain($url);
	$time=time();
	
	$sql="SELECT * FROM  `authorize` WHERE domain ='$domain_pd'";
	$result=mysql_query($sql);
	if($result&&mysql_num_rows($result)){
	   while ($row=mysql_fetch_assoc($result)) {
	   $yumi=$row['yumi'];
    }
	  }	
    $yumi_host = $yumi;
    $yumi_info = file_get_contents($yumi_host);
    if($yumi_info == $yumi_host ){
        $yumi_info = $_GET['u'];
        }else{
            $yumi_info = get_domain($url);
        }
    // 首先检查域名是否授权
	$domain_url = $yumi_info; //获得系统域名
    $time=time();
	
	$sql="select * from authorize where domain='$domain_url'";
	$result=mysql_query($sql);
	if($result&&mysql_num_rows($result)){
	    $row=mysql_fetch_assoc($result);
	}else{
		$sql_d="select * from daoban where domain='$domain_url'";
		$result_d=mysql_query($sql_d);
		if($result_d&&mysql_num_rows($result_d)){
			$row_d=mysql_fetch_assoc($result_d);
			$sql = "UPDATE `daoban` SET `time` = '$time' WHERE `domain` = '$domain_url';";
			mysql_query($sql);
		}else{
			$sql = "INSERT INTO `daoban` (`domain`, `time`) VALUES ('$domain_url', '$time');";
			mysql_query($sql);
		}	
		echo "$message_1"; //域名未授权
        die;
	}

    $time=time();
	$domain_time=$row['time'];
	$domain_ip=$row['ip'];

    if ($time>$domain_time){
         echo "$message_2"; //授权过期
         die;
    }
	
    $szsq = $ip_qh;
    $ip_info = file_get_contents($szsq);
    if($ip_info == $szsq ){       
        }else{
	if($ip!==$domain_ip){	    
	}
		}
	echo "$message_3"; //授权IP验证
    
}	
}

// 客户端检查
if($ac == 'client_check_time'){
	$domain_pd = get_domain($url);
	$time=time();
	
	$sql="SELECT * FROM  `authorize` WHERE domain ='$domain_pd'";
	$result=mysql_query($sql);
	if($result&&mysql_num_rows($result)){
	   while ($row=mysql_fetch_assoc($result)) {
	   $yumi=$row['yumi'];
    }
	  }	
    $yumi_host = $yumi;
    $yumi_info = file_get_contents($yumi_host);
    if($yumi_info == $yumi_host ){
        $yumi_info = $_GET['u'];
        }else{
            $yumi_info = get_domain($url);
        }
    
    // 首先检查域名是否授权

	$domain_url = $yumi_info; //获得系统域名

	$sql="select * from authorize where domain='$domain_url'";
	$result=mysql_query($sql);
	if($result&&mysql_num_rows($result)){
	    $row=mysql_fetch_assoc($result);
	}else {
		echo '0'; //域名未授权
        die;
	}
		
	$domain_time=$row['time'];
    echo $domain_time;
}

//下载文件
if($ac == 'down'){
   
   // 不允许直接访问下载
   $url = $_SERVER['HTTP_REFERER'];

   if(!$url){
       //echo '来路不正确';
	   //die;
   }

   $file = $file_dir.'/'.$file_name;
   header('Location: '.$file.'');
}
?>
