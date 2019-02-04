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
// 设置时区
date_default_timezone_set('Asia/Shanghai');
/**
 * 秒转时间，格式 年 月 日 时 分 秒
 * 
 * @author 403700890@qq.com
 * @param int $time
 * @return array|boolean
 */
function Sec2Time($time){
 if(is_numeric($time)){
  $value = array(
    "years" => 0, "days" => 0, "hours" => 0,
    "minutes" => 0, "seconds" => 0,
  );
  if($time >= 86400){
   $value["days"] = floor($time/86400);
   $time = ($time%86400);
  }
  $value["seconds"] = floor($time);
  return (array) $value;
 }else{
  return (bool) FALSE;
 }
}
// 本站创建的时间
$site_create_time = strtotime($yxtime);
$time = time() - $site_create_time;
$uptime = Sec2Time($time);

 $query = "select count(*) as total from authorize";
 $result = mysql_query($query);
 $rownum = mysql_fetch_row($result);
 $sites = $rownum[0];
 $query = "select count(*) as total from daoban";
 $result = mysql_query($query);
 $rownum = mysql_fetch_row($result);
 $blocks = $rownum[0];
?>
            <!--state overview start-->				
            <div class="row state-overview">

   
        <div class="col-lg-4 col-sm-6">
        <section class="panel">
            <div class="symbol terques">
                <i class="fa fa-key"></i>
            </div>
            <div class="value">
                <h1>
                    <?=$sites?>                </h1>
                <p>正版授权</p>
            </div>
        </section>
    </div>
    <div class="col-lg-4 col-sm-6">
        <section class="panel">
            <div class="symbol red">
                <i class="fa fa-tags"></i>
            </div>
            <div class="value">
                <h1>
                    <?=$blocks?>                </h1>
                <p>发现盗版</p>
            </div>
        </section>
    </div>
    <div class="col-lg-4 col-sm-6">
        <section class="panel">
            <div class="symbol blue">
                <i class="fa fa-cogs"></i>
            </div>
            <div class="value">
                <h1>
                    <?php echo $uptime['days']; ?>天                </h1>
                <p>运行时长</p>
            </div>
        </section>
    </div>
</div>            <!--state overview end-->