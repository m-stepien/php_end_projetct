<?php
  require_once "headerHTML.php";
?>


<main>
	<aside class='clock'>
		<span id='minute'>03</span><span> : </span>
		<span id='second'>00</span>
	</aside>
	<script>
		var timeMinute=2;
		var timeSecond=59;
		var minutePlace= document.getElementById('minute');
		var secondPlace= document.getElementById('second');
		var colorFlag=0;
		var clock = minutePlace.parentElement;
		console.log(clock);
		var interval = setInterval(count,1000);
		function count(){
			if(timeMinute==0&&timeSecond==0){
				var form = document.getElementById("quiz-form");
				form.submit();
				clearInterval(interval);
			}
			if(timeMinute<10){
				var timeStringM = "0"+timeMinute.toString();
			}
			else{
				var timeStringS = timeMinute.toString();
			}
			if(timeSecond<10){
				var timeStringS = "0"+timeSecond.toString();
			}
			else{
				var timeStringS = timeSecond.toString();
			}

			minutePlace.innerHTML=timeStringM;
			secondPlace.innerHTML=timeStringS;
			timeSecond--;
			if(timeMinute==0&&timeSecond<10){
				if(colorFlag==0){
					clock.style.backgroundColor="red";
					colorFlag=1;
				}
				else{
					clock.style.backgroundColor="grey";
					colorFlag=0;
				}
			}
			if(timeMinute>0&&timeSecond<0){
				timeMinute--;
				timeSecond=59;
			}

		}
		//script for clock
	</script>
<?php
if(!isset($_SESSION['login'])){
	$_SESSION['loginRequiredWorning']="Musisz się zalogować aby móc przystąpić do quizu";
	header('Location: login.php');
	exit();
}
echo "<div class='conteiner-si'>";
echo "<form action='check_quiz.php?id=".$_GET['id']."' method='post' id='quiz-form'>";
	require_once "connect.php";
	$connection = @new mysqli($host,$db_user,$db_password,$db_name);
	if($connection->connect_errno!=0){
		echo "Error bład połączenia z bazą danych";
		exit();
	}
	$SQL_query ="SELECT * FROM question WHERE quizID=";
	$SQL_query.=$_GET['id'];
	$query_rezult = $connection->query($SQL_query);
	$count_rezult=$query_rezult->num_rows;
	if($count_rezult==0){
		$_SESSION['erroeNoQuestion']="Dla podanego numeru ID nie istnieje żadne pytanie";
		header('Location:index.php');
		exit();
	}



for($m=1;$m<=$count_rezult;$m++){
	$record=$query_rezult->fetch_assoc();	


echo "<div class='question-container'><div class='question'>";
echo $record['question'];
echo"</div>";
echo"<div class='form-check'><input class='form-check-input' type='radio' id='A".$m."' value='A' name='question".$m."'><label  class='form-check-label' for='A".$m."'>";
echo $record['answerA'];
echo "</label></div>";
echo "<div class='form-check'><input class='form-check-input' type='radio' id='B".$m."' value='B' name='question".$m."'><label  class='form-check-label' for='B".$m."'>";
echo $record['answerB'];
echo "</label></div>";
echo "<div class='form-check'><input class='form-check-input' type='radio' id='C".$m."' value='C' name='question".$m."'><label  class='form-check-label' for='C".$m."'>";
echo $record['answerC'];
echo "</label></div>";
echo "<div class='form-check'><input class='form-check-input' type='radio' id='D".$m."' value='D' name='question".$m."'><label class='form-check-label' for='D".$m."'>";
echo $record['answerD'];
echo "</label></div>";
echo "</div>";

}
?>

<input type='submit' class="btn btn-dark" value="Prześlij">
</form>
</div>
</main>
<?php require_once "footer.php"?>

</body>

</html>