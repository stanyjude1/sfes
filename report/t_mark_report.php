<?php include('../header.php');
	if(isset($_SESSION['login_type']) && $_SESSION['login_type'] != 'teacher'){
	header("Location: logout.php");
	die();
}
?>
<?php 
$es_term_id =  "";
$es_class_id = "";
$es_subject_id = "";
$title = 'Student Mark Report';
$button_text="Submit";

if(isset($_GET['cid'])){
	$class_id = $_GET['cid'];
}
if(isset($_GET['eid'])){
	$exam_id = $_GET['eid'];
}

if(isset($_GET['sbid'])){
	$subject_id = $_GET['sbid'];
}

?>
<link type="text/css" href="<?php echo WEB_URL; ?>css/bootstrap.css" rel="stylesheet" />
<div class="content">
  <div class="header_text_inside">
    <div class="header_text_left"><?php echo $title; ?></div>
  </div>
  <div class="main_content">
    <div class="main_content_left">
      <div><img height="200" width="200" src="<?php echo WEB_URL; ?>img/mark.png"/></div>
      <div class="my_button"><a class="btn btn_back btn-success" href="<?php echo WEB_URL; ?>report/t_report.php">Back To Report</a></div>
      <div class="my_button"><a class="btn btn_back btn-success" href="<?php echo WEB_URL; ?>t_dashboard.php">Dashboard</a></div>
    </div>
    <div class="frmstyle">
        <div class="form-group">
          <div class="col-sm-12">
            <select class="form-control" id="txtESId" name="txtESId">
              <option value="">--Select Schedule--</option>
              <?php 
				  	$result_term = mysql_query("SELECT * FROM tbl_schedule_setup order by schedule_id ASC",$link);
					while($row_term = mysql_fetch_array($result_term)){
				  ?>
              <option <?php if($es_term_id == $row_term['schedule_id']){echo 'selected';}?> value="<?php echo $row_term['schedule_id'];?>"><?php echo $row_term['schedule_name'];?></option>
              <?php } //mysql_close($link);?>
            </select>
          </div>
        </div>
		<div class="form-group">&nbsp;</div>
        <div class="form-group">
          <div class="col-sm-12">
            <select class="form-control" id="dllESClassId" onChange="getSubject(this.value);" name="dllESClassId">
              <option value="">--Select Class--</option>
              <?php 
				  	$result_class = mysql_query("SELECT * FROM tbl_add_class order by c_id ASC",$link);
					while($row_class = mysql_fetch_array($result_class)){
				  ?>
              <option <?php if($es_class_id == $row_class['c_id']){echo 'selected';}?> value="<?php echo $row_class['c_id'];?>"><?php echo $row_class['c_name'];?></option>
              <?php } //mysql_close($link);?>
            </select>
          </div>
        </div>
		<div class="form-group">&nbsp;</div>
        <div class="form-group">
          <div class="col-sm-12">
            <select class="form-control" id="dllESSubjectId" name="dllESSubjectId">
              <option value="">--Select Subject--</option>
              <?php 
				  	$result_class = mysql_query("SELECT * FROM tbl_add_subject order by sb_id ASC",$link);
					while($row_class = mysql_fetch_array($result_class)){
				  ?>
              <option <?php if($es_subject_id == $row_class['sb_id']){echo 'selected';}?> value="<?php echo $row_class['sb_id'];?>"><?php echo $row_class['sb_name'];?></option>
              <?php } //mysql_close($link);?>
            </select>
          </div>
        </div>
		<div class="form-group">&nbsp;</div>
        <div class="form-group">
          <div class="col-sm-12">
            <input type="button" onclick="getMarkInfo()" value="<?php echo $button_text;?>" class="btn btn-success">
          </div>
      </div>
    </div>
  </div>
</div>
<div class="bottom_area"></div>
</div>
<script type="text/javascript">
	function getMarkInfo(){
		var class_id = $("#dllESClassId").val();
		var exam_id = $("#txtESId").val();
		var subject_id = $("#dllESSubjectId").val();
		
		if(class_id != '' && exam_id != '' && subject_id != ''){
			//window.location = "<?php //echo WEB_URL;?>report/mark_info.php?cid=" + class_id + '&eid=' + exam_id + '&sbid=' + subject_id;
			window.open('<?php echo WEB_URL;?>report/t_mark_info.php?cid=' + class_id + '&eid=' + exam_id + '&sbid=' + subject_id,'_blank');
		}
		else{
			alert('Please select all 3 fields');
		}
	}
</script>
<?php include('../copyright.php');?>
<?php include('../footer.php');?>
