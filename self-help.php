<?php
include 'data/weby.php';

$domain = $_GET["domain"];
$qq = $_GET["qq"];
$ip = $_GET["ip"];
$km = $_GET["km"];
$time = time();

if ($_GET[submit] == "确定授权") {
    if ($domain == "") {
        header('Content-type:text/html;charset=utf-8');
        echo("<script language=\"javascript\" type=\"text/javascript\" src=\"/data/assets/js/jquery.min.js\"></script><script language=\"javascript\" type=\"text/javascript\" src=\"/data/assets/layer/layer.js\"></script><script>layer.open({  type: 1  ,title: false   ,closeBtn: false  ,area: '200px;'  ,shade: 0.8  ,id: 'LAY_layuipro'   ,resize: false  ,btn: ['确定']  ,moveType: 1   ,content: '<div style=\"padding: 30px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;\">授权域名不能为空!</div>'  ,success: function(layero){ var btn = layero.find('.layui-layer-btn');  btn.find('.layui-layer-btn0').attr({ href: 'self-help.php' });  }});</script>");
    } else {
        header('Content-type:text/html;charset=utf-8');
        if ($ip == "") {
            header('Content-type:text/html;charset=utf-8');
            echo("<script language=\"javascript\" type=\"text/javascript\" src=\"/data/assets/js/jquery.min.js\"></script><script language=\"javascript\" type=\"text/javascript\" src=\"/data/assets/layer/layer.js\"></script><script>layer.open({  type: 1  ,title: false   ,closeBtn: false  ,area: '200px;'  ,shade: 0.8  ,id: 'LAY_layuipro'   ,resize: false  ,btn: ['确定']  ,moveType: 1   ,content: '<div style=\"padding: 30px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;\">IP不能为空!</div>'  ,success: function(layero){ var btn = layero.find('.layui-layer-btn');  btn.find('.layui-layer-btn0').attr({ href: 'self-help.php' });  }});</script>");
        } else {
            if ($qq == "") {
                header('Content-type:text/html;charset=utf-8');
                echo("<script language=\"javascript\" type=\"text/javascript\" src=\"/data/assets/js/jquery.min.js\"></script><script language=\"javascript\" type=\"text/javascript\" src=\"/data/assets/layer/layer.js\"></script><script>layer.open({  type: 1  ,title: false   ,closeBtn: false  ,area: '200px;'  ,shade: 0.8  ,id: 'LAY_layuipro'   ,resize: false  ,btn: ['确定']  ,moveType: 1   ,content: '<div style=\"padding: 30px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;\">QQ不能为空!</div>'  ,success: function(layero){ var btn = layero.find('.layui-layer-btn');  btn.find('.layui-layer-btn0').attr({ href: 'self-help.php' });  }});</script>");
            } else {
                if ($km == "") {
                    header('Content-type:text/html;charset=utf-8');
                    echo("<script language=\"javascript\" type=\"text/javascript\" src=\"/data/assets/js/jquery.min.js\"></script><script language=\"javascript\" type=\"text/javascript\" src=\"/data/assets/layer/layer.js\"></script><script>layer.open({  type: 1  ,title: false   ,closeBtn: false  ,area: '200px;'  ,shade: 0.8  ,id: 'LAY_layuipro'   ,resize: false  ,btn: ['确定']  ,moveType: 1   ,content: '<div style=\"padding: 30px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;\">卡密不能为空!</div>'  ,success: function(layero){ var btn = layero.find('.layui-layer-btn');  btn.find('.layui-layer-btn0').attr({ href: 'self-help.php' });  }});</script>");
                } else {
                    if ($km == "admin") {
                        header('Content-type:text/html;charset=utf-8');
                        echo("<script language=\"javascript\" type=\"text/javascript\" src=\"/data/assets/js/jquery.min.js\"></script><script language=\"javascript\" type=\"text/javascript\" src=\"/data/assets/layer/layer.js\"></script><script>layer.open({  type: 1  ,title: false   ,closeBtn: false  ,area: '200px;'  ,shade: 0.8  ,id: 'LAY_layuipro'   ,resize: false  ,btn: ['确定']  ,moveType: 1   ,content: '<div style=\"padding: 30px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;\">密有误或无法使用!</div>'  ,success: function(layero){ var btn = layero.find('.layui-layer-btn');  btn.find('.layui-layer-btn0').attr({ href: 'self-help.php' });  }});</script>");
                    } else {
                        $sql = "SELECT * FROM `cami` where km='$km' limit 1";//判断卡密
                        $row = mysql_fetch_array(mysql_query($sql));
                        if ($row) {
                            //添加授权
                            $yme = $row['ytime'];
                            $ytime = date('Y') + $yme;
                            $mdtime = date('-m-d H:i:s');
                            $endtime = strtotime("$ytime$mdtime");

                            mysql_select_db($dbname);
                            mysql_query("set names utf8");
                            $SQL = "INSERT INTO `authorize` (`id`, `domain`, `qq`, `ip`, `time`) VALUES (NULL, '$domain', '$qq', '$ip', '$endtime');";//添加域名
                            //echo $SQL;
                            mysql_query($SQL);
                            $kmid = $row[id];
                            mysql_query("DELETE FROM `cami` where `id` = $kmid ");//删除卡密
                            header('Content-type:text/html;charset=utf-8');
                            echo("<script language=\"javascript\" type=\"text/javascript\" src=\"/data/assets/js/jquery.min.js\"></script><script language=\"javascript\" type=\"text/javascript\" src=\"/data/assets/layer/layer.js\"></script><script>layer.open({  type: 1  ,title: false   ,closeBtn: false  ,area: '280px;'  ,shade: 0.8  ,id: 'LAY_layuipro'   ,resize: false  ,btn: ['确定']  ,moveType: 1   ,content: '<div style=\"padding: 30px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;\">【" . $domain . "】授权成功！</div>'  ,success: function(layero){ var btn = layero.find('.layui-layer-btn');  btn.find('.layui-layer-btn0').attr({ href: 'self-help.php' });  }});</script>");
                            $status = '已使用';
                            $status = base64_encode($status);
                            $sql = "INSERT INTO `camilog` (`domain`, `km`, `time`,  `status`,  `ytime`) VALUES ('$domain', '$km', '$time', '$status', '$yme');";
                            mysql_query($sql);
                            mysql_close();

                        } else {
                            header('Content-type:text/html;charset=utf-8');
                            echo("<script language=\"javascript\" type=\"text/javascript\" src=\"/data/assets/js/jquery.min.js\"></script><script language=\"javascript\" type=\"text/javascript\" src=\"/data/assets/layer/layer.js\"></script><script>layer.open({  type: 1  ,title: false   ,closeBtn: false  ,area: '200px;'  ,shade: 0.8  ,id: 'LAY_layuipro'   ,resize: false  ,btn: ['确定']  ,moveType: 1   ,content: '<div style=\"padding: 30px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;\">卡密错误或不存在!</div>'  ,success: function(layero){ var btn = layero.find('.layui-layer-btn');  btn.find('.layui-layer-btn0').attr({ href: 'self-help.php' });  }});</script>");
                        }
                    }
                }
            }
        }
    }
}
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

    <title>自动授权-<?php echo $title ?></title>

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
        .mr-auto {
            margin-left: auto !important;
        }

        .ml-auto {
            margin-right: auto !important;
        }
        .alert-dangergg {
            color: #a94442;
            background-color: #f2dede;
            border-color: #ebccd1;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
            font-size: 13px;
        }
    </style>
