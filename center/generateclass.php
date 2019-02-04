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
 
$li2='class="active"';
$li20='class="active"';
?>
<?php include 'header.php';?>
    <title>单域名授权-<?php echo $title?></title>
<?php include 'list.php';?>
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
<?php include 'overview.php';?>
            <div class="row">
                <div class="col-lg-12">
                    <!--work progress start-->
                    <section class="panel">
                        <div class="panel-body">
                                    <div class="alert alert-block alert-success fade in" id="msgSuccess">
                                        <button data-dismiss="alert" class="close close-sm" type="button">
                                            <i class="fa fa-times"></i>
                                        </button>
                                        <strong>将下面授权代码.添加到项目代码里后再对php文件进行加密.</strong>
                                    </div>
                                    <div class="form-group">
                                        <label for="txtClass">授权顶级泛域名</label>
                                      <textarea class="form-control" id="txtScript" cols="60" rows="15" readonly>
/*添加到需要授权php源码顶部 （不判断IP）  */ 请添加在<？php  ？> 里面

error_reporting(0);
function getTopDomainhuo(){
		$host=$_SERVER['HTTP_HOST'];
		
		$matchstr="[^\.]+\.(?:(".$str.")|\w{2}|((".$str.")\.\w{2}))$";
		if(preg_match("/".$matchstr."/ies",$host,$matchs)){
			$domain=$matchs['0'];
		}else{
			$domain=$host;
		}
		return $domain;

}
$domain=getTopDomainhuo();

$real_domain='baidu.com'; //本地检查时 用户的授权域名 和时间

$check_host = 'http://<? echo $_SERVER['SERVER_NAME'];  ?>/update.php';
$client_check = $check_host . '?a=client_check&u=' . $_SERVER['HTTP_HOST'];
$check_message = $check_host . '?a=check_message&u=' . $_SERVER['HTTP_HOST'];
$check_info=file_get_contents($client_check);
$message = file_get_contents($check_message);



if($check_info=='1'){
   echo '<font color=red>' . $message . '</font>';
   die;
}elseif($check_info=='2'){
   echo '<font color=red>' . $message . '</font>';
   die;
}elseif($check_info=='3'){
   echo '<font color=red>' . $message . '</font>';
   die;
}

if($check_info!=='0'){ // 远程检查失败的时候 本地检查
   if($domain!==$real_domain){
      echo '远程检查失败了。请联系授权提供商。';
	  die;
   }
}

unset($domain);

</textarea>
                                    </div>
                                                    </div>
													
                    </section>
                    <!--work progress end-->
                </div>

        </section>
    </section>
    <!--main content end-->

<?php include 'footer.php';?>
