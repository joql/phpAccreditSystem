<?php
include 'data/weby.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Meil88 Weby.cc">
    <link rel="shortcut icon" href="/img/favicon.png">

    <title>授权系统登录-<?php echo $title?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $route?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $route?>css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo $route?>font-awesome/css/font-awesome.css"  rel="stylesheet"/>
    <!-- Custom styles for this template -->
    <link href="<?php echo $route?>css/style.css"  rel="stylesheet">
    <link href="<?php echo $route?>css/style-responsive.css" rel="stylesheet"/>
    <!--toastr-->
    <link href="<?php echo $route?>toastr-master/toastr.css" rel="stylesheet" type="text/css"/>
    <script language="JavaScript" src="<?php echo $route?>js/jquery-1.7.2.min.js"></script>
    <script language="JavaScript" src="<?php echo $route?>js/function.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="<?php echo $route?>js/html5shiv.js" ></script>
    <script src="<?php echo $route?>js/respond.min.js" ></script>
    <![endif]-->
</head>

<body class="login-body">

<div class="container">

<form class="form-signin" name="loginform" method="post" action="###">
        <h2 class="form-signin-heading">域名授权系统登录</h2> 
            <div class="login-wrap">

                      <span id='m1'></span><input type="hidden" id='a1' /><input class="form-control" name="username" id="z1" onblur="login(1)" type="text" placeholder="账号" />

                      <span id='m2'></span><input type="hidden" id='a2' /><input class="form-control" name="password" id="z2" onblur="login(2)" type="password" placeholder="密码" />&nbsp;
                                            
					  <input class="form-control" name="safepassword" id="z2" onblur="login(2)" type="password" placeholder="安全码" />
            <div id="bottom">
            <a class="btn btn-lg btn-login btn-block"  href="###" id="login">登录</a>
            </div>
            </div>
           
</form>

</div>


<!-- js placed at the end of the document so the pages load faster -->
<script src="<?php echo $route?>js/jquery.js" ></script>
<script src="<?php echo $route?>js/bootstrap.min.js" ></script>
<!--toastr-->
<script src="<?php echo $route?>toastr-master/toastr.js" ></script>

<script type="text/javascript" src="<?php echo $route?>jCryption/jquery.jcryption.3.1.0.js" ></script>


</body>
</html>