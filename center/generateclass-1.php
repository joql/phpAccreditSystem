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
$li21='class="active"';
?>
<?php include 'header.php';?>
    <title>到期时间代码-<?php echo $title?></title>
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
                                        <strong>将下面时间显示代码.添加到项目代码里.</strong>
                                    </div>
                                    <div class="form-group">
                                        <label for="txtClass">到期显示代码</label>
                                      <textarea class="form-control" id="txtScript" cols="60" rows="15" readonly>
/*添加到需要显示php源码顶部*/  请添加在<？php  ？> 里面

        $hosturl = $_SERVER['HTTP_HOST'];
        $updatehost = 'http://<? echo $_SERVER['SERVER_NAME'];  ?>/update.php';
        $updatehosturl = $updatehost . '?a=client_check_time&v=' . $ver . '&u=' . $hosturl;
        $domain_time = file_get_contents($updatehosturl);
        if($domain_time == '0'){
            $domain_time = '[授权版本：授权已过期，请联系客服QQ:403700890]';
        }else{
            $domain_time = '授权版本：(美仑网高级商业版)--免费更新服务截止：(' . date("Y-m-d", $domain_time) . ')';
        }

unset($domain);

/*添加到需要显示时间的位置----复制添加时请把 ？换成 ?  */

<font color=red><？php echo $domain_time？></font>

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
