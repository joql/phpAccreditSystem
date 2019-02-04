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

	
$li7='class="active"';
$li70='class="active"';
?>
<?php include 'header.php';?>
    <title>系统信息-<?php echo $title?></title>
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
                                <h1>关于本系统</h1>
                                <p>PHP授权系统-一个真正完美的授权系统</p>
                            </div>
                        </div>
                        <table class="table table-hover personal-task">
                            <tbody>
                                <tr>

                                <td> <i class="fa fa-comments-o"></i>   版本 </td>

                                <td>

                                </td>
                                    <td>
                                    </td><td>
									<!--网址只是做了一下16进防黑加密，建议保留开发者信息，这样可以为实时得知版本更新-->
									<span id="edition"></span>
									<script language="JavaScript" src="http://%61%70%69%2E%77%65%62%79%2E%63%63/api.php?op=edition"></script>
									</td><td>
                                    </td>

                                </tr>

                                <tr>

                                <td> <i class="fa fa-cloud-upload"></i>   历史 </td>

                                <td>

                                </td>
                                    <td>
                                    </td><td>
									<!--网址只是做了一下16进防黑加密，建议保留开发者信息，这样可以为实时得知版本更新-->
									<iframe class="form-control" src="http://%61%70%69%2E%77%65%62%79%2E%63%63/api.php?op=history" style="width: 100%; height: 200px;" readonly ></iframe>
									</td><td>
                                    </td>

                                </tr>                   


                                <tr>

                                    <td> <i class="fa fa-smile-o"></i>   开发者</td>

                                    <td>

                                    </td>
                                    <td>
                                    </td><td>
									<!--网址只是做了一下16进防黑加密，建议保留开发者信息，这样可以为实时得知版本更新-->
									<span id="development"></span>
                                             <script language="JavaScript" src="http://%61%70%69%2E%77%65%62%79%2E%63%63/api.php?op=development"></script>
                                    </td><td>
                                    </td>

                                </tr>
								
                                <tr>

                                    <td> <i class="fa fa-folder-open-o"></i>   升级更新</td>

                                    <td>

                                    </td>
                                    <td>
                                    </td><td>
									<!--网址只是做了一下16进防黑加密，建议保留开发者信息，这样可以为实时得知版本更新-->
									<span id="upgrade"></span>
									<script language="JavaScript" src="http://%61%70%69%2E%77%65%62%79%2E%63%63/api.php?op=upgrade"></script>
                                    </td><td>
                                    </td>

                                </tr>

                            </tbody>
                        </table>
                    </section>
                    <!--work progress end-->
                </div>
				

        </section>
    </section>
    <!--main content end-->

<?php include 'footer.php';?>