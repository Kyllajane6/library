<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST['add'])){
		$title = $_POST['title'];
		$author = $_POST['author'];
		$genre = $_POST['genre'];
		$sql = "INSERT INTO books (title, author, genre) VALUES ('$title', '$author', '$genre')";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'Book added successfully';
		}
		///////////////

		//use for MySQLi Procedural
		// if(mysqli_query($conn, $sql)){
		// 	$_SESSION['success'] = 'Book added successfully';
		// }
		//////////////
		
		else{
			$_SESSION['error'] = 'Something went wrong while adding';
		}
	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: index.php');
?>