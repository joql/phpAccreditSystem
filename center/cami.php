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

$li111='class="active"';
$li112='class="active"';
?>
<?php include 'header.php';?>
    <title>卡密管理-<?php echo $title?></title>
<?php include 'list.php';?>
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
<?php include 'overview.php';?>
            <div class="row">
                <div class="col-lg-12">
                    <!--work progress start-->
                    <section class="panel panel-success">
                        <div class="panel-body progress-panel">
                            <div class="task-progress">
                                <h1>卡密生成</h1>
                                <p>所有卡密一览.</p>
					 <div class="panel-body">
          <form action="./cami.php" method="get" class="form-inline" role="form">
            <div class="form-group">
              <label>生成卡密数量</label>
              <input type="text" name="kmsl" value="" class="form-control" placeholder="请输入生成卡密数量">
            </div>
            <div class="form-group">
              <label>授权时间</label>
              <select name="ytime" class="form-control">
                <option value="1">1年</option>
                <option value="2">2年</option>
				<option value="3">3年</option>
				<option value="4">4年</option>
				<option value="5">5年</option>
				<option value="99">永久</option>
              </select>
            </div>
            <input type="submit" name="submit" value="生成" class="btn btn-info"/> <a href="./cami-excel.php?c=do" class="btn btn-primary"/>导出卡密</a>
          </form>
        </div>
<?php
//添加卡密
$time=time();
if($_GET[submit]=="生成"){
$kmsl=$_GET[kmsl];
$ytime=$_GET[ytime];
if($kmsl==""){
	echo("<script language=\"javascript\" type=\"text/javascript\" src=\"/data/assets/js/jquery.min.js\"></script><script language=\"javascript\" type=\"text/javascript\" src=\"/data/assets/layer/layer.js\"></script><script>layer.open({  type: 1  ,title: false   ,closeBtn: false  ,area: '200px;'  ,shade: 0.8  ,id: 'LAY_layuipro'   ,resize: false  ,btn: ['确定']  ,moveType: 1   ,content: '<div style=\"padding: 30px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;\">生成数量不能为空！</div>'  ,success: function(layero){ var btn = layero.find('.layui-layer-btn');  btn.find('.layui-layer-btn0').attr({ href: 'cami.php' });  }});</script>");
}else{
//取随机数
function getkm($len = 12)
{
	$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
	$strlen = strlen($str);
	$randstr = "";
	for ($i = 0; $i < $len; $i++) {
		$randstr .= $str[mt_rand(0, $strlen - 1)];
	}
	return $randstr;
}//开始添加
for ($i = 0; $i < $kmsl; $i++) { //添加数量
	$km=getkm(12);
	mysql_select_db($dbname);
	mysql_query("set names utf8");
	$SQL = "INSERT INTO `cami` (`id`, `km`, `time`, `ytime`) VALUES (NULL, '$km', '$time', '$ytime');";//生成卡密
	mysql_query($SQL);
}
	echo("<script language=\"javascript\" type=\"text/javascript\" src=\"/data/assets/js/jquery.min.js\"></script><script language=\"javascript\" type=\"text/javascript\" src=\"/data/assets/layer/layer.js\"></script><script>layer.open({  type: 1  ,title: false   ,closeBtn: false  ,area: '275px;'  ,shade: 0.8  ,id: 'LAY_layuipro'   ,resize: false  ,btn: ['确定']  ,moveType: 1   ,content: '<div style=\"padding: 30px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;\">生成卡密成功，一共生成 ".$kmsl." 张卡密！</div>'  ,success: function(layero){ var btn = layero.find('.layui-layer-btn');  btn.find('.layui-layer-btn0').attr({ href: 'cami.php' });  }});</script>");
	mysql_close();
}}
?>
                            </div>
                        </div>						

						<div class="table-responsive">
                        <table  class="display table table-bordered table-striped" id="dynamic-table">
                            <thead>
                            <tr>
                                <th>卡号</th>
								<th>卡密</th>
								<th>卡密期限</th>
                                <th>生成时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
									<?php
 $page = $_GET["page"];
 if(isset($_POST["page"]) && $_POST["page"] != "")
    {
     $page = $_POST['page'];
     }
 if($page == ""){
     $page = 1;
     } 

 $page_size = 10; //每页多少条数据
 $_pageNum = 5; //最多显示多少个页码
 $query = "select count(*) as total from cami";
 $result = mysql_query($query);
 $rownum = mysql_fetch_row($result);
 $message_count = $rownum[0];

 $page_count = ceil($message_count / $page_size);
 $offset = ($page-1) * $page_size;
 $pages = $page_count;
 $_start = $page - floor($_pageNum / 2); //计算开始页
 $_start = $_start < 1 ? 1 : $_start;
 $_end = $page + floor($_pageNum / 2); //计算结束页
 $_end = $_end > $pages? $pages : $_end;

 $_curPageNum = $_end - $_start + 1;
 // 左调整
