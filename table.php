 <?php
include('config.php');
$output="";
if (isset($_POST['search'])) {
	$name_search = trim($_POST['name_search']);
	$class_search = trim($_POST['class_search']);
	$mark_search = $_POST['mark_search'];
	$query = "SELECT * FROM students WHERE name LIKE '%$name_search%' AND class LIKE '%$class_search' AND mark LIKE '%$mark_search'";
	$result = mysqli_query($connection, $query);
}else{
	$result = mysqli_query($connection, "SELECT * FROM students ORDER BY id DESC");
}

?>
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		body{
			height: 100vh;
			width: auto;
			 background-image: url(https://images.pexels.com/photos/457881/pexels-photo-457881.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940);
			 background-repeat: no-repeat;
			background-size: cover;
			background-position: center;
		}
		.fa{
			color: red;
		}
		.src{
			margin-top: 1.5em;
			padding: 3.5em;
		}
	</style>
	<title>table</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<div class="container src">
		<form method="post" class="form form-inline">
			<p>Name:</p>
  				<input type="text" class="form-control mb-2" id="inlineFormInputName2" name="name_search">
		  	<p>Class:</p>
		  		<input type="text" class="form-control mb-2" id="inlineFormInputName2" name="class_search">
		  	<p>Mark:</p>
		  		<input type="text" class="form-control mb-2" id="inlineFormInputName2" name="mark_search">	
			<input class="btn btn-success mb-2" type="submit" name="search" value="search">
		</form>
	</div>
	<div class="container">
		<form method="post" action="excel.php">
	<div class="float-right">
		<input class="btn btn-warning" type="submit" name="download" value="Download Excel">
	</div>
	<br>
	<br>
<table class="table">
	<tr>
		<th>id</th>
		<th>name</th>
		<th>class</th>
		<th>mark</th>
		<th>action</th>
	</tr>
	<?php
	while($user_data=mysqli_fetch_array($result)){
		$id =$user_data['id'];
	echo "<tr>";
	echo"<td>".$user_data['id']; echo "<br>"; echo"</td>";
	echo"<td>".$user_data['name']; echo "<br>"; echo"</td>";
	echo"<td>".$user_data['class']; echo "<br>"; echo"</td>";
	echo"<td>".$user_data['mark']; echo "<br>"; echo"</td>";	
	echo "<td>";
	echo "<a href='edit.php?id=$id'><i class='fa fa-pencil' aria-hidden='true'></i></a>";
	echo "<a href='delete.php?id=$id'> <i class='fa fa-trash' aria-hidden='true'></i> </a>";echo "</td>";
	echo "</tr>";
}
	?>
</table>
</form>
</body>
</html>