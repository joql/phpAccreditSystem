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
error_reporting(0);

function getTopDomainhuo(){

		$host=$_SERVER['HTTP_HOST'];

		$matchstr="[^\.]+\.(?:(".$str.")|\w{2}|((".$str.")\.\w{2}))$";

		if(preg_match("/".$matchstr."/ies",$host,$matchs)){

			$domain=$matchs['0'];

		}else{

			$domain=$host;

		}

		return $domain;

}

$domain=getTopDomainhuo();

$real_domain='baidu.com'; //本地检查时 用户的授权域名 和时间

$check_host = 'http://www.shq.com/update.php';
$client_check = $check_host . '?a=client_check&u=' . $_SERVER['HTTP_HOST'];
$check_message = $check_host . '?a=check_message&u=' . $_SERVER['HTTP_HOST'];
$check_info=file_get_contents($client_check);
$message = file_get_contents($check_message);



if($check_info=='1'){

echo "<html lang=\"en\">\n";
echo "   <head>\n";
echo "       <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n";
echo "       <title>$message</title>\n";
echo "       <link href=\"macc_t/public.css\" rel=\"stylesheet\" type=\"text/css\" />\n";
echo "       <link href=\"macc_t/index.css\" rel=\"stylesheet\" type=\"text/css\" />\n";
echo "       <link href=\"macc_t/404.css\" rel=\"stylesheet\" type=\"text/css\" />\n";
echo "       <script src=\"macc_t/jquery-1.7.2.min.js\"></script>\n";
echo "       <script type=\"text/javascript\">\n";
echo "           $(function() {\n";
echo "               var h = $(window).height();\n";
echo "               $('body').height(h);\n";
echo "               $('.mianBox').height(h);\n";
echo "               centerWindow(\".tipInfo\");\n";
echo "           });\n";
echo "            //2.将盒子方法放入这个方，方便法统一调用\n";
echo "           function centerWindow(a) {\n";
echo "               center(a);\n";
echo "               //自适应窗口\n";
echo "               $(window).bind('scroll resize',\n";
echo "                       function() {\n";
echo "                           center(a);\n";
echo "                       });\n";
echo "           }\n";
echo "            //1.居中方法，传入需要剧中的标签\n";
echo "           function center(a) {\n";
echo "               var wWidth = $(window).width();\n";
echo "               var wHeight = $(window).height();\n";
echo "               var boxWidth = $(a).width();\n";
echo "               var boxHeight = $(a).height();\n";
echo "               var scrollTop = $(window).scrollTop();\n";
echo "               var scrollLeft = $(window).scrollLeft();\n";
echo "               var top = scrollTop + (wHeight - boxHeight) / 2;\n";
echo "               var left = scrollLeft + (wWidth - boxWidth) / 2;\n";
echo "               $(a).css({\n";
echo "                   \"top\": top,\n";
echo "                   \"left\": left\n";
echo "               });\n";
echo "           }\n";
echo "       </script>\n";
echo "   </head>\n";
echo "   <body>\n";
echo "       <div class=\"mianBox\">\n";
echo "           <img src=\"macc_t/yun0.png\" alt=\"\" class=\"yun yun0\" />\n";
echo "           <img src=\"macc_t/yun1.png\" alt=\"\" class=\"yun yun1\" />\n";
echo "           <img src=\"macc_t/yun2.png\" alt=\"\" class=\"yun yun2\" />\n";
echo "           <img src=\"macc_t/bird.png\" alt=\"\" class=\"bird\" />\n";
echo "           <img src=\"macc_t/san.png\" alt=\"\" class=\"san\" />\n";
echo "           <div class=\"tipInfo\">\n";
echo "               <div class=\"in\">\n";
echo "                   <div class=\"textThis\">\n";
echo "                       <h2>$message</h2>\n";
echo "                       <p><span>页面自动<a id=\"href\" href=\"#\">跳转</a></span><span>等待<b id=\"wait\">10</b>秒</span></p>\n";
echo "                       <script type=\"text/javascript\">                            (function() {\n";
echo "                               var wait = document.getElementById('wait'), href = document.getElementById('href').href;\n";
echo "                               var interval = setInterval(function() {\n";
echo "                                   var time = --wait.innerHTML;\n";
echo "                                   if (time <= 0) {\n";
echo "                                       location.href = href;\n";
echo "                                       clearInterval(interval);\n";
echo "                                   }\n";
echo "                                   ;\n";
echo "                               }, 1000);\n";
echo "                           })();\n";
echo "                       </script>\n";
echo "                   </div>\n";
echo "               </div>\n";
echo "           </div>\n";
echo "       </div>\n";
echo "   </body>\n";
echo "</html>\n";

   die;

}elseif($check_info=='2'){

echo "<html lang=\"en\">\n";
echo "   <head>\n";
echo "       <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n";
echo "       <title>$message</title>\n";
echo "       <link href=\"macc_t/public.css\" rel=\"stylesheet\" type=\"text/css\" />\n";
echo "       <link href=\"macc_t/index.css\" rel=\"stylesheet\" type=\"text/css\" />\n";
echo "       <link href=\"macc_t/404.css\" rel=\"stylesheet\" type=\"text/css\" />\n";
echo "       <script src=\"macc_t/jquery-1.7.2.min.js\"></script>\n";
echo "       <script type=\"text/javascript\">\n";
echo "           $(function() {\n";
echo "               var h = $(window).height();\n";
echo "               $('body').height(h);\n";
echo "               $('.mianBox').height(h);\n";
echo "               centerWindow(\".tipInfo\");\n";
echo "           });\n";
echo "            //2.将盒子方法放入这个方，方便法统一调用\n";
echo "           function centerWindow(a) {\n";
echo "               center(a);\n";
echo "               //自适应窗口\n";
echo "               $(window).bind('scroll resize',\n";
echo "                       function() {\n";
echo "                           center(a);\n";
echo "                       });\n";
echo "           }\n";
echo "            //1.居中方法，传入需要剧中的标签\n";
echo "           function center(a) {\n";
echo "               var wWidth = $(window).width();\n";
echo "               var wHeight = $(window).height();\n";
echo "               var boxWidth = $(a).width();\n";
echo "               var boxHeight = $(a).height();\n";
echo "               var scrollTop = $(window).scrollTop();\n";
echo "               var scrollLeft = $(window).scrollLeft();\n";
echo "               var top = scrollTop + (wHeight - boxHeight) / 2;\n";
echo "               var left = scrollLeft + (wWidth - boxWidth) / 2;\n";
echo "               $(a).css({\n";
echo "                   \"top\": top,\n";
echo "                   \"left\": left\n";
echo "               });\n";
echo "           }\n";
echo "       </script>\n";
echo "   </head>\n";
echo "   <body>\n";
echo "       <div class=\"mianBox\">\n";
echo "           <img src=\"macc_t/yun0.png\" alt=\"\" class=\"yun yun0\" />\n";
echo "           <img src=\"macc_t/yun1.png\" alt=\"\" class=\"yun yun1\" />\n";
echo "           <img src=\"macc_t/yun2.png\" alt=\"\" class=\"yun yun2\" />\n";
echo "           <img src=\"macc_t/bird.png\" alt=\"\" class=\"bird\" />\n";
echo "           <img src=\"macc_t/san.png\" alt=\"\" class=\"san\" />\n";
echo "           <div class=\"tipInfo\">\n";
echo "               <div class=\"in\">\n";
echo "                   <div class=\"textThis\">\n";
echo "                       <h2>$message</h2>\n";
echo "                       <p><span>页面自动<a id=\"href\" href=\"#\">跳转</a></span><span>等待<b id=\"wait\">10</b>秒</span></p>\n";
echo "                       <script type=\"text/javascript\">                            (function() {\n";
echo "                               var wait = document.getElementById('wait'), href = document.getElementById('href').href;\n";
echo "                               var interval = setInterval(function() {\n";
echo "                                   var time = --wait.innerHTML;\n";
echo "                                   if (time <= 0) {\n";
echo "                                       location.href = href;\n";
echo "                                       clearInterval(interval);\n";
echo "                                   }\n";
echo "                                   ;\n";
echo "                               }, 1000);\n";
echo "                           })();\n";
echo "                       </script>\n";
echo "                   </div>\n";
echo "               </div>\n";
echo "           </div>\n";
echo "       </div>\n";
echo "   </body>\n";
echo "</html>\n";

   die;

}elseif($check_info=='3'){

echo "<html lang=\"en\">\n";
echo "   <head>\n";
echo "       <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n";
echo "       <title>$message</title>\n";
echo "       <link href=\"macc_t/public.css\" rel=\"stylesheet\" type=\"text/css\" />\n";
echo "       <link href=\"macc_t/index.css\" rel=\"stylesheet\" type=\"text/css\" />\n";
echo "       <link href=\"macc_t/404.css\" rel=\"stylesheet\" type=\"text/css\" />\n";
echo "       <script src=\"macc_t/jquery-1.7.2.min.js\"></script>\n";
echo "       <script type=\"text/javascript\">\n";
echo "           $(function() {\n";
echo "               var h = $(window).height();\n";
echo "               $('body').height(h);\n";
echo "               $('.mianBox').height(h);\n";
echo "               centerWindow(\".tipInfo\");\n";
echo "           });\n";
echo "            //2.将盒子方法放入这个方，方便法统一调用\n";
echo "           function centerWindow(a) {\n";
echo "               center(a);\n";
echo "               //自适应窗口\n";
echo "               $(window).bind('scroll resize',\n";
echo "                       function() {\n";
echo "                           center(a);\n";
echo "                       });\n";
echo "           }\n";
echo "            //1.居中方法，传入需要剧中的标签\n";
echo "           function center(a) {\n";
echo "               var wWidth = $(window).width();\n";
echo "               var wHeight = $(window).height();\n";
echo "               var boxWidth = $(a).width();\n";
echo "               var boxHeight = $(a).height();\n";
echo "               var scrollTop = $(window).scrollTop();\n";
echo "               var scrollLeft = $(window).scrollLeft();\n";
echo "               var top = scrollTop + (wHeight - boxHeight) / 2;\n";
echo "               var left = scrollLeft + (wWidth - boxWidth) / 2;\n";
echo "               $(a).css({\n";
echo "                   \"top\": top,\n";
echo "                   \"left\": left\n";
echo "               });\n";
echo "           }\n";
echo "       </script>\n";
echo "   </head>\n";
echo "   <body>\n";
echo "       <div class=\"mianBox\">\n";
echo "           <img src=\"macc_t/yun0.png\" alt=\"\" class=\"yun yun0\" />\n";
echo "           <img src=\"macc_t/yun1.png\" alt=\"\" class=\"yun yun1\" />\n";
echo "           <img src=\"macc_t/yun2.png\" alt=\"\" class=\"yun yun2\" />\n";
echo "           <img src=\"macc_t/bird.png\" alt=\"\" class=\"bird\" />\n";
echo "           <img src=\"macc_t/san.png\" alt=\"\" class=\"san\" />\n";
echo "           <div class=\"tipInfo\">\n";
echo "               <div class=\"in\">\n";
echo "                   <div class=\"textThis\">\n";
echo "                       <h2>$message</h2>\n";
echo "                       <p><span>页面自动<a id=\"href\" href=\"#\">跳转</a></span><span>等待<b id=\"wait\">10</b>秒</span></p>\n";
echo "                       <script type=\"text/javascript\">                            (function() {\n";
echo "                               var wait = document.getElementById('wait'), href = document.getElementById('href').href;\n";
echo "                               var interval = setInterval(function() {\n";
echo "                                   var time = --wait.innerHTML;\n";
echo "                                   if (time <= 0) {\n";
echo "                                       location.href = href;\n";
echo "                                       clearInterval(interval);\n";
echo "                                   }\n";
echo "                                   ;\n";
echo "                               }, 1000);\n";
echo "                           })();\n";
echo "                       </script>\n";
echo "                   </div>\n";
echo "               </div>\n";
echo "           </div>\n";
echo "       </div>\n";
echo "   </body>\n";
echo "</html>\n";

   die;

}

