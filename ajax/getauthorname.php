<?php
	include("../config.php");
	session_start();
	if(isset($_SESSION['objLogin'])){
	$html = '';
	if(isset($_GET['bid'])){
		$result = mysql_query("SELECT * from tbl_library_book_list where b_id = '" . (int)$_GET['bid'] . "' order by author_name asc",$link);
		while($rows = mysql_fetch_array($result)){
			$html .= $rows['author_name'];
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