<?php
include 'data/weby.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Meil88 Weby.cc">
    <link rel="shortcut icon" href="/img/favicon.png">

    <title>正版查询-<?php echo $title ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $route ?>css/bootstrap.min.css"
          rel="stylesheet">
    <!--external css-->
    <link href="<?php echo $route ?>font-awesome/css/font-awesome.css"
          rel="stylesheet"/>
    <!-- Custom styles for this template -->
    <link href="<?php echo $route ?>css/style-new.css"
          rel="stylesheet">
    <script language="JavaScript"
            src="<?php echo $route ?>js/jquery-1.7.2.min.js"></script>
    <script language="JavaScript"
            src="<?php echo $route ?>js/function.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="<?php echo $route?>js/html5shiv.js"></script>
    <script src="<?php echo $route?>js/respond.min.js"></script>
    <![endif]-->
    <style>
        .mr-auto{
            margin-left: auto!important;
        }
        .ml-auto{
            margin-right: auto!important;
        }
    </style>
</head>

<body class="fix-menu">

<section id="container"
         class="login p-fixed d-flex text-center bg-primary common-img-bg">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="login-card card-block auth-body mr-auto ml-auto">
                    <div class="auth-box">
                        <div class="panel-body progress-panel">
                            <h3 class="text-left txt-primary">正版查询</h3>
                            <hr>
                        </div>
                        <div class="table  table-hover personal-task">
                            <ul class="pagination"><a
                                        class="btn btn-info"
                                        href="index.php">正版查询</a>
                                &nbsp;<a class="btn btn-primary"
                                         href="self-help.php">自助授权</a>
                            </ul>
                        </div>
                        <h3 class="form-signin-heading">输入域名查询</h3>
                        <form action="?" class="form-sign"
                              method="get">
                            <span style="color: black;font-size: 12px;">(不要带http://)</span>
                            <hr>
                            <input type="text" class="form-control"
                                   name="search" placeholder="请输入查询域名"
                                   value=""><br>
                            <input type="submit"
                                   class="btn btn-primary btn-block"
                                   name="submit"
                                   value="点击查询"><br/><br/><br/>

                            <?php
                            include "search.php";
                            ?>

                            <div class="container-fluid">
                                <a href="<?php echo $website; ?>"
                                   target="_blank"
                                   class="btn btn-default btn-sm"><span
                                            class="glyphicon glyphicon-credit-card"></span>
                                    购买</a>
                                <a href="http://wpa.qq.com/msgrd?v=3&amp;uin=<?php echo $qq; ?>&amp;site=qq&amp;menu=yes"
                                   class="btn btn-default btn-sm"><span
                                            class="glyphicon glyphicon-exclamation-sign"></span>
                                    帮助</a>
                                <button type="button"
                                        class="btn btn-info btn-sm"
                                        data-toggle="collapse"
                                        data-target="#lxkf-1"><span
                                            class="glyphicon glyphicon-user"></span>
                                    客服
                                </button>
                                <a href="http://wpa.qq.com/msgrd?v=3&amp;uin=<?php echo $qq; ?>&amp;site=qq&amp;menu=yes"
                                   class="btn btn-default btn-sm"><span
                                            class="glyphicon glyphicon-pencil"></span>
                                    反馈</a></div>
                            <p style="text-align:center"><br><a href="/">&copy;Powered by 美仑科技</a>!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>


</section>
</div>
<!--main content end-->
</section>


<!-- js placed at the end of the document so the pages load faster -->
<script src="<?php echo $route ?>js/jquery.js"></script>
<script src="<?php echo $route ?>js/bootstrap.min.js"></script>
<!--toastr-->
<script src="<?php echo $route ?>toastr-master/toastr.js"></script>

<script type="text/javascript"
        src="<?php echo $route ?>jCryption/jquery.jcryption.3.1.0.js"></script>


</body>
</html>
