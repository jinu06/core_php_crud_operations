<?php
//$connect =mysqli_connect("localhost", "root", "", "crud");
include('config.php');
$output = '';
if (isset($_POST['download'])) {
	$sql = "SELECT * FROM students order by id desc ";
	$result = mysqli_query($connection, $sql);
	if (mysqli_num_rows($result) > 0) {
		$output.= '<table class="table" border="1">
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Class</th>
						<th>Mark</th>
					</tr>
		';
		while ( $row = mysqli_fetch_array($result)) {
			$output .='
			<tr>
				<td>'.$row['id'].'</td>
				<td>'.$row['name'].'</td>
				<td>'.$row['class'].'</td>
				<td>'.$row['mark'].'</td>
			</tr>
			';
		}
		$output .='<table>';
		header("Content-Type: application/doc");
		header("Content-Disposition: attachment; filename=staffdata.doc");
		echo $output;
	}
	
}
?>