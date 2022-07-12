<?php
	require_once "headerHTML.php";
?>
<?php	
	if(isset($_SESSION["login"])){
		header('Location: index.php');
		exit();
	}
	else if(isset($_SESSION['loginRequiredWorning'])){
		echo "<div class='worning'>";
		echo $_SESSION['loginRequiredWorning'];
		echo "</div>";
		unset($_SESSION['loginRequiredWorning']);

	}
?>
<main>
<form class="account_fm" action="log.php" method="post" id='fm_login'>
	<div class="form-group">
	<label>Login:</label><br><input type="text" class="form-control" name="login"><br>
	<label>Hasło:</label><br><input type="password" class="form-control" name="password"><br>
	<?php
		if(isset($_SESSION["blad_login"])){
			echo "<div class='error'>";
			echo $_SESSION["blad_login"];
			echo "</div>";
			unset($_SESSION["blad_login"]); 
		}
	?>
	<input type="submit" class="btn btn-dark" value="Zaloguj się">
</div>
</form>
</main>

<?php require_once "footer.php"?>

</body>
</html>
