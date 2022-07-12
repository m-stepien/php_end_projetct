<!DOCTYPE html>
<html lang="pl-PL">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>szkolnie.pl</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<header>


		<nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
					<img src="logo.jpg" alt="logostrony" width="70" class="navbar-brand">
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item"><a href='index.php' class='nav-link'>Strona główna</a></li>
				<li class="nav-item"><a href='quiz-list.php' class='nav-link'>Quiz</a></li>

							<?php

			session_start();		
			if(isset($_SESSION["login"])){
				echo "<li class='nav-item'><a href='account.php' class='nav-link'>".$_SESSION['login']."</a></li><li class='nav-item'><a href='logout.php' class='nav-link'>Wyloguj się</a></li>";
		}
		else{
				echo "<li class='nav-item'><a href='login.php' class='nav-link'>Zaloguj się</a></li>
				<li class='nav-item'><a href='register.php' class='nav-link'>Zarejestruj się</a></li>";
			}
			?>	
			</ul>
			</div>
		</nav>


</header>