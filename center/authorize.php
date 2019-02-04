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

$li1='class="active"';
$li10='class="active"';
?>
<?php include 'header.php';?>
    <title>授权管理-<?php echo $title?></title>
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
                                <h1>授权管理</h1>
                                <p>所有授权一览，点击修改授权状态.</p>
					 <div class="panel-body">
          <form action="./authorize.php" method="get" class="form-inline" role="form">
            <div class="form-group">
              <label>类别</label>
              <select name="type" class="form-control">
                <option value="1">名称</option>
                <option value="2">域名</option>
				<option value="3">QQ</option>
				<option value="4">电话</option>
              </select>
            </div>
            <div class="form-group">
              <label>内容</label>
              <input type="text" name="kw" value="" class="form-control" autocomplete="off" required/>
            </div>
			<div class="form-group">
              <select name="method" class="form-control">
                <option value="0">精确搜索</option>
                <option value="1">模糊搜索</option>
              </select>
            </div>
            <input type="submit" value="查询" class="btn btn-info"/>
          </form>
        </div>
<?php
if(isset($_GET['kw'])) {
	if($_GET['type']==1)
		$sql=($_GET['method']==1)?" `username` LIKE '%{$_GET['kw']}%'":" `username`='{$_GET['kw']}'";
	elseif($_GET['type']==2)
		$sql=($_GET['method']==1)?" `domain` LIKE '%{$_GET['kw']}%'":" `domain`='{$_GET['kw']}'";
	elseif($_GET['type']==3)
		$sql=($_GET['method']==1)?" `qq` LIKE '%{$_GET['kw']}%'":" `qq`='{$_GET['kw']}'";
	elseif($_GET['type']==4)
		$sql=($_GET['method']==1)?" `tel` LIKE '%{$_GET['kw']}%'":" `tel`='{$_GET['kw']}'";
	$query = "SELECT count(*) from authorize WHERE{$sql}";
	$result = mysql_query($query);
    $rownum = mysql_fetch_row($result);
	$gls = $rownum[0];
	$con='<p>包含 <font color=red>'.$_GET['kw'].'</font> 的共有 <font color=red><b>'.$gls.'</b></font> 个域名<p>';
}else{
	$query = "SELECT count(*) from authorize WHERE 1";
	$result = mysql_query($query);
    $rownum = mysql_fetch_row($result);
	$sql=" 1";
}
echo $con;
?>
                            </div>
                        </div>						

						<div class="table-responsive">
                        <table  class="display table table-bordered table-striped" id="dynamic-table">
                            <thead>
                            <tr>
                                <th>名称</th>
								<th>产品</th>
                                <th>域名</th>
                                <th>IP</th>
                                <th>QQ</th>
                                <th>电话</th>
								<th>版本号</th>
								<th>升级KEY</th>
								<th>验证FS</th>
								<th>授权FS</th>
                                <th>到期时间</th>
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
 $query = "select count(*) as total from authorize";
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
										$sql="select * from authorize WHERE{$sql} ORDER BY `id` DESC limit $offset,$page_size";
										$result=mysql_query($sql);
										if($result&&mysql_num_rows($result)){
											while ($row=mysql_fetch_assoc($result)) {
											if($row['ip_qh']==1){$ip_qh='IP双重验证';}else{$ip_qh='单域名验证';}
											if($row['yumi']==1){$yumi='顶级泛域名';}else{$yumi='当前单域名';}
											echo "<tr class='gradeX'>";
											echo "<td >".$row['username']."</td>";
											echo "<td >".$row['ycp']."</td>";
											echo "<td >".$row['domain']."</td>";
											echo "<td >".$row['ip']."</td>";
											echo "<td >".$row['qq']."</td>";
											echo "<td >".$row['tel']."</td>";
											echo "<td >".$row['version']."</td>";
											echo "<td >".$row['syskey']."</td>";
											echo "<td >当前（".$ip_qh."）</td>";
											echo "<td >当前（".$yumi."）</td>";
											echo "<td ><span class='label label-success'>".date("Y-m-d",$row['time'])."</span></td>";
											echo "<td >
												<a class='btn btn-primary btn-xs' href='authorize-chanage.php?id=".$row['id']."'><i class='fa fa-edit'></i></a>   <a class='btn btn-primary btn-xs' href='javascript:if(confirm(\"你确实要删除此条授权记录吗?\"))location=\"./authorize-del.php?id=".$row['id']."\"'>
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