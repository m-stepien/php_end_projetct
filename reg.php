<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>szkolnie.pl</title>
	<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
</head>
<body>
<?php
	require_once "connect.php";
	session_start();
	$connection = @new mysqli($host,$db_user,$db_password,$db_name);
	if($connection->connect_errno!=0){
		echo "Error bład połączenia z bazą danych";
		exit();
	}
	if(isset($_POST["login"])&&isset($_POST["password"])&&isset($_POST["email"])&&isset($_POST["name"])){
		$login = $_POST["login"];
		$password =$_POST["password"];
		$passwordRe=$_POST["REpassword"];
		$email = $_POST["email"];
		$name = $_POST["name"];
		if(strcmp($password, $passwordRe)!=0){
			$_SESSION["error_password"]="Podane hasła nie są identyczne";
			header('Location: register.php');
			exit();
		}
		else if(strlen($password)<5){
			$_SESSION["error_password"]="Hasło nie może być krótsze niż 5 znaków";
			header('Location: register.php');
			exit();
		}
		
		$have_number = false;
		$have_special_char = false;
		for($i=0;$i<strlen($password);$i++){
			if(ord($password[$i])>47&&ord($password[$i])<58){
				$have_number = true;
			}
			else if(ord($password[$i])>32&&ord($password[$i])<48){
				$have_special_char = true;
			}
		}
		if(!$have_number||!$have_special_char){
			$_SESSION["error_password"]="Hasło musi składać się z przynajmniej jednej liczby i przyjanmniej jednego znaku specjalnego";
			header('Location: register.php');
			exit();
		}
		$login = htmlentities($login, ENT_QUOTES,"UTF-8");
		$SQL_query =sprintf("SELECT * FROM user WHERE login='%s'",mysqli_real_escape_string($connection,$login));
		$query_rezult = $connection->query($SQL_query);
		$count = $query_rezult->num_rows;
		if($count>0){
			$_SESSION["errorLogin"]="Podany login już istnieje";
			header('Location: register.php');
			exit();
		}
		else if(strlen($login)<3||strlen($login)>20){
			$good=false;
			$_SESSION["errorLogin"]="Długość loginu musi być w przedziale od 3 do 20 znaków";
			header('Location: register.php');
			exit();
		}
		else{
			$query_rezult=$connection->query("SELECT * FROM user WHERE email='$email'");
			$countEm = $query_rezult->num_rows;
			if($countEm>0){
				$_SESSION["errorMail"]="Podany email już istnieje";
				header('Location: register.php');
				exit();
				}
			$password = htmlentities($password, ENT_QUOTES,"UTF-8");
			$email = htmlentities($email, ENT_QUOTES,"UTF-8");
			$name = htmlentities($name, ENT_QUOTES,"UTF-8");
            $add_comand = sprintf("INSERT INTO user(login, password, email, name) VALUES ('%s', '%s','%s', '%s');",mysqli_real_escape_string($connection,$login), mysqli_real_escape_string($connection,$password),mysqli_real_escape_string($connection,$email),mysqli_real_escape_string($connection,$name));
            	if ($connection->query($add_comand) === TRUE) {
					$_SESSION['login']=$login;
					$_SESSION['email']=$email;
					$_SESSION['name']=$name;
					$query_rezult->free_result();
					$query_rezult=$connection->query("SELECT Id FROM user WHERE login='$login'");
					$record = $query_rezult->fetch_assoc();
					$_SESSION['usID']=$record['Id'];
                 	header('Location: index.php');
                 	exit();
              	}
              	else {
                	echo "Error: " . $add_comand . "<br>" . $mysqli->error;
              	}
        	}
		$query_rezult->free_result();
	}
	else{
		header('Location: register.php');
		exit();
	}
	
?>
    </body>
    </html>