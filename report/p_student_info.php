<?php 
include('../header.php');
if(isset($_SESSION['login_type']) && $_SESSION['login_type'] != 'parents'){
	header("Location:logout.php");
	die();
}
$school_image = '';
$school_name = '';
$result_s_arr = mysql_query("Select * from tbl_add_school",$link);
if($row_arr = mysql_fetch_array($result_s_arr)){
	$school_image = WEB_URL . 'img/upload/' . $row_arr['s_image'];
	$school_name = $row_arr['st_title'];
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title>Student Information</title>
<link type="text/css" href="<?php echo WEB_URL; ?>css/bootstrap.css" rel="stylesheet" />
<style type="text/css">
.btn_save {
	background: #3498db;
	background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
	background-image: -moz-linear-gradient(top, #3498db, #2980b9);
	background-image: -ms-linear-gradient(top, #3498db, #2980b9);
	background-image: -o-linear-gradient(top, #3498db, #2980b9);
	background-image: linear-gradient(to bottom, #3498db, #2980b9);
	-webkit-border-radius: 28;
	-moz-border-radius: 28;
	border-radius: 28px;
	font-family: Georgia;
	color: white;
	font-weight:bold;
	font-size: 15px;
	padding: 5px 20px 5px 20px;
	text-decoration: none;
}
.btn_save :hover {
	background: #3cb0fd;
	background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
	background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
	background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
	background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
	background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
	text-decoration: none;
}
table.gridtable {
	font-family: verdana,arial,sans-serif;
	font-size:14px;
	color:#333333;
	border-width: 1px;
	border-color: #666666;
	border-collapse: collapse;
}
table.gridtable th {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	/*background-color: #dedede;*/
}
table.gridtable td {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	background-color: #ffffff;
}
</style>
</head>
<body>
<div>
<div align="center" style="margin:50px;">
  <div align="right"> <a class="btn_save" onClick="javascript:window.print();">Print</a> </div>
  <div>
    <input type="hidden" id="web_url" value="<?php echo WEB_URL; ?>" />
    <?php if($school_image != '') {?>
    <!--<img style="width:200px;height:200px; margin:0 auto" src="img/logo.png"/>-->
    <img style="width:200px;height:200px;" src="<?php echo $school_image; ?>" />
    <p style="font-family:Georgia, 'Times New Roman', Times, serif; color:red; font-style:italic; font-size:20px;"><?php echo $school_name; ?></p>
    <?php }?>
  </div>
  <div style="margin:20px;"></div>
  <div align="left">
    <?php
 
$id = '';
   $result = mysql_query("Select sm.class_id,s.s_name,s.s_id,c.c_name,s.s_image from tbl_student_marks sm inner join tbl_add_student s on sm.student_id = s.s_id inner join tbl_add_class c on sm.class_id = c.c_id where sm.student_id='".$_GET['sid']."'",$link);

if($row = mysql_fetch_array($result)){
$s_image = WEB_URL . 'img/no_image.jpg';	
if(file_exists(ROOT_PATH . '/img/upload/' . $row['s_image']) && $row['s_image'] != ''){
$s_image = WEB_URL . 'img/upload/' . $row['s_image'];
}
  
?>
    <img style="width:100px;height:100px; margin:0 auto" src="<?php echo $s_image;  ?>" /></div>
  <?php } ?>
  <div>
    <div style="font-family:Georgia, 'Times New Roman', Times, serif; font-style:italic; font-size:18px; font-weight:bold; color:red; text-align:left; margin-top:20px; margin-bottom:20px;">Personal Information:</div>
    <div align="left" style="width:100%; margin-bottom:30px;">
      <?php
    $result = mysql_query("Select sm.class_id,sm.subject_id,sm.student_id,sm.marks,sm.exam_id,s.s_name,s.s_id,s.s_email,s.s_contact,s.s_dob,s.s_address,c.c_name,s.s_roll_no,s.s_gender,s.s_religion,s.s_profile_name,s.s_image,p.p_father_name from tbl_student_marks sm inner join tbl_add_student s on sm.student_id = s.s_id inner join tbl_add_class c on sm.class_id = c.c_id inner join tbl_add_parent p on p.p_id = s.parent_id where sm.student_id='".$_GET['sid']."'",$link);

	if($row = mysql_fetch_array($result)){?>
      <table class="gridtable" align="left"  style="width:100%">
        <tr>
          <td style="font-weight:bold;">Name :</td>
          <td><?php echo $row['s_name']; ?></td>
        </tr>
        <tr>
          <td style="font-weight:bold;">Father's Name :</td>
          <td><?php echo $row['p_father_name']; ?></td>
        </tr>
        <tr>
          <td style="font-weight:bold;">Email :</td>
          <td><?php echo $row['s_email']; ?></td>
        </tr>
        <tr>
          <td style="font-weight:bold;">Contact :</td>
          <td><?php echo $row['s_contact']; ?></td>
        </tr>
        <tr>
          <td style="font-weight:bold;">Address :</td>
          <td><?php echo $row['s_address']; ?></td>
        </tr>
        <tr>
          <td style="font-weight:bold;">Date Of Birth :</td>
          <td><?php echo $row['s_dob']; ?></td>
        </tr>
		<tr>
          <td style="font-weight:bold;">Gender :</td>
          <td><?php echo $row['s_gender']; ?></td>
        </tr>
		 <tr>
          <td style="font-weight:bold;">Religion :</td>
          <td><?php echo $row['s_religion']; ?></td>
        </tr>
        <tr>
          <td style="font-weight:bold;">Class :</td>
          <td><?php echo $row['c_name']; ?></td>
        </tr>
        <tr>
          <td style="font-weight:bold;">Roll NO :</td>
          <td><?php echo $row['s_roll_no']; ?></td>
        </tr>
        <tr>
          <td style="font-weight:bold;">Profile Name :</td>
          <td><?php echo $row['s_profile_name']; ?></td>
        </tr>
        <?php }?>
      </table>
    </div>
  </div>
  <div style="clear:both;"></div>
  <br/>
  <div>
    <div align="center" style="margin-top:20px; margin-bottom:20px; color:olive; font-weight:bold; font-size:18px;">FIRST TERM EXM HISTORY</div>
    <div align="left" style="width:100%; margin-bottom:30px;">
      <table class="gridtable" align="left"  style="width:100%">
        <thead>
          <tr>
            <th>Subject</th>
            <th>Mark</th>
            <th>Grade</th>
            <th>Point</th>
          </tr>
        </thead>
        <tbody>
          <?php
		$id = '';
		$result = mysql_query("Select sm.class_id,sm.subject_id,sm.student_id,sm.marks,sm.exam_id,s.sb_name from tbl_student_marks sm inner join tbl_add_subject s on sm.subject_id = s.sb_id  where sm.student_id='".$_GET['sid']."' and sm.class_id='".$_GET['cid']."' and sm.exam_id='".(int)TERM_1."'",$link);
		while($row = mysql_fetch_array($result)){
		 $g_name = '';
		 $g_point = '0.00';
		 $gp = getStudentGrade($row['marks'],$link);
		 if($gp != ''){
		 	$s1 = explode('|',$gp);
			$g_name = $s1[0];
			$g_point = $s1[1];
		 }
		?>
          <tr>
            <td><?php echo $row['sb_name']; ?></td>
            <td><?php echo $row['marks']; ?></td>
            <td><?php echo $g_name;?></td>
            <td><?php echo $g_point; ?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
  <div style="clear:both;"></div>
  <br/>
  <div>
    <div align="center" style="margin-top:20px; margin-bottom:20px; color:olive; font-weight:bold; font-size:18px;">SECOND TERM EXM HISTORY</div>
    <div align="left" style="width:100%; margin-bottom:30px;">
      <table class="gridtable" align="left"  style="width:100%">
        <thead>
          <tr>
            <th>Subject</th>
            <th>Mark</th>
            <th>Grade</th>
            <th>Point</th>
          </tr>
        </thead>
        <tbody>
          <?php
		$id = '';
		$result = mysql_query("Select sm.class_id,sm.subject_id,sm.student_id,sm.marks,sm.exam_id,s.sb_name from tbl_student_marks sm inner join tbl_add_subject s on sm.subject_id = s.sb_id  where sm.student_id='".$_GET['sid']."' and sm.class_id='".$_GET['cid']."' and sm.exam_id='".(int)TERM_2."'",$link);
				while($row = mysql_fetch_array($result)){
				 $g_name = '';
		 $g_point = '0.00';
		 $gp = getStudentGrade($row['marks'],$link);
		 if($gp != ''){
		 	$s1 = explode('|',$gp);
			$g_name = $s1[0];
			$g_point = $s1[1];
		 }
				?>
          <tr>
            <td><?php echo $row['sb_name']; ?></td>
            <td><?php echo $row['marks']; ?></td>
            <td><?php echo $g_name ;?></td>
            <td><?php echo $g_point; ?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
  <div style="clear:both;"></div>
  <br/>
  <div>
    <div align="center" style="margin-top:20px; margin-bottom:20px; color:olive; font-weight:bold; font-size:18px;">FINAL TERM EXM HISTORY</div>
    <div align="left" style="width:100%; margin-bottom:30px;">
      <table class="gridtable" align="left" style="width:100%">
        <thead>
          <tr>
            <th>Subject</th>
            <th>Mark</th>
            <th>Grade</th>
            <th>Point</th>
          </tr>
        </thead>
        <tbody>
          <?php
		$id = '';
		$result = mysql_query("Select sm.class_id,sm.subject_id,sm.student_id,sm.marks,sm.exam_id,s.sb_name from tbl_student_marks sm inner join tbl_add_subject s on sm.subject_id = s.sb_id  where sm.student_id='".$_GET['sid']."' and sm.class_id='".$_GET['cid']."' and sm.exam_id='".(int)TERM_3."'",$link);
				while($row = mysql_fetch_array($result)){
				 $g_name = '';
		 $g_point = '0.00';
		 $gp = getStudentGrade($row['marks'],$link);
		 if($gp != ''){
		 	$s1 = explode('|',$gp);
			$g_name = $s1[0];
			$g_point = $s1[1];
		 }
				?>
          <tr>
            <td><?php echo $row['sb_name']; ?></td>
            <td><?php echo $row['marks']; ?></td>
            <td><?php echo $g_name ;?></td>
            <td><?php echo $g_point; ?></td>
          </tr>
          <?php } mysql_close($link); ?>
        </tbody>
      </table>
    </div>
  </div>
  <div style="clear:both"></div>
</div>
</body>
</html>
