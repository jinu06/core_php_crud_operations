<?php 
include('config.php');
$name = $clas = $mark = "";
$id=$_GET['id'];
$select = "SELECT * FROM students WHERE id=$id";
$result = mysqli_query($connection, $select);
$res =mysqli_fetch_array($result);
if(isset($_POST['update'])){
	$name = $_POST['name'];
	$class = $_POST['class'];
	$mark = $_POST['mark'];
	$update = mysqli_query($connection, "UPDATE students SET name ='$name', class='$class', mark='$mark' WHERE id='$id'");

	if ($update == true) {
	header('location:table.php');
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<style type="text/css">
		.container{
			height: 75vh;
			width: auto;
			background: linear-gradient(to bottom, white, MediumTurquoise);
			background-size: cover;
			background-position: center;
			border-radius: 50px;
		}
	</style>
	<title>update</title>
</head>
<body>
	<div class="container">
	<h3 class="text-center text-uppercase">edit the fields</h3>
	<form method="post" class="form">
	<p>name:
	<input class="form-control" type="text" name="name" value="<?php echo $res['name'];?> " required="true"></p>
	<p>class:
	<input class="form-control" type="number" name="class" required="true" value="<?php echo $res['class']; ?>"></p>
	<p>mark:
	<input class="form-control" type="number" name="mark" required="true" value="<?php echo $res['mark'];?>" ></p>
	<br>
	<input type="submit" name="update" value="update" class="btn btn-primary mb2">
	</form>
</div>
</body>
</html>