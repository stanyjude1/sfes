<?php include('../header.php');include('../sako/common.php');
if(isset($_SESSION['login_type']) && $_SESSION['login_type'] != 'teacher'){
	header("Location: logout.php");
	die();
}
?>
<link type="text/css" href="<?php echo WEB_URL; ?>css/bootstrap.css" rel="stylesheet" />
<div class="content">
  <div id="print_area">
    <div class="bio-graph-heading">
      <?php
 
$id = '';
   $result = mysql_query("Select sm.class_id,sm.subject_id,sm.student_id,sm.marks,sm.exam_id,s.s_name,s.s_id,s.s_email,s.s_contact,s.s_dob,s.s_address,c.c_name,s.s_roll_no,s.s_gender,s.s_religion,s.s_profile_name,s.s_image from tbl_student_marks sm inner join tbl_add_student s on sm.student_id = s.s_id inner join tbl_add_class c on sm.class_id = c.c_id where sm.student_id='".$_GET['sid']."'",$link);

if($row = mysql_fetch_array($result)){
$s_image = WEB_URL . 'img/no_image.jpg';	
if(file_exists(ROOT_PATH . '/img/upload/' . $row['s_image']) && $row['s_image'] != ''){
$s_image = WEB_URL . 'img/upload/' . $row['s_image'];
}
  
?>
      <div align="center" style="width:100%;"><img class="img_ratio img-circle" src="<?php echo $s_image;  ?>"></div>
      <div class="details_top_text"><?php echo $row['s_name']; ?></div>
      <p><?php echo $row['c_name']; ?></p>
      <?php } ?>
    </div>
    <div style="padding:10px;">
      <h3 class="top_text_title_style">Student's Information :</h3>
      <?php
    $result = mysql_query("Select sm.class_id,sm.subject_id,sm.student_id,sm.marks,sm.exam_id,s.s_name,s.s_id,s.s_email,s.s_contact,s.s_dob,s.s_address,c.c_name,s.s_roll_no,s.s_gender,s.s_religion,s.s_profile_name,s.s_image,p.p_father_name from tbl_student_marks sm inner join tbl_add_student s on sm.student_id = s.s_id inner join tbl_add_class c on sm.class_id = c.c_id inner join tbl_add_parent p on p.p_id = s.parent_id where sm.student_id='".$_GET['sid']."'",$link);

	if($row = mysql_fetch_array($result)){?>
      <div style="font-size:13px;text-align:left;" class="row">
        <div class="col-md-6">
          <table class="table">
            <tr>
              <td><strong>Father's Name:</strong></td>
              <td><?php echo $row['p_father_name'];?></td>
            </tr>
            <tr>
              <td><strong>Email:</strong></td>
              <td><?php echo $row['s_email'];?></td>
            </tr>
            <tr>
              <td><strong>Phone:</strong></td>
              <td><?php echo $row['s_contact'];?></td>
            </tr>
            <tr>
              <td><strong>Address:</strong></td>
              <td><?php echo $row['s_address'];?></td>
            </tr>
            <tr>
              <td><strong>Date of Birth:</strong></td>
              <td><?php echo $row['s_dob'];?></td>
            </tr>
          </table>
        </div>
        <div class="col-md-6">
          <table class="table">
            <tr>
              <td><strong>Class Name:</strong></td>
              <td><?php echo $row['c_name'];?></td>
            </tr>
            <tr>
              <td><strong>Roll No:</strong></td>
              <td><?php echo $row['s_roll_no'];?></td>
            </tr>
            <tr>
              <td><strong>Gender:</strong></td>
              <td><?php echo $row['s_gender'];?></td>
            </tr>
            <tr>
              <td><strong>Religion:</strong></td>
              <td><?php echo $row['s_religion'];?></td>
            </tr>
            <tr>
              <td><strong>Profile Name:</strong></td>
              <td><?php echo $row['s_profile_name'];?></td>
            </tr>
          </table>
        </div>
        <?php }  //mysql_query($link);?>
      </div>
    </div>
    <div style="padding:10px;">
      <h4 class="top_text_title_style">First Terminal Examination Mark Sheet</h4>
      <div style="margin:10px;">
        <table class="table common_sakotable table-bordered table-striped dt-responsive">
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
              <td><?php echo $g_name ?></td>
              <td><?php echo $g_point; ?></td>
            </tr>
            <?php } //mysql_close($link); ?>
          </tbody>
        </table>
      </div>
    </div>
    <div style="padding:10px;">
      <h4 class="top_text_title_style">Second Terminal Examination Mark Sheet</h4>
      <div style="margin:10px;">
        <table class="table common_sakotable table-bordered table-striped dt-responsive">
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
              <td><?php echo $g_name ?></td>
              <td><?php echo $g_point; ?></td>
            </tr>
            <?php } //mysql_close($link); ?>
          </tbody>
        </table>
      </div>
    </div>
    <div style="padding:10px;">
      <h4 class="top_text_title_style">Final Examination Mark Sheet</h4>
      <div style="margin:10px;">
        <table class="table common_sakotable table-bordered table-striped dt-responsive">
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
              <td><?php echo $g_name ?></td>
              <td><?php echo $g_point; ?></td>
            </tr>
            <?php } mysql_close($link); ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div style="padding:10px;" align="center"><a class="btn btn_add_new btn-success" href="<?php echo WEB_URL; ?>mark/t_addmark.php"><i class="fa fa-plus"></i>&nbsp;Add Mark</a>&nbsp;&nbsp;<a class="btn btn_add_new btn-success" href="<?php echo WEB_URL; ?>mark/t_viewmark.php?cid=<?php echo $_GET['cid']; ?>"><i class="fa fa-list"></i>&nbsp;Mark List</a>&nbsp;&nbsp;<a class="btn btn_add_new btn-success" href="<?php echo WEB_URL; ?>t_dashboard.php"><i class="fa fa-home"></i>&nbsp;Dashboard</a></div>
</div>
<?php include('../copyright.php');?>
<?php include('../footer.php');?>
