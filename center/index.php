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

	
$li0='class="active"';
?>
<?php include 'header.php';?>
    <title>控制面板-<?php echo $title?></title>
<?php include 'list.php';?>
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
<?php include 'overview.php';?>
            <div class="row">				
                <div class="col-lg-12">
                    <!--work progress start-->
                    <section class="panel">
                        <div class="panel-body progress-panel">
                            <div class="task-progress">
                                <h1>授权一览</h1>
                                <p>最近添加的授权</p>
                            </div>
                        </div>
						<div class="table-responsive">
                        <table class="table table-hover personal-task">
                            <tbody>
							<tr>
							<td>名称</td>
							<td>产品</td>
							<td>域名</td>
							<td>ip</td>
							<td>QQ</td>
							<td>电话</td>
							<th>版本号</th>
							<th>升级KEY</th>
							<th>验证FS</th>
							<th>授权FS</th>
							<td>到期时间</td>
							</tr>
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
										$sql="select * from authorize order by id DESC limit $offset,$page_size";
										$result=mysql_query($sql);
										if($result&&mysql_num_rows($result)){
											while ($row=mysql_fetch_assoc($result)) {
											if($row['ip_qh']==1){$ip_qh='IP双重验证';}else{$ip_qh='单域名验证';}
											if($row['yumi']==1){$yumi='顶级泛域名';}else{$yumi='当前单域名';}
											echo "<tr>";
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
											echo "</tr>";
											}
										}
									?>

                            </tbody>
                        </table>
						<table class="table table-hover personal-task">
						<tbody>
							<tr>
							<td ><ul class="pagination"><li class="disabled"><a>当前页码：<?php echo $page;?>/<?php echo $page_count;?></a></li><li class="disabled"><a>记录条数：<?php echo $message_count;?>条</a></li></td>

							
							</tr>
							</tbody>
							</table>
                    </section>
                    <!--work progress end-->
                </div></div>
				
                <div class="col-lg-13">
                    <!--work progress start-->
                    <section class="panel">
                        <div class="panel-body progress-panel">
                            <div class="task-progress">
                                <h1>盗版一览</h1>
                                <p>最近盗用的域名</p>
                            </div>
                        </div>
						<div class="table-responsive">
                        <table class="table table-hover personal-task">
                            <tbody>
							<tr>
							<td>ID</td>
							<td>域名</td>
							<td>追踪录入时间</td>
							</tr>
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
 $query = "select count(*) as total from daoban";
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
										$sql="select * from daoban order by id DESC limit $offset,$page_size";
										$result=mysql_query($sql);
										if($result&&mysql_num_rows($result)){
											while ($row=mysql_fetch_assoc($result)) {
											echo "<tr>";
											echo "<td >".$row['id']."</td>";
											echo "<td ><a href=http://".$row['domain']." target='_blank'>".$row['domain']."</a></td>";
											echo "<td >".date("Y-m-d H:i:s",$row['time'])."</td>";
											echo "</tr>";
											}
										}
									?>

                            </tbody>
                        </table>
						<table class="table table-hover personal-task">
						<tbody>
							<tr>
							<td ><ul class="pagination"><li class="disabled"><a>当前页码：<?php echo $page;?>/<?php echo $page_count;?></a></li><li class="disabled"><a>记录条数：<?php echo $message_count;?>条</a></li></td>

							</tr>
							</tbody>
							</table>
                    </section>
                    <!--work progress end-->
                </div></div>

        </section>
    </section>
    <!--main content end-->

<?php include 'footer.php';?>