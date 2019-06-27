<?php include('../header.php');
	if(isset($_SESSION['login_type']) && $_SESSION['login_type'] != 'admin'){
	header("Location: logout.php");
	die();
}
?>

<link type="text/css" href="<?php echo WEB_URL; ?>css/bootstrap.css" rel="stylesheet" />
  <div class="content">
    <div class="header_text">Welcome To Exam. Dashboard</div>
    <div class="top_common_bar">
        <div class="obj_right" style="padding-right:10px !important;">
        	<a class="btn btn_add_new btn-success" href="<?php echo WEB_URL; ?>dashboard.php"><i class="fa"></i>Dashboard</a></div>
        </div>
    <div style="clear:both;"></div>
    <div align="center" style="width:88%;margin:0 auto;padding:0;">
    <div class="link_box">
        <div class="link_box_img dashboard_image"><a href="<?php echo WEB_URL; ?>examination/exam_date.php"><img height="80" width="80" src="<?php echo WEB_URL; ?>img/add_exm.png"></a></div>
        <div class="link_box_text">Add Exam.</div>
      </div>
      <div class="link_box">
        <div class="link_box_img dashboard_image"><a href="<?php echo WEB_URL; ?>examination/exam_schedule.php"><img height="80" width="80" src="<?php echo WEB_URL; ?>img/add_routine.png"></a></div>
        <div class="link_box_text">Add Schedule</div>
      </div>
      <div class="link_box">
        <div class="link_box_img dashboard_image"><a href="<?php echo WEB_URL; ?>examination/exam_date_list.php"><img height="80" width="80" src="<?php echo WEB_URL; ?>img/date.png"></a></div>
        <div class="link_box_text">Exam. Date</div>
      </div>
      <div class="link_box">
        <div class="link_box_img dashboard_image"><a href="<?php echo WEB_URL; ?>examination/exam_schedule_list.php"><img height="80" width="80" src="<?php echo WEB_URL; ?>img/schedule.png"></a></div>
        <div class="link_box_text">Exam. Schedule</div>
      </div>
      <div style="clear:both"></div>
    </div>
    <br/><br/>
  </div>
  <br/>
  <?php include('../copyright.php');?>
  <?php include('../footer.php');?>
