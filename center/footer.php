<!--footer start-->
    <footer class="site-footer navbar-fixed-bottom">
    <div class="text-center">
        <?php echo $showtime=date("Y");?> &copy; <?php echo $copyright?>
        <a href="#" class="go-top">
            <i class="fa fa-angle-up"></i>
        </a>
    </div>
</footer>    <!--footer end-->
</section>

<!-- js placed at the end of the document so the pages load faster -->
<script src="<?php echo $route?>js/jquery.js"></script>
<script src="<?php echo $route?>js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="<?php echo $route?>js/jquery.dcjqaccordion.2.7.js"></script>
<script src="<?php echo $route?>js/jquery.scrollTo.min.js"></script>
<script src="<?php echo $route?>js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="<?php echo $route?>js/jquery.sparkline.js" type="text/javascript"></script>
<script src="<?php echo $route?>jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
<script src="<?php echo $route?>js/owl.carousel.js" ></script>
<script src="<?php echo $route?>js/jquery.customSelect.min.js" ></script>
<script src="<?php echo $route?>js/respond.min.js" ></script>
<script src="<?php echo $route?>js/md5.js"></script>
<!--right slidebar-->
<script src="<?php echo $route?>js/slidebars.min.js"></script>

<!--common script for all pages-->
<script src="<?php echo $route?>js/common-scripts.js"></script>

<!--script for this page-->
<script src="<?php echo $route?>js/sparkline-chart.js"></script>
<script src="<?php echo $route?>js/easy-pie-chart.js"></script>
<script src="<?php echo $route?>js/count.js"></script>

<!--toastr-->
<link href="<?php echo $route?>toastr-master/toastr.css" rel="stylesheet" type="text/css" />
<script src="<?php echo $route?>toastr-master/toastr.js"></script>
<script type="text/javascript">
!function(){
	laydate.skin('molv');
	laydate({elem: '#time1'});
}();

var start = {
    elem: '#start',
    format: 'YYYY-MM-DD',
    min: laydate.now(), 
    max: '2099-06-16', 
    istime: true,
    istoday: false,
    choose: function(datas){
         end.min = datas; 
         end.start = datas 
    }
};
</script>
</body>
</html>