<?php
/**
 * PHP������Ȩϵͳ
 * =======================================================
 * ��Ȩ���� (C) 2010-2020 www.weby.cc������������Ȩ����
 * ��վ��ַ: http://www.weby.cc
 * Q Q: 403700890
 * -------------------------------------------------------
 *
 * @version :    v2.6.x
 * ȫ������
 * =======================================================
 */
  include 'config.php';
  header("content-type:text/html;charset=utf-8");

/**
 * ��ȡվ��
 */
	$sql = "SELECT * FROM site"; 
	$result=mysql_query($sql);
	if($result&&mysql_num_rows($result)){
	   while ($row=mysql_fetch_assoc($result)) {
			  $title = $row['title'];
			  $yxtime = $row['yxtime'];
			  $copyright = $row['copyright'];
			  $site_name = $row['site_name'];
			  $route = $row['route'];
	   }
	}
	
/**
 * ��Ȩ��ʾ�޸�
 */
	$sql = "SELECT * FROM message"; 
	$result=mysql_query($sql);
	if($result&&mysql_num_rows($result)){
	   while ($row=mysql_fetch_assoc($result)) {
			  $message_1 = $row['message_1'];
			  $message_2 = $row['message_2'];
			  $message_3 = $row['message_3'];
			  
	   }
	}
	
/**
 * ����������ʾ�޸�
 */
	$sql = "SELECT * FROM selfhelp"; 
	$result=mysql_query($sql);
	if($result&&mysql_num_rows($result)){
	   while ($row=mysql_fetch_assoc($result)) {
			  $prompt = $row['prompt'];
			  $website = $row['website'];
			  $qq = $row['qq'];
			  
	   }
	}
	

/**


 * ��ȡ�û���ʵ IP
 */
function getIP()
{
    static $realip;
    if (isset($_SERVER)) {
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $realip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            if (isset($_SERVER['HTTP_CLIENT_IP'])) {
                $realip = $_SERVER['HTTP_CLIENT_IP'];
            } else {
                $realip = $_SERVER['REMOTE_ADDR'];
            }
        }
    } else {
        if (getenv('HTTP_X_FORWARDED_FOR')) {
            $realip = getenv('HTTP_X_FORWARDED_FOR');
        } else {
            if (getenv('HTTP_CLIENT_IP')) {
                $realip = getenv('HTTP_CLIENT_IP');
            } else {
                $realip = getenv('REMOTE_ADDR');
            }
        }
    }
    return $realip;
}

// ��ȡ����
function get_domain($url){
    $host = strtolower ($url);
    if (strpos ($host, '/') !== false){
        $parse = @parse_url ($host);
        $host = $parse ['host'];
        }
    $topleveldomaindb = array ('com', 'edu', 'gov', 'int', 'mil', 'net', 'org', 'biz', 'info', 'pro', 'name', 'museum', 'coop', 'aero', 'xxx', 'idv', 'mobi', 'cc', 'me', 'top', 'cn', 'xin');
    $str = '';
    foreach ($topleveldomaindb as $v){
        $str .= ($str ? '|' : '') . $v;
        }
    
    $matchstr = "[^\.]+\.(?:(" . $str . ")|\w{2}|((" . $str . ")\.\w{2}))$";
    if (preg_match ("/" . $matchstr . "/ies", $host, $matchs)){
        $domain = $matchs ['0'];
        }else{
        $domain = $host;
        }
    return $domain;
}

