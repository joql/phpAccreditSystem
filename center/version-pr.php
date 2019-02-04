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
	
	$vpr = $_GET['c'];
	$id = $_GET['id'];
	$file = $_GET['file'];
	if($vpr=='do'){
			$updatezip = $_SERVER['DOCUMENT_ROOT'].'/upgrade/' . $file;
			if(file_exists($updatezip)){
				require_once $_SERVER['DOCUMENT_ROOT'].'/data/assets/PHPExcel/Classes/PHPExcel/Shared/PCLZip/pclzip.lib.php';  
				$zip = new PclZip($updatezip);
				$list = $zip->listContent();
				if (!empty($list)) {
					foreach($list as $li){
					$li1 .= $li['filename'].';;';
					}
					$li1 = ';'.$li1;
					preg_match_all('/(;([^;]*\/);)/', $li1, $matches);
					$li1 = array_filter(explode(';',$li1));
					$li1 = array_diff($li1,$matches[2]);
				}
				$li1 = implode('<br>/', $li1);
				$li1 = '/'.$li1;
              	$matches = implode('<br>/', $matches[2]);
				$matches = '/'.$matches;
				
				$pr = base64_encode($li1);
				$pm = base64_encode($matches);
				
	       		        $sql="select * from version where id='$id' and pr='$pr'";
                                $query=mysql_query($sql);
                                $rows = mysql_num_rows($query);
                                if($rows > 0){
                                    echo("<script language=\"javascript\" type=\"text/javascript\" src=\"/data/assets/js/jquery.min.js\"></script><script language=\"javascript\" type=\"text/javascript\" src=\"/data/assets/layer/layer.js\"></script><script>layer.open({  type: 1  ,title: false   ,closeBtn: false  ,area: '200px;'  ,shade: 0.8  ,id: 'LAY_layuipro'   ,resize: false  ,btn: ['确定']  ,moveType: 1   ,content: '<div style=\"padding: 30px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;\">信息已经存在！</div>'  ,success: function(layero){ var btn = layero.find('.layui-layer-btn');  btn.find('.layui-layer-btn0').attr({ href: 'version-index.php' });  }});</script>");
                                }else{
                                $sql_in = "UPDATE `version` SET `pr` = '$pr', `pm` = '$pm' WHERE `file` = '$file';";
								mysql_query($sql_in);
								mysql_close(); 
                                        echo("<script language=\"javascript\" type=\"text/javascript\" src=\"/data/assets/js/jquery.min.js\"></script><script language=\"javascript\" type=\"text/javascript\" src=\"/data/assets/layer/layer.js\"></script><script>layer.open({  type: 1  ,title: false   ,closeBtn: false  ,area: '200px;'  ,shade: 0.8  ,id: 'LAY_layuipro'   ,resize: false  ,btn: ['确定']  ,moveType: 1   ,content: '<div style=\"padding: 30px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;\">生成成功!</div>'  ,success: function(layero){ var btn = layero.find('.layui-layer-btn');  btn.find('.layui-layer-btn0').attr({ href: 'version-index.php' });  }});</script>");
				}
			}else{
                                echo("<script language=\"javascript\" type=\"text/javascript\" src=\"/data/assets/js/jquery.min.js\"></script><script language=\"javascript\" type=\"text/javascript\" src=\"/data/assets/layer/layer.js\"></script><script>layer.open({  type: 1  ,title: false   ,closeBtn: false  ,area: '200px;'  ,shade: 0.8  ,id: 'LAY_layuipro'   ,resize: false  ,btn: ['确定']  ,moveType: 1   ,content: '<div style=\"padding: 30px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;\">更新包不存在！</div>'  ,success: function(layero){ var btn = layero.find('.layui-layer-btn');  btn.find('.layui-layer-btn0').attr({ href: 'version-index.php' });  }});</script>");
			}
	}
?>



