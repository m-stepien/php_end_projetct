<?php
	require_once "headerHTML.php";
?>
<main>
<?php
	if(!isset($_SESSION['login'])){
		header('Location: login.php');
		exit();
	}
$usID = $_SESSION['usID'];
$user_point=0;
$var_name= "question";
$answer_array = [];
$uncorrectAnswer=[];
$correctAnswer=[];
$j=0;
	require_once "connect.php";
	$connection = @new mysqli($host,$db_user,$db_password,$db_name);
	if($connection->connect_errno!=0){
		echo "Error bład połączenia z bazą danych";
		exit();
	}
	$SQL_query ="SELECT correctAnswer FROM question WHERE quizID=".$_GET['id'];
	$query_rezult = $connection->query($SQL_query);
	$num_of_question=$query_rezult->num_rows;
	if($num_of_question==0){
		$_SESSION['erroeNoQuestion']="Dla podanego numeru ID nie istnieje żadne pytanie";
		exit();
	}

if(isset($_POST['grade'])){
$SQL_query="SELECT quizID, grade, numVote FROM quiz WHERE quizID='".$_GET['id']."'";
$query_rezult = $connection->query($SQL_query);
$row = $query_rezult->fetch_assoc();
$vote = $row['numVote']+1;
$srednia = ($row['grade']*$row['numVote']+$_POST['grade'])/$vote;
$srednia = round($srednia, 2);
$SQL_query = "UPDATE quiz SET grade = '".$srednia."', numVote = '".$vote."' WHERE quizID = '".$row['quizID']."'";;
$query_rezult = $connection->query($SQL_query);
header('Location: quiz-list.php');
exit();
}


for($x=0;$x<$num_of_question;$x++){
	$answer_array[$x]=$query_rezult->fetch_assoc()['correctAnswer'];
}	
$query_rezult->free_result();
for($i=1;$i<=$num_of_question;$i++){
$question="question";
$question.=$i;
if(isset($_POST[$question])){
if($answer_array[$i-1]==$_POST[$question]){
	$user_point++;

}
else{
	$uncorAns=$_POST[$question];
	$uncorAns.=$i;
	$uncorrectAnswer[$j]=$uncorAns;
	$j++;
}
}
$correctAnswer[$i-1]=$answer_array[$i-1];
$correctAnswer[$i-1].=$i;
}

?>
<div class='wynik'>
	<?php
	echo "Gratuluje ".$_SESSION["name"]."!<br>Twój wynik  to: ".$user_point."/".$num_of_question."<br>Tak trzymaj!</div>";


$SQL_query ="SELECT * FROM question WHERE quizID=";
$SQL_query.=$_GET['id'];
$query_rezult=$connection->query($SQL_query);
for($j=1;$j<=$num_of_question;$j++){
	$record = $query_rezult->fetch_assoc();
	echo "<div class='question-container'>";
	echo "<div class='question'>";
	echo $record['question']."</div>";
	echo"<div id='A".$j."' class='answer'>".$record['answerA']."</div>";
	echo"<div id='B".$j."' class='answer'>".$record['answerB']."</div>";
	echo"<div id='C".$j."' class='answer'>".$record['answerC']."</div>";
	echo"<div id='D".$j."' class='answer'>".$record['answerD']."</div></div>";
	}
	$wynikUser = round($user_point/$num_of_question*100,2);

	$query_rezult->free_result();
	$SQL_query = "SELECT * FROM wynik WHERE quizID='".$_GET['id']."' AND userID='".$usID."'";
	$query_rezult = $connection->query($SQL_query);
	$count = $query_rezult->num_rows;
		if($count==0){
		$query_rezult->free_result();
		$SQL_query = "INSERT INTO wynik (userID, quizID, wynik) VALUES (".$usID.", ".$_GET['id'].", ".$wynikUser.")";
		$query_rezult = $connection->query($SQL_query);
	}
	else{
		$result = $query_rezult->fetch_assoc();
		$wynID = $result['wynikID'];
		$resWyn = $result['wynik'];
		$query_rezult->free_result();
		if($wynikUser>$resWyn){
			

			$SQL_query = "UPDATE wynik SET wynik = '".$wynikUser."' WHERE wynikID = '".$wynID."'";;
			$query_rezult = $connection->query($SQL_query);
			if(isset($query_rezult)){
			$query_rezult->free_result();
		}
		}
	}
?>

<form id='form-ocena' method='post'>
<p>Podziel się ze swoją opinią o quizie. Jak bardzo ci się podobał</p>
	<input type="number" class="form-control"
                        id="number" name="grade"
       min="1" max="5">
    <input type="submit" class="btn btn-dark">
</form>


<script>
	var correctAnswerArray = <?php echo json_encode($correctAnswer).";";?>
	var uncorrectAnswerArray =<?php echo json_encode($uncorrectAnswer).";";?>
	for(var i=0;i<correctAnswerArray.length;i++){
		var answerElement=document.getElementById(correctAnswerArray[i]);
		answerElement.classList.add("correct-answer");
	}
	for(var i=0;i<uncorrectAnswerArray.length;i++){
		var answerElement=document.getElementById(uncorrectAnswerArray[i]);
		answerElement.classList.add("uncorrect-answer");
	}
</script>
</main>
<?php require_once "footer.php"?>

</body>