// ��ע����ش���
//Code By Safe3 
//Add HTTP_REFERER by D.
$referer=empty($_SERVER['HTTP_REFERER']) ? array() : array($_SERVER['HTTP_REFERER']);
function customError($errno, $errstr, $errfile, $errline)
{ 
 echo "<b>Error number:</b> [$errno],error on line $errline in $errfile<br />";
 die();
}
set_error_handler("customError",E_ERROR);
$getfilter="'|\\b(and|or)\\b.+?(>|<|=|\\bin\\b|\\blike\\b)|\\/\\*.+?\\*\\/|<\\s*script\\b|\\bEXEC\\b|UNION.+?SELECT|UPDATE.+?SET|INSERT\\s+INTO.+?VALUES|(SELECT|DELETE).+?FROM|(CREATE|ALTER|DROP|TRUNCATE)\\s+(TABLE|DATABASE)";
$postfilter="\\b(and|or)\\b.{1,6}?(=|>|<|\\bin\\b|\\blike\\b)|\\/\\*.+?\\*\\/|<\\s*script\\b|\\bEXEC\\b|UNION.+?SELECT|UPDATE.+?SET|INSERT\\s+INTO.+?VALUES|(SELECT|DELETE).+?FROM|(CREATE|ALTER|DROP|TRUNCATE)\\s+(TABLE|DATABASE)";
$cookiefilter="\\b(and|or)\\b.{1,6}?(=|>|<|\\bin\\b|\\blike\\b)|\\/\\*.+?\\*\\/|<\\s*script\\b|\\bEXEC\\b|UNION.+?SELECT|UPDATE.+?SET|INSERT\\s+INTO.+?VALUES|(SELECT|DELETE).+?FROM|(CREATE|ALTER|DROP|TRUNCATE)\\s+(TABLE|DATABASE)";
function StopAttack($StrFiltKey,$StrFiltValue,$ArrFiltReq){  



$StrFiltValue=arr_foreach($StrFiltValue);
if (preg_match("/".$ArrFiltReq."/is",$StrFiltValue)==1){   
        slog("<br><br>����IP: ".$_SERVER["REMOTE_ADDR"]."<br>����ʱ��: ".strftime("%Y-%m-%d %H:%M:%S")."<br>����ҳ��:".$_SERVER["PHP_SELF"]."<br>�ύ��ʽ: ".$_SERVER["REQUEST_METHOD"]."<br>�ύ����: ".$StrFiltKey."<br>�ύ����: ".$StrFiltValue);
        print "<div style=\"position:fixed;top:0px;width:100%;height:100%;background-color:white;color:green;font-weight:bold;border-bottom:5px solid #999;\"><br>�����ύ���в��Ϸ�����,лл����!<br><br>�˽��������:<a href=\"http://webscan.360.cn\">http://webscan.360.cn</a></div>";
        exit();
}
if (preg_match("/".$ArrFiltReq."/is",$StrFiltKey)==1){   
        slog("<br><br>����IP: ".$_SERVER["REMOTE_ADDR"]."<br>����ʱ��: ".strftime("%Y-%m-%d %H:%M:%S")."<br>����ҳ��:".$_SERVER["PHP_SELF"]."<br>�ύ��ʽ: ".$_SERVER["REQUEST_METHOD"]."<br>�ύ����: ".$StrFiltKey."<br>�ύ����: ".$StrFiltValue);
        print "<div style=\"position:fixed;top:0px;width:100%;height:100%;background-color:white;color:green;font-weight:bold;border-bottom:5px solid #999;\"><br>�����ύ���в��Ϸ�����,лл����!<br><br>�˽��������:<a href=\"http://webscan.360.cn\">http://webscan.360.cn</a></div>";
        exit();
}  
}  
//$ArrPGC=array_merge($_GET,$_POST,$_COOKIE);
foreach($_GET as $key=>$value){ 
	StopAttack($key,$value,$getfilter);
}
foreach($_POST as $key=>$value){ 
	StopAttack($key,$value,$postfilter);
}
foreach($_COOKIE as $key=>$value){ 
	StopAttack($key,$value,$cookiefilter);
}
foreach($referer as $key=>$value){ 
  StopAttack($key,$value,$getfilter);
}
function slog($logs)
{
  $toppath=$_SERVER["DOCUMENT_ROOT"]."/log.htm";
  $Ts=fopen($toppath,"a+");
  fputs($Ts,$logs."\r\n");
  fclose($Ts);
}
function arr_foreach($arr) {
  static $str;
  if (!is_array($arr)) {
  return $arr;
  }
  foreach ($arr as $key => $val ) {

    if (is_array($val)) {

        arr_foreach($val);
    } else {

      $str[] = $val;
    }
  }
  return implode($str);
}
?>
