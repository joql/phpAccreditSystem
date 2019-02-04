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
class SystemAction {

    public function main(){

        $hosturl = urlencode('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']);
        $updatehost = 'http://sq.weby.cc/update.php';
        $updatehosturl = $updatehost . '?a=client_check_time&v=' . $ver . '&u=' . $hosturl;
        $domain_time = file_get_contents($updatehosturl);
        if($domain_time == '0'){
            $domain_time = '[授权版本：授权已过期，请联系客服QQ:403700890]';
        }else{
            $domain_time = '授权版本：(美仑网高级商业版)--免费更新服务截止：(' . date("Y-m-d", $domain_time) . ')';
        }
		
    }
}
?>

<?php echo $domain_time;?>