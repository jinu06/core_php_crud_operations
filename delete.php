<?php
include('config.php');
$id=$_GET['id'];
$result = mysqli_query($connection, "DELETE FROM students WHERE id=$id");
if ($result) {
	header("Location: table.php");
}