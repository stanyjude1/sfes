<?php include('../header.php');
	if(isset($_SESSION['login_type']) && $_SESSION['login_type'] != 'teacher'){
	header("Location: logout.php");
	die();
}
?>


<link type="text/css" href="<?php echo WEB_URL; ?>css/bootstrap.css" rel="stylesheet" />
<div class="content content_inside">
  <div class="header_text">
    <div class="header_text_left">Examination Date List</div>
    <div class="top_common_bar">
      <div class="obj_left">
        <select onChange="getClassData(this.value,'t_exam_date_list');" class="form-control" name="ddlClass">
          <option value="-1">--Select Class--</option>
          <?php
            	$result_class = mysql_query("Select * from tbl_add_class order by c_id asc",$link);
				while($row_class = mysql_fetch_array($result_class)){?>
          <option <?php if(isset($_GET['cid']) && $_GET['cid'] == $row_class['c_id']){echo 'selected';}?> value="<?php echo $row_class['c_id'];?>"><?php echo $row_class['c_name'];?></option>
          <?php } ?>
        </select>
      </div>
      <div class="obj_right"><a class="btn btn_add_new btn-success" href="<?php echo WEB_URL; ?>examination/t_exm.php"><i class="fa"></i>Examination Dashboard</a></div>
    </div>
  </div>
  <div style="clear:both;"></div>
  <div>
    <table class="table common_sakotable table-bordered table-striped dt-responsive">
      <thead>
        <tr>
          <th>Exam. Name</th>
          <th>Class Name</th>
          <th>Exam. Date</th>
          <th>Note</th>
        </tr>
      </thead>
      <tbody>
       <?php
				$result = '';
		  		if(isset($_GET['cid']) && $_GET['cid'] != ''){
				$result = mysql_query("Select *, c.c_name,ss.schedule_name from tbl_add_exam_date ed INNER JOIN tbl_add_class c on c_id=ex_class_id inner join tbl_schedule_setup ss on ss.schedule_id = ed.ex_name where ex_class_id = '" . $_GET['cid'] . "' order by ex_id ASC",$link);
				}
				else{
					$result = mysql_query("Select * from tbl_add_exam_date where ex_class_id = '-1' order by ex_id desc",$link);
				}
				while($row = mysql_fetch_array($result)){?>
        <tr>
          <td><?php echo $row['schedule_name']; ?></td>
          <td><?php echo $row['c_name']; ?></td>
          <td><?php echo $row['ex_date']; ?></td>
          <td><?php echo $row['ex_note']; ?></td>
        </tr>
        <?php } mysql_close($link); ?>
      </tbody>
    </table>
  </div>
</div>

<?php include('../copyright.php');?>
</div>
<?php include('../footer.php');?>
