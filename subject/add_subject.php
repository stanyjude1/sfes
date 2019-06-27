<?php include('../header.php');
	if(isset($_SESSION['login_type']) && $_SESSION['login_type'] != 'admin'){
	header("Location: logout.php");
	die();
}
?>

<?php 
$success = "none";
$sb_name =  "";
$sb_author =  "";
$sb_code =  "";
$sb_class_id =  "";
$sb_teacher_id =  "";
$title = 'Add New Subject';
$button_text="Save";
$form_url = WEB_URL . "subject/add_subject.php";
$id="";
$hdnid="0";

if(isset($_POST['txtSbName'])){
	if(isset($_POST['hdn']) && $_POST['hdn'] == '0'){
	
	$sql = "INSERT INTO `tbl_add_subject`(`sb_name`,`sb_author`, `sb_code`, `sb_class_id`, `sb_teacher_id`) VALUES ('$_POST[txtSbName]','$_POST[txtSbAuthor]','$_POST[txtSbCode]','$_POST[dllClassId]','$_POST[dllTeacherId]')";
	
	mysql_query($sql,$link);
	mysql_close($link);
	$redirect_url = WEB_URL . 'subject/subject_list.php?m=i';
	header('Location: ' . $redirect_url);
	die();
	
}
else{
	
	$sql = "UPDATE `tbl_add_subject` SET `sb_name`='".$_POST['txtSbName']."',`sb_author`='".$_POST['txtSbAuthor']."',`sb_code`='".$_POST['txtSbCode']."',`sb_class_id`='".$_POST['dllClassId']."',`sb_teacher_id`='".$_POST['dllTeacherId']."' WHERE sb_id='".$_GET['id']."'";
	mysql_query($sql,$link);
	mysql_close($link);
	$redirect_url = WEB_URL . 'subject/subject_list.php?m=u&cid='.$_POST['hdnCId'];
	header('Location: ' . $redirect_url);
	die();
}

$success = "block";
}

if(isset($_GET['id']) && $_GET['id'] != ''){
	$result = mysql_query("SELECT * FROM tbl_add_subject where sb_id = '" . $_GET['id'] . "'",$link);
	while($row = mysql_fetch_array($result)){

		$sb_name = $row['sb_name'];
		$sb_author = $row['sb_author'];
		$sb_code = $row['sb_code'];
		$sb_class_id = $row['sb_class_id'];
		$sb_teacher_id = $row['sb_teacher_id'];
		$hdnid = $_GET['id'];
		$title = 'Update Subject';
		$button_text="Update";
		$form_url = WEB_URL . "subject/add_subject.php?id=".$_GET['id'];
	}
	
	//mysql_close($link);

}
	
?>

  <link type="text/css" href="<?php echo WEB_URL; ?>css/bootstrap.css" rel="stylesheet" />
  <div class="content">
    <div class="header_text_inside">
      <div class="header_text_left"><?php echo $title; ?></div>
    </div>
    <div class="main_content">
      <div class="main_content_left">
        <div><img height="200" width="200" src="<?php echo WEB_URL; ?>img/subject.png"/></div>
        <div class="my_button"><a class="btn btn_back btn-success" href="<?php echo WEB_URL; ?>dashboard.php">Dashboard</a></div>
        <div class="my_button"><a class="btn btn_back btn-success" href="<?php echo WEB_URL; ?>subject/subject_list.php">Back To Subject List</a></div>
      </div>
      <div class="frmstyle">
        <form enctype="multipart/form-data" onSubmit="return validationForm();" method="post" role="form" class="form-horizontal">
          <div class="form-group">
            <label class="col-sm-3 control-label" for="txtSbName"> Subject Name * </label>
            <div class="col-sm-6">
              <input type="text" value="<?php echo $sb_name;?>" name="txtSbName" id="txtSbName" class="form-control">
            </div>
            <span class="col-sm-4 control-label"> </span> </div>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="txtSbAuthor"> Author/Syllabus Name </label>
            <div class="col-sm-6">
              <input type="text" value="<?php echo $sb_author;?>" name="txtSbAuthor" id="txtSbAuthor" class="form-control">
            </div>
            <span class="col-sm-4 control-label"> </span> </div>
             <div class="form-group">
            <label class="col-sm-3 control-label" for="txtSbCode"> Subject Code </label>
            <div class="col-sm-6">
              <input type="text" value="<?php echo $sb_code;?>" name="txtSbCode" id="txtSbCode" class="form-control">
            </div>
            <span class="col-sm-4 control-label"> </span> </div>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="dllClassId"> Class Name * </label>
            <div class="col-sm-6">
              <select class="form-control" id="dllClassId" name="dllClassId">
               <option value="">--Select--</option>
                <?php 
				  	$result_class = mysql_query("SELECT * FROM tbl_add_class order by c_id ASC",$link);
					while($row_class = mysql_fetch_array($result_class)){
				  ?>
                <option <?php if($sb_class_id == $row_class['c_id']){echo 'selected';}?> value="<?php echo $row_class['c_id'];?>"><?php echo $row_class['c_name'];?></option>
                <?php } //mysql_close($link);?>
              </select>
            </div>
            <span class="col-sm-4 control-label"> </span> </div>
             <div class="form-group">
            <label class="col-sm-3 control-label" for="dllTeacherId"> Subject Teacher * </label>
            <div class="col-sm-6">
              <select class="form-control" id="dllTeacherId" name="dllTeacherId">
               <option value="">--Select--</option>
                <?php 
				  	$result_designation = mysql_query("SELECT * FROM tbl_add_teacher order by t_name ASC",$link);
					while($row_designation = mysql_fetch_array($result_designation)){
				  ?>
                <option <?php if($sb_teacher_id == $row_designation['teacher_id']){echo 'selected';}?> value="<?php echo $row_designation['teacher_id'];?>"><?php echo $row_designation['t_name'];?></option>
                <?php } //mysql_close($link);?>
              </select>
            </div>
            <span class="col-sm-4 control-label"> </span> </div>       
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-8">
              <input type="submit" value="<?php echo $button_text;?>" class="btn btn-success">
            </div>
          </div>
          <input type="hidden" value="<?php echo $hdnid; ?>" name="hdn"/>
		  <input type="hidden" value="<?php echo $sb_class_id; ?>" name="hdnCId"/>
        </form>
      </div>
    </div>
    <div class="bottom_area"></div>
  </div>
  
  <script type="text/javascript">
function validationForm(){
	if($("#txtSbName").val() == ''){
		alert("Subject Name is Required !!!");
		$("#txtSbName").focus();
		return false;
	}
	// else if($("#txtSbAuthor").val() == ''){
	// 	alert("Subject Author is Required !!!");
	// 	$("#txtSbAuthor").focus();
	// 	return false;
	// }
	// else if($("#txtSbCode").val() == ''){
	// 	alert("Subject Code is Required !!!");
	// 	$("#txtSbCode").focus();
	// 	return false;
	// }
	else if($("#dllClassId").val() == ''){
		alert("Class Name is Required !!!");
		$("#dllClassId").focus();
		return false;
	}
	else if($("#dllTeacherId").val() == ''){
		alert("Teacher Name is Required !!!");
		$("#dllTeacherId").focus();
		return false;
	}
	else{
		return true;
	}
}
</script>


  <?php include('../copyright.php');?>
  <?php include('../footer.php');?>
