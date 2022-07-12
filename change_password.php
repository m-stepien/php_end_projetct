<?php
if(isset($_POST['oldPassword'])){
require_once "connect.php";
	$connection = @new mysqli($host,$db_user,$db_password,$db_name);
	if($connection->connect_errno!=0){
		echo "Error bład połączenia z bazą danych";
		exit();
	}
		$oldPass = htmlentities($_POST['oldPassword'], ENT_QUOTES,"UTF-8");
		$SQL_query = sprintf("SELECT * FROM user WHERE login='%s' AND password='%s'",mysqli_real_escape_string($connection,$SESSION['login']),
		i_real_escape_string($connection, $oldPass));
		$query_rezult = $connection->query($SQL_query);
		$count = $query_rezult->num_rows;
		if($count==0){
			$_SESSION["error_password"]="Podane błędne hasło";
			header('Location: account.php');
			exit();
		}
	if(strcmp($password, $passwordRe)!=0){
		$_SESSION["error_password"]="Podane hasła nie są identyczne";
			header('Location: account.php');
			exit();
		}
		else if(strlen($password)<5){
			$_SESSION["error_password"]="Hasło nie może być krótsze niż 5 znaków";
			header('Location: account.php');
			exit();
		}
		$newPass = htmlentities($_POST['newPassword'], ENT_QUOTES,"UTF-8");
		$query_rezult->free_result();
		$SQL_query = sprintf("UPDATE user SET password = '%s' WHERE login = '$s'",mysqli_real_escape_string($connection,$newPass),
		mysqli_real_escape_string($connection, $$_SESSION['login']));

		$query_rezult = $connection->query($SQL_query);
}
?>