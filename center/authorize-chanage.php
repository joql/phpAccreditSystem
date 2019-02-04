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
	
	$id = $_GET['id'];
	$sql = "SELECT * FROM `authorize` WHERE id ='$id';";
	$result=mysql_query($sql);
	if($result&&mysql_num_rows($result)){
	   while ($row=mysql_fetch_assoc($result)) {
			  $username = $row['username'];
			  $domain = $row['domain'];
			  $ip = $row['ip'];
			  $qq = $row['qq'];
			  $tel = $row['tel'];
			  $version = $row['version'];
			  $syskey = $row['syskey'];
			  $ip_qh = $row['ip_qh'];
			  $yumi = $row['yumi'];
			  $ycp = $row['ycp'];
			  $timegl = date("Y-m-d",$row['time']);
	   }
	}	

	
	$action = $_GET['action'];
	if($action=='do'){
		$id = $_POST['id'];
		$username = $_POST['username'];
		$domain = $_POST['domain'];
		$ip = $_POST['ip'];
		$qq = $_POST['qq'];
	    $tel = $_POST['tel'];
		$version = $_POST['version'];
		$syskey = $_POST['syskey'];
		$ip_qh = $_POST['ip_qh'];
		$yumi = $_POST['yumi'];
		$ycp = $_POST['ycp'];
		$time = strtotime($_POST['time']);
		$sql = "UPDATE `authorize` SET `username` = '$username', `domain` = '$domain', `ip` = '$ip', `qq` = '$qq', `tel` = '$tel', `time` = '$time',  `version` = '$version',  `syskey` = '$syskey',  `ip_qh` = '$ip_qh',  `yumi` = '$yumi',  `ycp` = '$ycp' WHERE `id` = '$id';";
	    mysql_query($sql);
		mysql_close();
		echo("<script language=\"javascript\" type=\"text/javascript\" src=\"/data/assets/js/jquery.min.js\"></script><script language=\"javascript\" type=\"text/javascript\" src=\"/data/assets/layer/layer.js\"></script><script>layer.open({  type: 1  ,title: false   ,closeBtn: false  ,area: '200px;'  ,shade: 0.8  ,id: 'LAY_layuipro'   ,resize: false  ,btn: ['确定']  ,moveType: 1   ,content: '<div style=\"padding: 30px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;\">更新成功！</div>'  ,success: function(layero){ var btn = layero.find('.layui-layer-btn');  btn.find('.layui-layer-btn0').attr({ href: 'authorize.php' });  }});</script>");
		//die;
	}

$li1='class="active"';
$li10='class="active"';
?>
<?php include 'header.php';?>
    <title>更新授权-<?php echo $title?></title>
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
                                <h1>更新新授权</h1>
                                <p>填写新的授权信息并保存.</p>
                            </div>
                        </div>						
                         <form action="authorize-chanage.php?action=do" method="post"  role="form">
                            <div class="form-group">
                                <label for="txtDomain">名称</label>
                                <input type="text" name="username" class="form-control" value='<?php echo $username?>'>
                            </div>
                            <div class="form-group">
                                <label for="txtDomain">产品</label>
                                <select name="ycp" class="form-control" >
								<option ><?php echo $ycp?></option>
 									<?php 
										$sql="select * from products ORDER BY `id` DESC";
										$result=mysql_query($sql);
										if($result&&mysql_num_rows($result)){
											while ($row=mysql_fetch_assoc($result)) {
											echo "<option value='".$row['cp']."'>".$row['cp']."</option>";											
											}
										}
									?>   
									</select>
                            </div>
                            <div class="form-group">
                                <label for="txtDomain">授权域名</label>
                                <input type="text" name="domain" class="form-control" value='<?php echo $domain?>'>
                            </div>
                            <div class="form-group">
                                <label for="txtDomain">IP</label>
                                <input type="text" name="ip" class="form-control" value='<?php echo $ip?>'>
                            </div>
                            <div class="form-group">
                                <label for="txtDomain">QQ</label>
                                <input type="text" name="qq" class="form-control" value='<?php echo $qq?>'>
                            </div>
                            <div class="form-group">
                                <label for="txtDomain">电话</label>
                                <input type="text" name="tel" class="form-control" value='<?php echo $tel?>'>
                            </div>
                            <div class="form-group">
                                <label for="txtDomain">版本号</label>
                                <input type="text" name="version" class="form-control" value='<?php echo $version?>'>
                            </div>
                            <div class="form-group">
                                <label for="txtDomain"><i class="fa fa-key"></i>升级KEY<input class="btn btn-primary btn-xs" type= "button" name= "Submit1 " value= "生成" onclick= "show()"></label>
                                <input type="text" name="syskey" id="syskey"  class="form-control" value='<?php echo $syskey?>'>
 					<script language=javascript> 
						function show() 
						{ 
						var str= "0123456789abcdefghijklmnopqrstuvwxyz" 
						var result= " " 
						for(var i=0;i <32;i++) 
						{ 
						var temp=Math.floor(Math.random()*36) 
						result+=str.charAt(temp) 
						} 
						hash = result.MD5();
						document.getElementById( "syskey").value=hash
						} 
					</script>
                            </div>
                            <div class="form-group">
                                <label for="txtDomain">验证方式</label>
                                <select name="ip_qh" class="form-control">
                                            <?php if($ip_qh==1){?>
                                            <option value="1">IP双重验证</option>
                                            <option value="0">单域名验证</option>
                                            <?php }else{?>
                                            <option value="0">单域名验证</option>
                                            <option value="1">IP双重验证</option>
                                            <?php }?>
                                        </select>
                            </div>
							
                            <div class="form-group">
                                <label for="txtDomain">域名授权方式</label>
                                <select name="yumi" class="form-control">
                                            <?php if($yumi==1){?>
                                            <option value="1">顶级泛域名方式</option>
                                            <option value="0">当前单域名方式</option>
                                            <?php }else{?>
                                            <option value="0">当前单域名方式</option>
                                            <option value="1">顶级泛域名方式</option>
                                            <?php }?>
                                        </select>
										<span class="help-block">顶级泛域名授权是指，授权weby.cc后该域名所有的泛域名都可以使用</span>
										<span class="help-block">当前单域名授权是指，只授权当前域名</span>
																			
                            </div>
							
                            <div class="form-group">
                                <label for="txtDomain">到期时间</label>
                                <input type="text" name="time" class="form-control" id="time1" value='<?php echo $timegl?>'>
                            </div>
							<input type='hidden' name="id" class="user" value='<?php echo $id?>'/>
			<div id="bottom">
			  <button class="btn btn-info" type="submit" value="true" id="submit"/><strong>更新授权</strong></button>
            </div>
                        </form>
                    </section>
                    <!--work progress end-->
                </div>

        </section>
    </section>
    <!--main content end-->

<?php include 'footer.php';?>