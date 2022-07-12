<?php
	session_start();
	require_once "connect.php";
	$connection = @new mysqli($host,$db_user,$db_password,$db_name);
	if($connection->connect_errno!=0){
		echo "Error bład połączenia z bazą danych";
		exit();
	}
	if(isset($_POST["login"])&&isset($_POST["password"]))
	{
		$login = $_POST["login"];
		$haslo = $_POST["password"];
		//sql injection protecion
		$login = htmlentities($login, ENT_QUOTES,"UTF-8");
		$haslo = htmlentities($haslo, ENT_QUOTES,"UTF-8");
		$SQL_query = sprintf("SELECT * FROM user WHERE login='%s' AND password='%s'",mysqli_real_escape_string($connection,$login),
			mysqli_real_escape_string($connection, $haslo));
		$query_rezult = $connection->query($SQL_query);
		$count = $query_rezult->num_rows;
		if($count>0){
			$row=$query_rezult->fetch_assoc();
			$_SESSION['name']=$row['name'];
			$_SESSION['login']=$row['login'];
			$_SESSION['email']=$row['email'];
			$_SESSION['usID']=$row['Id'];
			header('Location: index.php');

		}
		else{
			$_SESSION['blad_login'] = 'Nieprawidłowy login lub haslo';
			header('Location: login.php');
		}
	}
	else{
		header('Location: login.php');
	}
?>