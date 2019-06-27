<?php include('../header.php');
	if(isset($_SESSION['login_type']) && $_SESSION['login_type'] != 'admin'){
	header("Location: logout.php");
	die();
}
?>

<?php 
$success = "none";
$e_name =  0;
$e_month = "";
$e_pay_date = "";
$e_amount = "";
$title = 'Add Student Mark';
$button_text="Add Mark";
$id="";
$hdnid="0";
$sf_class_id = 0;
$s_id = 0;
$form_show = 'none';

if(isset($_GET['eid'])){
	$e_name = $_GET['eid'];
	$form_show = 'block';
}
if(isset($_GET['cid'])){
	$sf_class_id = $_GET['cid'];
}
if(isset($_GET['sid'])){
	$s_id = $_GET['sid'];
}
?>
<link type="text/css" href="<?php echo WEB_URL; ?>css/bootstrap.css" rel="stylesheet" />
<div class="content">
  <div class="header_text_inside">
    <div class="header_text_left"><?php echo $title; ?></div>
  </div>
  <div class="main_content">
    <div class="main_content_left">
      <div><img height="200" width="200" src="<?php echo WEB_URL; ?>img/charge.png"/></div>
      <div class="my_button"><a class="btn btn_back btn-success" href="<?php echo WEB_URL; ?>mark/mark.php">Mark</a></div>
      <div class="my_button"><a class="btn btn_back btn-success" href="<?php echo WEB_URL; ?>mark/viewmark.php">View Mark</a></div>
    </div>
    <form id="frmAddMark" action="../ajax/addStudentMark.php" method="post">
      <div class="frmstyle">
        <div  class="form-horizontal">
          <div class="form-group">
            <label class="col-sm-2 control-label" for="dllEmNameId"> Exam </label>
            <div class="col-sm-6">
              <select class="form-control" id="ddlExam" name="ddlExam">
                <option value="">--Select--</option>
                <?php 
				  	$result_class = mysql_query("SELECT * FROM tbl_schedule_setup order by schedule_name ASC",$link);
					while($row_class = mysql_fetch_array($result_class)){
				  ?>
                <option <?php if($e_name == $row_class['schedule_id']){echo 'selected';}?> value="<?php echo $row_class['schedule_id'];?>"><?php echo $row_class['schedule_name'];?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="dllStClassId"> Class </label>
            <div class="col-sm-6">
              <select class="form-control" onchange="getSubject(this.value);" id="dllStClassId" name="dllStClassId">
                <option value="">--Select--</option>
                <?php 
				  	$result_class = mysql_query("SELECT * FROM tbl_add_class order by c_id ASC",$link);
					while($row_class = mysql_fetch_array($result_class)){
				  ?>
                <option <?php if($sf_class_id == $row_class['c_id']){echo 'selected';}?> value="<?php echo $row_class['c_id'];?>"><?php echo $row_class['c_name'];?></option>
                <?php } //mysql_close($link);?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="dllESSubjectId"> Subject </label>
            <div class="col-sm-6">
              <select class="form-control" id="dllESSubjectId" name="dllESSubjectId">
                <option value="">--Select--</option>
                <?php 
				  	if($s_id != 0){
					$result_class = mysql_query("SELECT * from tbl_add_subject where sb_class_id = '" . (int)$sf_class_id . "' order by sb_name asc",$link);
					while($row_class = mysql_fetch_array($result_class)){
				 ?>
                <option <?php if($s_id == $row_class['sb_id']){echo 'selected';}?> value="<?php echo $row_class['sb_id'];?>"><?php echo $row_class['sb_name'];?></option>
                <?php } } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-8">
              <input type="button" onclick="getStudentInfoByMark();" value="<?php echo $button_text;?>" class="btn btn-success">
            </div>
          </div>
          <input type="hidden" value="<?php echo $hdnid; ?>" name="hdn"/>
        </div>
        <div style="display:<?php echo $form_show; ?>;">
          <table class="table common_sakotable table-bordered table-striped dt-responsive">
            <thead>
              <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Add Mark</th>
              </tr>
            </thead>
            <tbody>
              <?php
				$result = '';
				if(isset($_GET['cid']) && $_GET['cid'] != ''){
					$result = mysql_query("Select *,c.c_name from tbl_add_student s INNER JOIN tbl_add_class c on c_id=s_class_id where s_class_id = '" . $_GET['cid'] . "' order by s_id desc",$link);
				}
				else{
					$result = mysql_query("Select * from tbl_add_student where s_class_id = '-1' order by s_id desc",$link);
				}
				while($row = mysql_fetch_array($result)){
					$s_image = WEB_URL . 'img/no_image.jpg';	
					if(file_exists(ROOT_PATH . '/img/upload/' . $row['s_image']) && $row['s_image'] != ''){
						$s_image = WEB_URL . 'img/upload/' . $row['s_image'];
					}
			 ?>
              <tr>
                <td><img class="photo_img_round" style="width:50px;height:50px;" src="<?php echo $s_image;  ?>" /></td>
                <td><?php echo $row['s_name']; ?></td>
                <td><?php echo $row['s_email']; ?></td>
                <td><?php echo $row['s_contact']; ?></td>
                <td><input type="text" size="10" id="txt_<?php echo $row['s_id']; ?>" value="0" style="text-align:center" name="mark[<?php echo $row['s_id']; ?>]" /></td>
              </tr>
              <?php } mysql_close($link); ?>
            </tbody>
          </table>
        </div>
        <br/>
        <div class="row" style="display:<?php echo $form_show; ?>;">
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-8">
              <input type="button" class="btn btn-success" style="width:400px;" value="Sumit Mark" onclick="submitStudentMark();">
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
  <div class="bottom_area"></div>
</div>
<script type="text/javascript">
	function getStudentInfoByMark(){
		var exam_id = $("#ddlExam").val();
		var class_id = $("#dllStClassId").val();
		var subject = $("#dllESSubjectId").val();
		
		if(exam_id != '' && class_id != '' && subject != ''){
			window.location = "<?php echo WEB_URL;?>mark/addmark.php?eid=" + exam_id + '&cid=' + class_id + '&sid=' + subject;
		}
		else{
			alert('Please select all 3 fields');
		}
	}
	function submitStudentMark(){
		$("#frmAddMark").submit();
	}
	
	$("#frmAddMark").submit(function(e)
	{
		var postData = $(this).serializeArray();
		var formURL = $(this).attr("action");
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			success:function(data, textStatus, jqXHR) 
			{
				alert(data);
				//data: return data from server
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				//if fails      
			}
		});
		e.preventDefault(); //STOP default action
	});
	
</script>
<?php include('../copyright.php');?>
<?php include('../footer.php');?>