</head>

<body class="fix-menu">


<section id="container"
         class="text-center bg-primary common-img-bg">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="login-card card-block auth-body mr-auto ml-auto">
                    <div class="auth-box">
                        <div class="panel-body progress-panel">
                            <h3 class="text-left txt-primary">自助授权</h3>
                            <hr>
                        </div>
                        <div class="table  table-hover personal-task">
                            <ul class="pagination"><a
                                        class="btn btn-info"
                                        href="index.php">正版查询</a>
                                &nbsp;<a class="btn btn-primary"
                                         href="self-help.php">自助授权</a>
                            </ul>
                            &nbsp;<a class="btn btn-warning"
                                     href="<?php echo $website; ?>"
                                     target="_blank">购买卡密</a>
                        </div>
                        <div class="alert-dangergg">
                            <?php echo $prompt; ?>    </div>
                        <br>

                        <h3 class="form-signin-heading">
                            输入授权信息</h3>
                        <form action="self-help.php"
                              class="form-sign"
                              method="get">
                            <input type="hidden" name="self" value="6"/>
                            <span style="color: black;font-size: 12px;">(不要带http://，提交前请检查，提交后无法修改！)</span>
                            <hr>
                            <input type="text"
                                   class="form-control"
                                   name="domain"
                                   placeholder="请输入授权域名"
                                   value=""><br>
                            <input type="text"
                                   class="form-control"
                                   name="ip" placeholder="请输入授权ip"
                                   value=""><br>
                            <input type="text"
                                   class="form-control"
                                   name="qq" placeholder="请输入QQ账号"
                                   value=""><br>
                            <input type="text"
                                   class="form-control"
                                   name="km" placeholder="请输入授权卡密"
                                   value=""><br>
                            <input type="submit" name="submit"
                                   class="btn btn-primary btn-block"
                                   value="确定授权">
                        </form>
                        <br/>
                        <br/>
                        <br/>
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
                        <p style="text-align:center"><br><a
                                    href="/">&copy;Powered by美仑科技</a>!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
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
