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

    <title>正版查询-<?php echo $title?></title>

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
	<style>
	body{
		margin: 0 auto;
		text-align: center;
	}
	.container {
	  max-width: 580px;
	  padding: 15px;
	  margin: 0 auto;
	}
	.hzhz{
		float: left;
	}
	.bzbz {
	color: #31708f;
	background-color: rgba(217, 237, 247, 0.73);
	border-color: #bce8f1;

	padding: 15px;
	margin-bottom: 20px;
	border: 1px solid transparent;
	border-radius: 3px;
	}
	.form-controltm {
	display: block;
	width: 100%;
	height: 34px;
	padding: 6px 12px;
	font-size: 14px;
	line-height: 1.42857143;
	color: #555;
	background-color: rgba(255, 255, 255, 0.48);
	background-image: none;
	border: 1px solid #ccc;
	border-radius: 4px;
	-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
	box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
	-webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
	-o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
	transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
	}
	</style>
</head>

<body >

<section id="container" >

    <section id="main-content">
        <section class="wrapper">
           <div class="row">
<div class="col-md-6 col-md-offset-2">
                    <!--work progress start-->
                    <section class="panel">
                        <div class="panel-body progress-panel">
                            <div class="task-progress">
                                <h1>正版查询</h1>
                                
                            </div>
                        </div>
						<div class="table  table-hover personal-task">
							<ul class="pagination"><a class="btn btn-info" href="index.php">正版查询</a> &nbsp;<a class="btn btn-primary" href="self-help.php">自助授权</a></ul>
							</div>
                        <h3 class="form-signin-heading">输入域名查询</h3>
                        <form action="?" class="form-sign" method="get">
							(不要带http://)<br><br>
							<input type="text" class="form-controltm" name="search" placeholder="请输入查询域名" value=""><br>
							<input type="submit" class="btn btn-danger btn-block" name="submit" value="点击查询"><br/><br/><br/>
							
<?php
include "search.php";
?>							
							
                        <div class="container-fluid"> 
								<a href="<?php echo $website; ?>" target="_blank" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-credit-card"></span> 购买</a> 
								<a href="http://wpa.qq.com/msgrd?v=3&amp;uin=<?php echo $qq; ?>&amp;site=qq&amp;menu=yes" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-exclamation-sign"></span> 帮助</a>
         						<button type="button" class="btn btn-info btn-sm" data-toggle="collapse" data-target="#lxkf-1"><span class="glyphicon glyphicon-user"></span> 客服</button>
							<a href="http://wpa.qq.com/msgrd?v=3&amp;uin=<?php echo $qq; ?>&amp;site=qq&amp;menu=yes" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-pencil"></span> 反馈</a> </div>
   <p style="text-align:center"><br>&copy; Powered by <a href="/">美仑科技</a>!</p></div>
                    </section>
                    <!--work progress end-->
                </div>
				

        </section>
    </section>
    <!--main content end-->
</section>


<!-- js placed at the end of the document so the pages load faster -->
<script src="<?php echo $route?>js/jquery.js" ></script>
<script src="<?php echo $route?>js/bootstrap.min.js" ></script>
<!--toastr-->
<script src="<?php echo $route?>toastr-master/toastr.js" ></script>

<script type="text/javascript" src="<?php echo $route?>jCryption/jquery.jcryption.3.1.0.js" ></script>


</body>
</html>
