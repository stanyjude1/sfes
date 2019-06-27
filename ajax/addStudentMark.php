<?php
	include("../config.php");
	session_start();
	if(isset($_SESSION['objLogin'])){
	if(isset($_POST['mark'])){
		$exam_id = $_POST['ddlExam'];
		$class_id = $_POST['dllStClassId'];
		$subject_id = $_POST['dllESSubjectId'];
		if(isset($_POST['dllESSubjectId']) && $_POST['dllESSubjectId'] != ''){
			$sqlx = "DELETE FROM `tbl_student_marks` WHERE subject_id = '$subject_id' and exam_id = '$exam_id' and class_id = '$class_id'";
			mysql_query($sqlx,$link);
			foreach($_POST['mark'] as $key => $value){
				$sql = "INSERT INTO `tbl_student_marks`(exam_id,class_id,subject_id,student_id,marks) VALUES('$_POST[ddlExam]','$_POST[dllStClassId]','$_POST[dllESSubjectId]',$key,$value)";
			mysql_query($sql,$link);
			}
			echo "Added Student Mark Successfully";
			die();
		}
		else{
			echo "please insert marks";
			}
		}
	}
	else{
		echo 'Invalid Access';
		die();
	}
?>
