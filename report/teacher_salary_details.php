<?php include('../header.php');
	if(isset($_SESSION['login_type']) && $_SESSION['login_type'] != 'admin'){
	header("Location: logout.php");
	die();
}
?>

<link type="text/css" href="<?php echo WEB_URL; ?>css/bootstrap.css" rel="stylesheet" />
<div class="content content_inside">
  <div class="header_text">
    <div class="header_text_left">Teacher Salary List</div>
    <div class="top_common_bar">
		<div class="obj_left">
        <select id="ddlClass" onChange="getRollClass(this.value,'teacher_salary_details');" class="form-control" name="ddlClass">
          <option value="-1">--Select Teacher--</option>
          <?php
            	$result_class = mysql_query("Select * from tbl_add_teacher order by teacher_id asc",$link);
				while($row_class = mysql_fetch_array($result_class)){?>
          <option <?php if(isset($_GET['cval']) && $_GET['cval'] == $row_class['teacher_id']){echo 'selected';}?> value="<?php echo $row_class['teacher_id'];?>"><?php echo $row_class['t_name'];?></option>
          <?php } ?>
        </select>
      </div>
      <div class="obj_left">
        <select onChange="getRollData(this.value,'teacher_salary_details');" class="form-control" name="ddlRoll" id="ddlRoll">
          <option value="-1">--Select Month--</option>
          <?php
            	$result_class = mysql_query("Select * from tbl_add_month order by mid asc",$link);
				while($row_class = mysql_fetch_array($result_class)){?>
          <option <?php if(isset($_GET['tval']) && $_GET['tval'] == $row_class['mid']){echo 'selected';}?> value="<?php echo $row_class['mid'];?>"><?php echo $row_class['m_name'];?></option>
          <?php }?>
        </select>
      </div>
      <div class="obj_right" style="padding-right:10px !important;"><a class="btn btn_add_new btn-success" href="<?php echo WEB_URL; ?>report/report.php"><i class="fa"></i>Back To Report</a></div>
    </div>
  </div>
  <div style="clear:both;"></div>
  <div class="list" style="width:100%; height:480px; overflow:auto;">
    <table class="table sakotable table-bordered table-striped dt-responsive">
      <thead>
        <tr>
          <th>Teacher Name</th>
          <th>Month Name</th>
		  <th>Pay Date</th>
          <th>Salary Amount</th>
        </tr>
      </thead>
      <tbody>
	  	<?php
			$result = '';
			if(isset($_GET['cval']) && $_GET['cval'] != '' && isset($_GET['tval']) && $_GET['tval'] != ''){
				$result = mysql_query("Select *,t.t_name as tr_name from tbl_add_teacher_salary ts inner join tbl_add_teacher t on ts.t_name = t.teacher_id inner join tbl_add_month m on ts.t_month = m.mid WHERE ts.t_name = '" . $_GET['cval'] . "' and ts.t_month = '" . $_GET['tval'] . "' order by ts.t_id desc",$link);
			}
			else if(isset($_GET['cval']) && $_GET['cval'] != ''){
				$result = mysql_query("Select *,t.t_name as tr_name from tbl_add_teacher_salary ts inner join tbl_add_teacher t on ts.t_name = t.teacher_id inner join tbl_add_month m on ts.t_month = m.mid WHERE ts.t_name = '" . $_GET['cval'] . "' order by ts.t_id desc",$link);
			}
			else if(isset($_GET['tval']) && $_GET['tval'] != ''){
				$result = mysql_query("Select *,t.t_name as tr_name from tbl_add_teacher_salary ts inner join tbl_add_teacher t on ts.t_name = t.teacher_id inner join tbl_add_month m on ts.t_month = m.mid WHERE ts.t_month = '" . $_GET['tval'] . "' order by ts.t_id desc",$link);
			}
			else{
				$result = mysql_query("Select * from tbl_add_teacher_salary where t_name = '-1' order by t_id desc",$link);
			}
			while($row = mysql_fetch_array($result)){?>
				
        <tr>
          <td><?php echo $row['tr_name']; ?></td>
		  <td><?php echo $row['m_name']; ?></td>
          <td><?php echo $row['t_pay_date']; ?></td>
          <td><?php echo CURRENCY.' '.$row['t_amount']; ?></td>
        </tr>
        <?php } mysql_close($link); ?>
      </tbody>
    </table>
  </div>
</div>
<?php include('../copyright.php');?>
</div>
<?php include('../footer.php');?>
