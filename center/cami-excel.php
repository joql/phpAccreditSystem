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
    include '../data/config.php';
	header("content-type:text/html;charset=utf-8");
	if(!isset($_SESSION['username'])||empty($_SESSION['username'])||!isset($_SESSION['uid'])||empty($_SESSION['uid'])){
		echo("<script language=\"javascript\" type=\"text/javascript\" src=\"/data/assets/js/jquery.min.js\"></script><script language=\"javascript\" type=\"text/javascript\" src=\"/data/assets/layer/layer.js\"></script><script>layer.open({  type: 1  ,title: false   ,closeBtn: false  ,area: '200px;'  ,shade: 0.8  ,id: 'LAY_layuipro'   ,resize: false  ,btn: ['确定']  ,moveType: 1   ,content: '<div style=\"padding: 30px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;\">请登录！</div>'  ,success: function(layero){ var btn = layero.find('.layui-layer-btn');  btn.find('.layui-layer-btn0').attr({ href: '../$site_name' });  }});</script>");
		exit();
	}
	
	$time=time();
	$vpr = $_GET['c'];
	if($vpr=='do'){
include '../data/assets/PHPExcel/Classes/PHPExcel.php';
$excel = new PHPExcel();

$sql = mysql_query("select * from cami");    //查询sql语句

//设置列宽
$excel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
$excel->getActiveSheet()->getColumnDimension('B')->setWidth(25);
$excel->getActiveSheet()->getColumnDimension('C')->setWidth(10);

$excel->getActiveSheet()->getStyle('A')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$excel->getActiveSheet()->getStyle('C')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);



/*--------------设置表头信息------------------*/
$excel->setActiveSheetIndex(0)
->setCellValue('A1', '卡密编号')
->setCellValue('B1', '卡密列表')
->setCellValue('C1', '周期/年')
;

$i=2;                
while($rs=mysql_fetch_array($sql)){
	$excel->setActiveSheetIndex(0)

	->setCellValue("A".$i, $rs[0]) 
	->setCellValue("B".$i, $rs[1]) 
	->setCellValue("C".$i, $rs[3]) 
;
	$i++;
}

$excel->getActiveSheet()->setTitle('Example1');    
$excel->setActiveSheetIndex(0);    


//创建Excel输入对象
$write = new PHPExcel_Writer_Excel5($excel);
header("Pragma: public");
header("Expires: 0");
header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
header("Content-Type:application/force-download");
header("Content-Type:application/vnd.ms-execl");
header("Content-Type:application/octet-stream");
header("Content-Type:application/download");;
header('Content-Disposition:attachment;filename="卡密列表('.date('Y-m-d').').xls"');
header("Content-Transfer-Encoding:binary");
$write->save('php://output');

	}
	
?>
