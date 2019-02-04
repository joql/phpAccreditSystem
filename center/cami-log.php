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
$li113='class="active"';
?>
<?php include 'header.php';?>
    <title>日记列表-<?php echo $title?></title>
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
                                <h1>卡密授权日记</h1>
                                <p>所有卡密授权日记列表一览.</p>
                            </div>
                        </div>
						<div class="table-responsive">
                        <table  class="display table table-bordered table-striped" id="dynamic-table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>域名</th>
                                <th>卡密</th>
                                <th>卡密期限</th>
                                <th>时间</th>
                                <th>状态</th>
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
 $_pageNum = 10; //最多显示多少个页码
 $query = "select count(*) as total from camilog";
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
										$sql="select * from camilog ORDER BY `id` DESC  limit $offset,$page_size";
										$result=mysql_query($sql);
										if($result&&mysql_num_rows($result)){
											while ($row=mysql_fetch_assoc($result)) {
											echo "<tr class='gradeX'>";
											echo "<td >".$row['id']."</td>";
											echo "<td >".$row['domain']."</td>";
											echo "<td >".$row['km']."</td>";
											echo "<td >".$row['ytime']."年</td>";
											echo "<td >".date("Y-m-d H:i:s",$row['time'])."</td>";
											echo "<td >".base64_decode($row['status'])."</td>";
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
                </div>

        </section>
    </section>
    <!--main content end-->

<?php include 'footer.php';?>
