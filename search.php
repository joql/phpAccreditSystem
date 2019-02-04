<?php
include 'data/config.php';


$get = $_GET[search];

if($get){
	$SQL = "SELECT * FROM `authorize` WHERE `domain` LIKE '$get'";
	$query=mysql_query($SQL);
	while($row =mysql_fetch_array($query)){
		$domain = $row[domain];
		$timegl = date("Y-m-d",$row['time']);

	}
	if($get != $domain){
	echo("<script language=\"javascript\" type=\"text/javascript\" src=\"/data/assets/js/jquery.min.js\"></script><script language=\"javascript\" type=\"text/javascript\" src=\"/data/assets/layer/layer.js\"></script><script>layer.open({  type: 1  ,title: false   ,closeBtn: false  ,area: '200px;'  ,shade: 0.8  ,id: 'LAY_layuipro'   ,resize: false  ,btn: ['确定']  ,moveType: 1   ,content: '<div style=\"padding: 30px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;\"><p style=\"text-align:left;\"><label>查询域名：</label>".$get."<br /><label>查询结果：</label><font style=\"color:#EE4000;\">未授权</font></p></div>'  ,success: function(layero){ var btn = layero.find('.layui-layer-btn');  btn.find('.layui-layer-btn0').attr({ href: 'index.php' });  }});</script>");
	}
	else{

	echo("<script language=\"javascript\" type=\"text/javascript\" src=\"/data/assets/js/jquery.min.js\"></script><script language=\"javascript\" type=\"text/javascript\" src=\"/data/assets/layer/layer.js\"></script><script>layer.open({  type: 1  ,title: false   ,closeBtn: false  ,area: '200px;'  ,shade: 0.8  ,id: 'LAY_layuipro'   ,resize: false  ,btn: ['确定']  ,moveType: 1   ,content: '<div style=\"padding: 30px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;\"><p style=\"text-align:left;\"><label>查询域名：</label>".$domain."<br /><label>查询结果：</label><font style=\"color:#ADFF2F;\">正版授权</font> &nbsp;&nbsp;<font style=\"color:#FFC125;\"><label>到期时间：</label>".$timegl."</font></p></div>'  ,success: function(layero){ var btn = layero.find('.layui-layer-btn');  btn.find('.layui-layer-btn0').attr({ href: 'index.php' });  }});</script>");
	}
}

?>