if($check_info!=='0'){ // 远程检查失败的时候 本地检查

   if($domain!==$real_domain){

echo "<html lang=\"en\">\n";
echo "   <head>\n";
echo "       <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n";
echo "       <title>远程检查失败了。请联系授权提供商。</title>\n";
echo "       <link href=\"macc_t/public.css\" rel=\"stylesheet\" type=\"text/css\" />\n";
echo "       <link href=\"macc_t/index.css\" rel=\"stylesheet\" type=\"text/css\" />\n";
echo "       <link href=\"macc_t/404.css\" rel=\"stylesheet\" type=\"text/css\" />\n";
echo "       <script src=\"macc_t/jquery-1.7.2.min.js\"></script>\n";
echo "       <script type=\"text/javascript\">\n";
echo "           $(function() {\n";
echo "               var h = $(window).height();\n";
echo "               $('body').height(h);\n";
echo "               $('.mianBox').height(h);\n";
echo "               centerWindow(\".tipInfo\");\n";
echo "           });\n";
echo "            //2.将盒子方法放入这个方，方便法统一调用\n";
echo "           function centerWindow(a) {\n";
echo "               center(a);\n";
echo "               //自适应窗口\n";
echo "               $(window).bind('scroll resize',\n";
echo "                       function() {\n";
echo "                           center(a);\n";
echo "                       });\n";
echo "           }\n";
echo "            //1.居中方法，传入需要剧中的标签\n";
echo "           function center(a) {\n";
echo "               var wWidth = $(window).width();\n";
echo "               var wHeight = $(window).height();\n";
echo "               var boxWidth = $(a).width();\n";
echo "               var boxHeight = $(a).height();\n";
echo "               var scrollTop = $(window).scrollTop();\n";
echo "               var scrollLeft = $(window).scrollLeft();\n";
echo "               var top = scrollTop + (wHeight - boxHeight) / 2;\n";
echo "               var left = scrollLeft + (wWidth - boxWidth) / 2;\n";
echo "               $(a).css({\n";
echo "                   \"top\": top,\n";
echo "                   \"left\": left\n";
echo "               });\n";
echo "           }\n";
echo "       </script>\n";
echo "   </head>\n";
echo "   <body>\n";
echo "       <div class=\"mianBox\">\n";
echo "           <img src=\"macc_t/yun0.png\" alt=\"\" class=\"yun yun0\" />\n";
echo "           <img src=\"macc_t/yun1.png\" alt=\"\" class=\"yun yun1\" />\n";
echo "           <img src=\"macc_t/yun2.png\" alt=\"\" class=\"yun yun2\" />\n";
echo "           <img src=\"macc_t/bird.png\" alt=\"\" class=\"bird\" />\n";
echo "           <img src=\"macc_t/san.png\" alt=\"\" class=\"san\" />\n";
echo "           <div class=\"tipInfo\">\n";
echo "               <div class=\"in\">\n";
echo "                   <div class=\"textThis\">\n";
echo "                       <h2>远程检查失败了。请联系授权提供商。</h2>\n";
echo "                       <p><span>页面自动<a id=\"href\" href=\"#\">跳转</a></span><span>等待<b id=\"wait\">10</b>秒</span></p>\n";
echo "                       <script type=\"text/javascript\">                            (function() {\n";
echo "                               var wait = document.getElementById('wait'), href = document.getElementById('href').href;\n";
echo "                               var interval = setInterval(function() {\n";
echo "                                   var time = --wait.innerHTML;\n";
echo "                                   if (time <= 0) {\n";
echo "                                       location.href = href;\n";
echo "                                       clearInterval(interval);\n";
echo "                                   }\n";
echo "                                   ;\n";
echo "                               }, 1000);\n";
echo "                           })();\n";
echo "                       </script>\n";
echo "                   </div>\n";
echo "               </div>\n";
echo "           </div>\n";
echo "       </div>\n";
echo "   </body>\n";
echo "</html>\n";

	  die;

   }

}

        $hosturl = $_SERVER['HTTP_HOST'];
        $updatehost = 'http://www.shq.com/update.php';
        $updatehosturl = $updatehost . '?a=client_check_time&v=' . $ver . '&u=' . $hosturl;
        $domain_time = file_get_contents($updatehosturl);
        if($domain_time == '0'){
            $domain_time = '[授权版本：授权已过期，请联系客服QQ:403700890]';
        }else{
            $domain_time = '域名授权截止：(' . date("Y-m-d", $domain_time) . ')';
        }

