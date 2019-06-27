<?php
	include("../config.php");
	session_start();
	if(isset($_SESSION['objLogin'])){
	$html = '';
	if(isset($_GET['classid'])){
		$result = mysql_query("SELECT * from tbl_add_student where s_class_id = '" . (int)$_GET['classid'] . "' order by s_roll_no asc",$link);
		while($rows = mysql_fetch_array($result)){
			$html .= '<input onchange="addme(this);" type="checkbox" name="dllStNameId[]" value="'.$rows['s_id'].'" />&nbsp;<span id="xstr_'.$rows['s_id'].'">' . $rows['s_name'] . ' (' . $rows['s_roll_no'] . ')</span><br/>';
		}
		echo $html;
		die();
	}
	
	echo '';
	die();
	}
	else{
		echo 'Invalid Access';
		die();
	}
?>