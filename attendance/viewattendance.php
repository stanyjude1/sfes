<?php include('../header.php');
	if(isset($_SESSION['login_type']) && $_SESSION['login_type'] != 'admin'){
	header("Location: logout.php");
	die();
}
?>

<link type="text/css" href="<?php echo WEB_URL; ?>css/bootstrap.css" rel="stylesheet" />
  <div class="content content_inside">
    <div class="header_text">
      <div class="header_text_left">Attendance List</div>
      <!--<div class="header_text_right"><a class="btn btn_add_new btn-success" href="<?php echo WEB_URL; ?>student/add_student.php"><i class="fa fa-plus"></i>&nbsp;Add Student</a></div>-->
      
      <div class="top_common_bar">
      	<div class="obj_left">
        	<select onChange="getClassData(this.value,'viewattendance');" class="form-control" name="ddlClass">
            <option value="-1">--Select Class--</option>
			<?php
            	$result_class = mysql_query("Select * from tbl_add_class order by c_id asc",$link);
				while($row_class = mysql_fetch_array($result_class)){?>
                	<option <?php if(isset($_GET['cid']) && $_GET['cid'] == $row_class['c_id']){echo 'selected';}?> value="<?php echo $row_class['c_id'];?>"><?php echo $row_class['c_name'];?></option>
                <?php } ?>
            </select>	
        </div>
        <div class="obj_right">
        	<a class="btn btn_add_new btn-success" href="<?php echo WEB_URL; ?>Attendance/addattendance.php"><i class="fa fa-plus"></i>&nbsp;Add Attendance</a>&nbsp;<a class="btn btn_add_new btn-success" href="<?php echo WEB_URL; ?>dashboard.php"><i class="fa"></i>Dashboard</a></div>
        </div>
      </div>
    <div style="clear:both;"></div>
   <!-- <div id="msg_boxx" style="display:<?php echo $token; ?>; color:#C00" role="alert" class="alert alert-success"><strong>Success!</strong> <?php //echo $msg; ?></div>-->
    <div class="list" style="width:100%; height:480px; overflow:auto;">
      <table class="table sakotable table-bordered table-striped dt-responsive">
	  <thead>
        <tr>
          <th>Image</th>
          <th>Name</th>
          <th>Email</th>
          <th>Contact</th>
          <th>Class Name</th>
          <th>Address</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
		
		//Select *,c.c_name from tbl_add_student s INNER JOIN tbl_add_class c on c_id=s_class_id where s_class_id = '" . $_GET['cid'] . "' order by s_id desc
				$result = '';
				$date = date("m/d/Y");
				if(isset($_GET['cid']) && $_GET['cid'] != ''){
					$result = mysql_query("Select s.s_roll_no,s.s_name,s.s_email,s.s_contact,s.s_id,c.c_name,s.s_image,s.s_address from tbl_add_student s INNER JOIN tbl_add_class c on c.c_id=s.s_class_id where s.s_class_id = '".(int)$_GET['cid']."' order by s.s_id desc",$link);
				}
				else{
					$result = mysql_query("Select * from tbl_add_student where s_class_id = '-1' order by s_id desc",$link);
				}
				while($row = mysql_fetch_array($result)){
					
				$s_image = WEB_URL . 'img/no_image.jpg';	
		if(file_exists(ROOT_PATH . '/img/upload/' . $row['s_image']) && $row['s_image'] != ''){
			$s_image = WEB_URL . 'img/upload/' . $row['s_image'];
		}
					
					
					$mval = date('m');
					if($mval<10){
						$mval = str_replace('0','',$mval);
					}
					 ?>
        <tr>
          <td><img class="photo_img_round" style="width:50px;height:50px;" src="<?php echo $s_image;  ?>" /></td>
          <td><?php echo $row['s_name']; ?></td>
          <td><?php echo $row['s_email']; ?></td>
          <td><?php echo $row['s_contact']; ?></td>
          <td><?php echo $row['c_name']; ?></td>
          <td><?php echo $row['s_address']; ?></td>
          <td><a data-toggle="tooltip" data-placement="top" title="View Attendance" class="btn btn-success btn-xs mrg" href="<?php echo WEB_URL;?>attendance/attendance_details.php?sid=<?php echo $row['s_id']; ?>&cid=<?php echo $_GET['cid']; ?>&mval=<?php echo $mval ; ?>"><i class="fa fa-eye"></i></a></td>
        </tr>
        <?php } mysql_close($link); ?>
		</tbody>
      </table>
    </div>
  </div>
  <?php include('../copyright.php');?>
</div>
<?php include('../footer.php');?>
