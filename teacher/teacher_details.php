<?php include('../header.php');
	if(isset($_SESSION['login_type']) && $_SESSION['login_type'] != 'admin'){
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
$result = mysql_query("Select * from tbl_add_teacher where teacher_id='".$_GET['id']."'",$link);
while($row = mysql_fetch_array($result)){
$t_photo = WEB_URL . 'img/no_image.jpg';	
if(file_exists(ROOT_PATH . '/img/upload/' . $row['t_photo']) && $row['t_photo'] != ''){
$t_photo = WEB_URL . 'img/upload/' . $row['t_photo'];
}
  
?>
      <div align="center" style="width:100%;"><img class="img_ratio img-circle" src="<?php echo $t_photo;  ?>"></div>
      <div class="details_top_text"><?php echo $row['t_name']; ?></div>
      <p><?php echo $row['t_designation']; ?></p>
      <?php } ?>
    </div>
    <div style="padding:10px;">
      <?php
    $result = mysql_query("Select * from tbl_add_teacher where teacher_id='".$_GET['id']."'",$link);
	while($row = mysql_fetch_array($result)){?>
      <div class="row">
        <div class="col-md-6">
          <table class="table">
            <tr>
              <td>Email:</td>
              <td><?php echo $row['t_email'];?></td>
            </tr>
            <tr>
              <td>Phone:</td>
              <td><?php echo $row['t_phone'];?></td>
            </tr>
            <tr>
              <td>Address:</td>
              <td><?php echo $row['t_address'];?></td>
            </tr>
            <tr>
              <td>Date of Birth :</td>
              <td><?php echo $row['t_dob'];?></td>
            </tr>
          </table>
        </div>
        <div class="col-md-6">
          <table class="table">
            <tr>
              <td>Joining Date:</td>
              <td><?php echo $row['t_joining_date'];?></td>
            </tr>
            <tr>
              <td>Gender:</td>
              <td><?php echo $row['t_gender'];?></td>
            </tr>
            <tr>
              <td>Religion:</td>
              <td><?php echo $row['t_religion'];?></td>
            </tr>
            <tr>
              <td>Username:</td>
              <td><?php echo $row['t_username'];?></td>
            </tr>
          </table>
        </div>
      </div>
      <?php }  //mysql_query($link);?>
    </div>
  </div>
  <div style="padding:10px;" align="center"><a class="btn btn_add_new btn-success" href="<?php echo WEB_URL; ?>teacher/add_teacher.php"><i class="fa fa-plus"></i>&nbsp;Add Teacher</a>&nbsp;&nbsp;<a class="btn btn_add_new btn-success" href="<?php echo WEB_URL; ?>teacher/teacher_list.php"><i class="fa fa-list"></i>&nbsp;Teacher List</a>&nbsp;&nbsp;<a class="btn btn_add_new btn-success" href="<?php echo WEB_URL; ?>dashboard.php"><i class="fa fa-home"></i>&nbsp;Dashboard</a>&nbsp;&nbsp;<a class="btn btn_add_new btn-success" onclick="printContent('print_area','Teacher Information')" href="javascript:;"><i class="fa fa-print"></i>&nbsp;Print</a></div>
</div>
<?php include('../copyright.php');?>
<?php include('../footer.php');?>
