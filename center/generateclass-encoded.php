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
$li23='class="active"';
?>
<?php include 'header.php';?>
    <title>PHP批量加密工具-<?php echo $title?></title>
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
                                        <strong>将需要加密的代码，复制到encoded目录中，然后点击马上加密按钮.</strong>
                                    </div>
                                    <div class="form-group">
                                        <label for="txtClass">PHP批量加密说明</label>

                                      <textarea class="form-control" id="txtScript" cols="60" rows="15" readonly>
批量加密工具使用说明

1.FTP工具，把需要加密的php文件上传到根目录下的encoded目录中，然后点击加密按钮等待加密完成。

2.如果您不想存在版权信息您可以自行删除，删除方式。

<？php /* -- 美仑视觉整合 混淆加密：http://www.weby.cc 
-- enphp : https://git.oschina.net/mz/mzphp2
 */ error_reporting

删除注意事项，<？php /* （<？php空格/*）之间是有一个空格的，不能删除。
删除注意事项，*/ error_reporting （*/空格error_reporting）之间是有一个空格的，不能删除。

如果不注意删除了，那么代码就不完整，就会报500错误！所以一定要注意！

删除后的代码是这样的，
<？php  error_reporting  注意是保留两个空格。
 
</textarea>


                                    </div>
									请您确定下是否已经复制或者上传好php文件到encoded目录中
									<button class="btn btn-info" id="test2"/><strong>马上加密</strong></button>
									
                                                    </div>
													
                    </section>
                    <!--work progress end-->
                </div>

        </section>
    </section>
    <!--main content end-->
<script>
$('#test2').on('click', function(){
layer.open({
  type: 2,
  style: 'position:fixed; bottom:0; left:0; width: 100%; height: 200px; padding:10px 0; border:none;', 
  skin: 'layui-layer-rim', 
  content: ['generateclass-encoded-jiami.php', 'no']
});
});
</script>
<?php include 'footer.php';?>
