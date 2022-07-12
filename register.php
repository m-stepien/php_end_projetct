<?php
	require_once "headerHTML.php";
?>
<?php
	
	if(isset($_SESSION["login"])){
		header('Location: index.php');
		exit();
	}
?>
<main>
<form class="account_fm" action="reg.php" method="post">
		<div class="form-group">
	<label>Login:</label><br><input type="text" class="form-control" name="login" required><br>
	<?php
	if(isset($_SESSION['errorLogin'])){
		echo "<div class='error'>";
		echo $_SESSION['errorLogin'];
		echo "</div>";
		unset($_SESSION['errorLogin']);

	}
	?>
	<label>Hasło:</label><br><input type="password" name="password" class="form-control" required><br>
	<label>Powtórz hasło:</label><br><input type="password" name="REpassword" class="form-control" required><br>
	<?php
		if(isset($_SESSION["error_password"])){
			echo "<div class='error'>";
			echo $_SESSION["error_password"];
			session_unset(); 
			echo "</div>";
			unset($_SESSION['error_password']);
		}
	?>
	<label>Email:</label><br><input type="text" name="email" class="form-control" required><br>
		<?php
		if(isset($_SESSION["errorMail"])){
			echo "<div class='error'>";
			echo $_SESSION["errorMail"];
			session_unset(); 
			echo "</div>";
			unset($_SESSION['errorMail']);
		}
	?>
	<label>Name:</label><br><input type="text" name="name" class="form-control" required><br>
	<input class="btn btn-dark" type="submit" value="Zarejestruj się">
</div>
</form>
</main>

<?php require_once "footer.php"?>

</body>
</html>

