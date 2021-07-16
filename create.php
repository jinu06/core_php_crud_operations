<?php
include("config.php");
$name=$class=$mark=$msg="";
$err="";
if(isset($_POST['submit'])){
	
	$name = $_POST['name'];
	$class = $_POST['class'];
	$mark  = $_POST['mark'];
	
	$result = mysqli_query($connection, "INSERT INTO `students`( `name`, `class`, `mark`) VALUES ('$name','$class','$mark')
	");
	if ($result==true) {
		$msg= " <a class='alert alert-primary' href='table.php'>success!!! show the table</a>";
		//header("Location:table.php");
	}else{
		echo "<div class='alert alert-warning'>must fill the inputs</div>";
	}
} 


?>



<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<style type="text/css">
		body{
			background-image: url(https://images.pexels.com/photos/457881/pexels-photo-457881.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940);
			background-position: center;
			background-size: cover;
		}
		.container{
			height: 75vh;
			width: auto;
			background-color: #000;
			opacity: 0.7;
			color: white;
			/*background: linear-gradient(to bottom, white, MediumTurquoise);*/
			background-size: cover;
			background-position: center;
			border-radius: 50px;
		}
	</style>
	<title>create</title>
</head>
<body>
	<div class="container">
	<h3 class="text-center text-uppercase">Fill the fields</h3>
	<form method="post" class="form">
	<p>name:
	<input class="form-control" type="text" name="name" required="true"></p>
	<p>class:
	<input class="form-control" type="number" name="class" required="true"></p>
	<p>mark:
	<input class="form-control" type="number" name="mark" required="true"></p>
	<br>
	<input class= "btn btn-primary mb2" type="submit" name="submit" value="save">
	</form>
	<?php
	echo "<br>";
	echo $msg;
	?>
</div>
</body>
</html>