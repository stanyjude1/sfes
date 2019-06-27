<?php include('../header.php');
if(isset($_SESSION['login_type']) && $_SESSION['login_type'] != 'teacher'){
	header("Location: logout.php");
	die();
}
?>

<link type="text/css" href="<?php echo WEB_URL; ?>css/bootstrap.css" rel="stylesheet" />
<div class="content content_inside">
  <div class="header_text">
    <div class="header_text_left"><?php echo $_SESSION['objLogin']['t_name']?>&nbsp;Subject List</div>
    <div class="top_common_bar">
      <div class="obj_right"> <a class="btn btn_add_new btn-success" href="<?php echo WEB_URL; ?>t_dashboard.php"><i class="fa"></i>Dashboard</a></div>
    </div>
  </div>
  <div>
    <table class="table common_sakotable_att table-bordered table-striped dt-responsive">
      <thead>
        <tr>
          <th>Subject Name</th>
          <th>Subject Author</th>
          <th>Subject Code</th>
          <th>Class name</th>
        </tr>
      </thead>
      <tbody>
        <?php
		  $result = '';
		  if(isset($_SESSION['objLogin']['teacher_id'])){
		  $result = mysql_query("Select *, c.c_name, t.t_name from tbl_add_subject s INNER JOIN tbl_add_class c on c_id=sb_class_id inner join tbl_add_teacher t on 	teacher_id=sb_teacher_id where sb_teacher_id = '" . (int)$_SESSION['objLogin']['teacher_id'] . "' order by sb_id desc",$link);
		  }
		  else{
			  $result = mysql_query("Select * from tbl_add_subject where sb_class_id = '-1' order by sb_id desc",$link);
		  }
		  while($row = mysql_fetch_array($result)){?>
        <tr>
          <td><?php echo $row['sb_name']; ?></td>
          <td><?php echo $row['sb_author']; ?></td>
          <td><?php echo $row['sb_code']; ?></td>
          <td><?php echo $row['c_name']; ?></td>
        </tr>
        <?php } mysql_close($link); ?>
      </tbody>
    </table>
  </div>
</div>
<?php include('../copyright.php');?>
</div>
<?php include('../footer.php');?>