if($_curPageNum < $_pageNum && $_start > 1){
     $_start = $_start - ($_pageNum - $_curPageNum);
     $_start = $_start < 1 ? 1 : $_start;
     $_curPageNum = $_end - $_start + 1;
     }
 // 右边调整
if($_curPageNum < $_pageNum && $_end < $pages){
     $_end = $_end + ($_pageNum - $_curPageNum);
     $_end = $_end > $pages? $pages : $_end;
     }


 ?>
 									<?php 
										$sql="select * from cami order by id DESC limit $offset,$page_size";
										$result=mysql_query($sql);
										if($result&&mysql_num_rows($result)){
											while ($row=mysql_fetch_assoc($result)) {
											echo "<tr class='gradeX'>";
											echo "<td >".$row['id']."</td>";
											echo "<td >".$row['km']."</td>";
											echo "<td >".$row['ytime']."年</td>";
											echo "<td ><span class='label label-success'>".date("Y-m-d",$row['time'])."</span></td>";
											echo "<td >
												<a class='btn btn-primary btn-xs' href='javascript:if(confirm(\"你确实要删除此条授权记录吗?\"))location=\"./cami-del.php?id=".$row['id']."\"'>
												<i class='fa fa-ban'></i></a>
											</td>";
											echo "</tr>";
											}
										}
									?>                           
                            </tfoot>
                        </table>
						</div>
						<table  class="display table table-bordered table-striped" id="dynamic-table">
						<tfoot>
							<tr>
							<td ><ul class="pagination"><li class="disabled"><a>当前页码：<?php echo $page;?>/<?php echo $page_count;?></a></li><li class="disabled"><a>记录条数：<?php echo $message_count;?>条</a></li>
							
							<?php

if($page != 1){
     echo "<li ><a href=?page=1>首页</a></li>";
     echo "<li ><a href=?page=" . ($page-1) . ">&laquo;</a></li>";
     } else {
echo '<li class="disabled"><a>首页</a></li>';
echo '<li class="disabled"><a>&laquo;</a></li>';
}

for ($i = $_start; $i <= $_end; $i++){
     if($i == $page){
         $_pageHtml .= '<li ><a>' . $i . '</a></li>';
         }else{
         $_pageHtml .= '<li ><a href="' . $url . '?page=' . $i . '">' . $i . '</a></li>';
         }
     }
echo $_pageHtml;
if($page < $page_count){
     echo "<li ><a href=?page=" . ($page + 1) . ">&raquo;</a></li>";
     echo "<li ><a href=?page=" . $page_count . ">尾页</a></li>";
     } else {
echo '<li class="disabled"><a>&raquo;</a></li>';
echo '<li class="disabled"><a>尾页</a></li>';
}	 
echo'</ul></td>';
?>
							</tr>
							</tfoot>
							</table>
                    </section>
                    <!--work progress end-->
                </div></div>

        </section>
    </section>
    <!--main content end-->

<?php include 'footer.php';?>
