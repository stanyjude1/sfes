<?php include('../header.php');
	if(isset($_SESSION['login_type']) && $_SESSION['login_type'] != 'admin'){
	header("Location: logout.php");
	die();
}
?>
<?php 
$p_student_class_id =  "";
$title = 'Add New Examination Date';
$button_text="Submit";

if(isset($_GET['cid'])){
	$class_id = $_GET['cid'];
}
if(isset($_GET['sid'])){
	$student_id = $_GET['sid'];
}
?>
<link type="text/css" href="<?php echo WEB_URL; ?>css/bootstrap.css" rel="stylesheet" />
<div class="content">
  <div class="header_text_inside">
    <div class="header_text_left"><?php echo $title; ?></div>
  </div>
  <div class="main_content">
    <div class="main_content_left">
      <div><img height="200" width="200" src="<?php echo WEB_URL; ?>img/student.png"/></div>
      <div class="my_button"><a class="btn btn_back btn-success" href="<?php echo WEB_URL; ?>report/report.php">Back To Report</a></div>
      <div class="my_button"><a class="btn btn_back btn-success" href="<?php echo WEB_URL; ?>dashboard.php">Dashboard</a></div>
    </div>
    <div class="frmstyle">
      <div class="form-group">
        <div class="row">
          <div class="col-sm-4">
            <select class="form-control" onchange="getStudentWithRoll(this.value);" id="dllStClassId" name="dllStClassId">
              <option value="">--Select Class--</option>
              <?php 
				  	$result_class = mysql_query("SELECT * FROM tbl_add_class order by c_id ASC",$link);
					while($row_class = mysql_fetch_array($result_class)){
				  ?>
              <option <?php if($p_student_class_id == $row_class['c_id']){echo 'selected';}?> value="<?php echo $row_class['c_id'];?>"><?php echo $row_class['c_name'];?></option>
              <?php } //mysql_close($link);?>
            </select>
          </div>
          <div class="col-sm-4">
            <select class="form-control" id="dllStNameId" name="dllStNameId">
              <option value="">--Select Name--</option>
            </select>
          </div>
          <div class="col-sm-4">
            <input type="button" onclick="getStudentInfo()" value="<?php echo $button_text;?>" class="btn btn-success">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="bottom_area"></div>
</div>
<script type="text/javascript">
	function getStudentInfo(){
		var class_id = $("#dllStClassId").val();
		var student_id = $("#dllStNameId").val();
		
		if(class_id != '' && student_id != ''){
			//window.location = "<?php //echo WEB_URL;?>report/student_info.php?cid=" + class_id + '&sid=' + student_id ;
			window.open('<?php echo WEB_URL;?>report/student_info.php?cid=' + class_id + '&sid=' + student_id , '_blank');
		}
		else{
			alert('Please select all 2 fields');
		}
	}
</script>
<?php include('../copyright.php');?>
<?php include('../footer.php');?>
