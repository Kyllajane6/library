<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$title = $_POST['title'];
		$author = $_POST['author'];
		$genre = $_POST['genre'];
		$sql = "UPDATE books SET title = '$title', author = '$author', genre = '$genre' WHERE id = '$id'";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'Book updated successfully';
		}
		///////////////

		//use for MySQLi Procedural
		// if(mysqli_query($conn, $sql)){
		// 	$_SESSION['success'] = 'Book updated successfully';
		// }
		///////////////
		
		else{
			$_SESSION['error'] = 'Something went wrong in updating book';
		}
	}
	else{
		$_SESSION['error'] = 'Select book to edit first';
	}

	header('location: index.php');

?>