unset($domain);

 ?>
 
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>授权成功</title>
        <link href="macc_t/public.css" rel="stylesheet" type="text/css" />
        <link href="macc_t/index.css" rel="stylesheet" type="text/css" />
        <link href="macc_t/404.css" rel="stylesheet" type="text/css" />
        <script src="macc_t/jquery-1.7.2.min.js"></script>
        <script type="text/javascript">
            $(function() {
                var h = $(window).height();
                $('body').height(h);
                $('.mianBox').height(h);
                centerWindow(".tipInfo");
            });

            //2.将盒子方法放入这个方，方便法统一调用
            function centerWindow(a) {
                center(a);
                //自适应窗口
                $(window).bind('scroll resize',
                        function() {
                            center(a);
                        });
            }

            //1.居中方法，传入需要剧中的标签
            function center(a) {
                var wWidth = $(window).width();
                var wHeight = $(window).height();
                var boxWidth = $(a).width();
                var boxHeight = $(a).height();
                var scrollTop = $(window).scrollTop();
                var scrollLeft = $(window).scrollLeft();
                var top = scrollTop + (wHeight - boxHeight) / 2;
                var left = scrollLeft + (wWidth - boxWidth) / 2;
                $(a).css({
                    "top": top,
                    "left": left
                });
            }
        </script>
    </head>
    <body>
        <div class="mianBox">
            <img src="macc_t/yun0.png" alt="" class="yun yun0" />
            <img src="macc_t/yun1.png" alt="" class="yun yun1" />
            <img src="macc_t/yun2.png" alt="" class="yun yun2" />
            <img src="macc_t/bird.png" alt="" class="bird" />
            <img src="macc_t/san.png" alt="" class="san" />
            <div class="tipInfo">
                <div class="in">
                    <div class="textThis">
                        <h2>授权成功！<p><?php echo $domain_time?></p></h2>
                        <p><span>页面自动<a id="href" href="#">跳转</a></span><span>等待<b id="wait">10</b>秒</span></p>
                        <script type="text/javascript">                            (function() {
                                var wait = document.getElementById('wait'), href = document.getElementById('href').href;
                                var interval = setInterval(function() {
                                    var time = --wait.innerHTML;
                                    if (time <= 0) {
                                        location.href = href;
                                        clearInterval(interval);
                                    }
                                    ;
                                }, 1000);
                            })();
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
