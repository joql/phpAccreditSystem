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
?>
	<script type="text/javascript" src="<?php echo $route?>calendar/js/laydate.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo $route?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $route?>css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo $route?>font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!--toastr-->
    <link href="<?php echo $route?>toastr-master/toastr.css" rel="stylesheet" type="text/css" />

    <!-- Custom styles for this template -->

    <link href="<?php echo $route?>css/style.css" rel="stylesheet">
    <link href="<?php echo $route?>css/style-responsive.css" rel="stylesheet" />

    <script language="javascript" type="text/javascript" src="<?php echo $route?>js/jquery.min.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo $route?>layer/layer.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="<?php echo $route?>js/html5shiv.js"></script>
    <script src="<?php echo $route?>js/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<section id="container" >
    <!--header start-->
    <header class="header white-bg">
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>
        <!--logo start-->
        <a href="./" class="logo">PHP<span>产品授权系统</span></a>
        <!--logo end-->
        <div class="nav notify-row" id="top_menu">

        </div>
        <div class="top-nav ">

            <!--search & user info start-->
<ul class="nav pull-right top-menu">
    <!-- user login dropdown start-->
    <li class="dropdown">
        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
            <!--<img alt="" src="assetsimg/avatar1_small.jpg">-->
            <span class="username">安全退出</span>
            <b class="caret"></b>
        </a>
        <ul class="dropdown-menu extended logout">
            <div class="log-arrow-up"></div>
            <li><a href="logout.php"><i class="fa fa-key"></i> 退出 </a></li>
        </ul>
    </li>
    <!-- user login dropdown end -->
</ul>
<!--search & user info end-->

       </div>
    </header>
    <!--header end-->
    <!--sidebar start-->
    <aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <li>
                <a <?php echo $li0?> href="./">
                    <i class="fa fa-dashboard"></i>
                    <span>控制面板</span>
                </a>
            </li>

            <li class="sub-menu">
                <a <?php echo $li1?>  href="javascript:;" >
                    <i class="fa fa-key"></i>
                    <span>授权信息</span>
                </a>
                <ul class="sub">
                    <li <?php echo $li10?> ><a  href="authorize.php">管理授权</a></li>
                    <li <?php echo $li11?> ><a  href="authorize-add.php">添加授权</a></li>
                </ul>
            </li>
            
            <li class="sub-menu">
                <a <?php echo $li111?>  href="javascript:;" >
                    <i class="fa fa-qrcode"></i>
                    <span>卡密管理</span>
                </a>
                <ul class="sub">
                    <li <?php echo $li112?> ><a  href="cami.php">生成卡密</a></li>
                    <li <?php echo $li113?> ><a  href="cami-log.php">卡密日志</a></li>
                </ul>
            </li>           
            
            <li class="sub-menu">
                <a <?php echo $li2?> href="javascript:;" >
                    <i class="fa fa-shield"></i>
                    <span>安全工具</span>
                </a>
                <ul class="sub">
                    <li <?php echo $li20?> ><a  href="generateclass.php">授权代码</a></li>
                    <li <?php echo $li21?> ><a  href="generateclass-1.php">到期时间代码</a></li>
					<li <?php echo $li22?> ><a  href="generateclass-2.php">在线更新代码</a></li>
					<li <?php echo $li23?> ><a  href="generateclass-encoded.php">PHP批量加密工具</a></li>
                </ul>
            </li>
			
            <li class="sub-menu">
                <a <?php echo $li9?> href="javascript:;" >
                    <i class="fa fa-list-ul"></i>
                    <span>产品分类</span>
                </a>
                <ul class="sub">
                    <li <?php echo $li90?> ><a  href="products.php">管理产品</a></li>
                    <li <?php echo $li91?> ><a  href="products-add.php">添加产品</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a <?php echo $li3?> href="javascript:;" >
                    <i class="fa fa-cloud-upload"></i>
                    <span>产品更新</span>
                </a>
                <ul class="sub">
                    <li <?php echo $li30?> ><a  href="version-index.php">版本列表</a></li>
                    <li <?php echo $li31?> ><a  href="version-add.php">添加版本</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a <?php echo $li4?> href="javascript:;" >
                    <i class="fa fa-info-circle"></i>
                    <span>日记列表</span>
					</a>
                <ul class="sub">
                <li <?php echo $li4?> ><a  href="log.php">升级日记</a></li>
                </ul>
            </li>
			
			<li class="sub-menu">
                <a <?php echo $li5?> href="javascript:;" >
                    <i class="fa fa-bullseye"></i>
                    <span>追踪功能</span>
                </a>
                <ul class="sub">
                    <li <?php echo $li5?> ><a  href="daoban.php">盗版追踪</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a <?php echo $li6?> href="javascript:;" >
                    <i class="fa fa-cogs"></i>
                    <span>系统设置</span>
					
                </a>
                <ul class="sub">
				    <li <?php echo $li60?> ><a  href="setup.php">常规设置</a></li>
					<li <?php echo $li61?> ><a  href="message.php">提示设置</a></li>
					<li <?php echo $li63?> ><a  href="selfhelp.php">自助设置</a></li>
                    <li <?php echo $li62?> ><a  href="profile.php">修改密码</a></li>
                </ul>
            </li>
			
			<li class="sub-menu">
                <a <?php echo $li7?> href="javascript:;" >
                    <i class="fa fa-question-circle"></i>
                    <span>系统信息</a>
					
                </a>
                <ul class="sub">
				<li <?php echo $li70?> ><a  href="verinfo.php">版本信息</a></li>
                </ul>
            </li>


        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>    <!--sidebar end-->
