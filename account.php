<?php
	require_once "headerHTML.php";
?>
<main>
<?php

	if(!isset($_SESSION['login'])){
		header('Location: login.php');
		exit();
	}
	echo "<h1>".$_SESSION['name']."! Witaj ponownie!!!</h1>";
?>
<div class='flex-container' id="flex-account">
<section class='data'>
<h2>Dane osobowe:</h2>
<table class='table'>
	<tr>
		<td>
		Imie:
		</td>
		<td>
		<?php
		echo $_SESSION['name'];

		?>
		</td>
	</tr>
	<tr>
	<td>
		Email:
		</td>
		<td>
		<?php
		echo $_SESSION['email'];
?>

		</td>
	</tr>
	<tr>
		<td>
		Login:
		</td>
		<td>
		<?php
		echo $_SESSION['login'];

		?>
		</td>
	</tr>
	<tr>
			<td>
		Id użytkownika:
		</td>
		<td>
		<?php
		echo $_SESSION['usID'];

		?>
		</td>
	</tr>
</table>
</section>
<section class='data'>
	<?php
	require_once "connect.php";
	$connection = @new mysqli($host,$db_user,$db_password,$db_name);
	if($connection->connect_errno!=0){
		echo "Error bład połączenia z bazą danych";
		exit();
	}
	$SQL_query = "SELECT title, quizID FROM quiz";
	$query_rezult = $connection->query($SQL_query);

	
echo	"<h2>Twoje wyniki:</h2>";
echo"<table class='table'>";
$count = $query_rezult->num_rows;

for($i=0;$i<$count;$i++){
	echo"<tr>";
	$record=$query_rezult->fetch_assoc();
	echo"<td>".$record['title']."</td><td>";
	$SQL_query2 = "SELECT wynik FROM wynik WHERE userID='".$_SESSION['usID']."' AND quizID='".$record['quizID']."'";
	$query_rezult2 = $connection->query($SQL_query2);
	$count2 = $query_rezult2->num_rows;
	if($count2==0){
		echo "0 %";
	}
	else{
		$record2=$query_rezult2->fetch_assoc();
		$query_rezult2->free_result();
		echo $record2['wynik']." %";
	}
echo "</td></tr>";

}
$query_rezult->free_result();
?>
</table>

</section>
</div>
<section class='data account_fm' id='change-pass-form'>
	<h2>Zmień hasło</h2>
	<?php
	if(isset($_SESSION['error_password'])){
			echo "<div class='error'>";
			echo $_SESSION["error_password"];
			echo "</div>";
			unset($_SESSION["error_password"]); 
	}
	?>
	<form method="post" class = 'form-group'>
	<label>Stare hasło</label><input type='password' class='form-control' name='oldPassword'><br>
	<label>Nowe hasło</label><input type='password' class='form-control' name='newPassword'><br>
	<label>Powtórz nowe hasło</label><input type='password'  class='form-control' name='REnewPassword'><br>
	<input type='submit' class='btn btn-dark' value='Zmień hasło'>
	</form>
<?php
if(isset($_POST['oldPassword'])){

		$oldPass = htmlentities($_POST['oldPassword'], ENT_QUOTES,"UTF-8");
		$SQL_query = sprintf("SELECT * FROM user WHERE login='%s' AND password='%s'",mysqli_real_escape_string($connection,$_SESSION['login']),
		mysqli_real_escape_string($connection, $oldPass));
		$query_rezult = $connection->query($SQL_query);
		$count = $query_rezult->num_rows;
		if($count==0){
			$_SESSION["error_password"]="Podane błędne hasło";
			header('Location: account.php');
			exit();
		}
	if(strcmp($_POST['newPassword'], $_POST['REnewPassword'])!=0){
		$_SESSION["error_password"]="Podane hasła nie są identyczne";
			header('Location: account.php');
			exit();
		}
		else if(strlen($_POST['newPassword'])<5){
			$_SESSION["error_password"]="Hasło nie może być krótsze niż 5 znaków";
			header('Location: account.php');
			exit();
		}
		$newPass = htmlentities($_POST['newPassword'], ENT_QUOTES,"UTF-8");
		$query_rezult->free_result();
		$SQL_query = sprintf("UPDATE user SET password = '%s' WHERE login = '%s'",mysqli_real_escape_string($connection,$newPass),
		mysqli_real_escape_string($connection, $_SESSION['login']));

		$query_rezult = $connection->query($SQL_query);
}
?>

</section>
</main>
<?php require_once "footer.php"?>
</body>
</html>