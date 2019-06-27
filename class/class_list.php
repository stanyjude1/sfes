<?php include('../header.php');
	if(isset($_SESSION['login_type']) && $_SESSION['login_type'] != 'admin'){
	header("Location: logout.php");
	die();
}
?>

<?php
$token = 'none';
$msg = '';

if(isset($_GET['id']) && $_GET['id'] != '' && $_GET['id'] > 0){
  $sqlx= "DELETE FROM `tbl_add_class` WHERE c_id = ".$_GET['id'];
  mysql_query($sqlx,$link); 
  $msg = 'Delete Teacher Successfully';
  $token = 'block';
}
?>
<?php
if(isset($_GET['m']) && $_GET['m'] == 'i'){
	$msg = 'Added Class Successfully';
	$token = 'block';
}

if(isset($_GET['m']) && $_GET['m'] == 'u'){
	$msg = 'Update Class Information Successfully';
	$token = 'block';
}

?>

<link type="text/css" href="<?php echo WEB_URL; ?>css/bootstrap.css" rel="stylesheet" />
<div class="content content_inside">
  <div class="header_text">
    <div class="header_text_left">Class List</div>
    <div class="top_common_bar">
      <div class="obj_right" style="padding-right:10px !important;"><a class="btn btn_add_new btn-success" href="<?php echo WEB_URL; ?>class/add_class.php"><i class="fa fa-plus"></i>&nbsp;Add Class</a>&nbsp;<a class="btn btn_add_new btn-success" href="<?php echo WEB_URL; ?>dashboard.php"><i class="fa"></i>Dashboard</a></div>
    </div>
  </div>
  <div style="clear:both;"></div>
  <div id="msg_boxx" style="display:<?php echo $token; ?>; color:#C00" role="alert" class="alert alert-success"><strong>Success!</strong> <?php echo $msg; ?></div>
  <div>
    <table class="table sakotable table-bordered table-striped dt-responsive">
      <thead>
        <tr>
          <th>Class Name</th>
          <th>Class Numeric</th>
          <th>Class Teacher</th>
          <th>Class Note</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
         <?php
				$result = mysql_query("Select * from tbl_add_class order by c_id ASC",$link);
				while($row = mysql_fetch_array($result)){ ?>
        <tr>
          <td><?php echo $row['c_name']; ?></td>
          <td><?php echo $row['c_numeric']; ?></td>
          <td><?php echo $row['c_teacher']; ?></td>
          <td><?php echo $row['c_note']; ?></td>
          <td><a title="Edit" data-toggle="tooltip" data-placement="top" class="btn btn-primary btn-xs mrg" href="<?php echo WEB_URL;?>class/add_class.php?id=<?php echo $row['c_id']; ?>"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;<a title="Delete" data-toggle="tooltip" data-placement="top" class="btn btn-danger btn-xs mrg" onClick="deleteClass(<?php echo $row['c_id']; ?>);" href="javascript:void(0);"><i class="fa fa-trash-o"></i></a></td>
        </tr>
        <?php } mysql_close($link); ?>
      </tbody>
    </table>
  </div>
</div>
<script type="text/javascript">
  function deleteClass(Id){
  	var iAnswer = confirm("Are you sure you want to delete this Class ?");
	if(iAnswer){
		window.location = 'class_list.php?id=' + Id;
	}
  }
  </script>

<?php include('../copyright.php');?>
</div>
<?php include('../footer.php');?>
