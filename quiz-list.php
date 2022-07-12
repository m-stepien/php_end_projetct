<?php
	require_once "headerHTML.php";
?>
<main>
<h1>Wybierz quiz i sprawdź swoją wiedzę</h1>
<a id='filter-button' data-toggle='collapse' data-target='#content'>Filtry</a>
<div class='collapse' id='content'>

<?php
echo"<form method='post'><div class='flex-container'><div><h5>Kategorie:</h5>";
require_once "connect.php";
$connection = @new mysqli($host,$db_user,$db_password,$db_name);
	if($connection->connect_errno!=0){
		echo "Error bład połączenia z bazą danych";
		exit();
	}
	$SQL_query ="SELECT DISTINCT(category) FROM quiz";
	$query_rezult = $connection->query($SQL_query);
	$count_rezult=$query_rezult->num_rows;
	if($count_rezult==0){
		$_SESSION['erroeNoQuiz']="Nie istnieje żaden quiz";
		exit();
	}
		echo "<ul>";
	for($i=0;$i<$count_rezult;$i++){
		$record=$query_rezult->fetch_assoc();
	echo "<li><input type='checkbox' class='form-check-input' name='category[]' value='".$record['category']."' id='".$record['category']."'><label class='form-check-label' for='".$record['category']."'>".$record['category']."</label></li>";
		
	}
echo "</ul></div><div>";
echo "<h5>Ocena:</h5>";
echo "<div class='form-check'>";
echo "<div class='option'><input type='radio' class='form-check-input' id='czt-pl' value='4.5' name='grade'><label class='form-check-label' for='czt-pl'> >= 4.5</label></div>";
echo "<div class='option'><input type='radio' class='form-check-input' id='czt' value='4' name='grade'><label class='form-check-label' for='czt'> >= 4</label></div>";
echo "<div class='option'><input type='radio' class='form-check-input' id='trz-pl' value='3.5' name='grade'><label class='form-check-label' for='trz-pl'> >= 3.5</label></div>";
echo "<div class='option'><input type='radio' class='form-check-input' id='trz' value='3' name='grade'><label class='form-check-label' for='trz'> >= 3</label></div>";
echo "<div class='option'><input type='radio' class='form-check-input' id='dw-pl' value='2.5' name='grade'><label class='form-check-label' for='dw-pl'> >= 2.5</label></div>";
echo "<div class='option'><input type='radio' class='form-check-input' id='dw' value='2' name='grade'><label class='form-check-label' for='dw'> >= 2</label></div>";
echo "<div class='option'><input type='radio' class='form-check-input' id='j-pl' value='1.5' name='grade'><label  class='form-check-label' for='j-pl'> >= 1.5</label></div>";
echo "</div></div>";
echo "<input type='submit' class='btn btn-dark' value='Zastosuj'>";

echo "</div></form>";
	$query_rezult->free_result();

?>
</div>


<div class='flex-container'>

<?php
	$SQL_query ="SELECT  * FROM quiz";
	if(isset($_POST['category'])){
		$SQL_query .=" WHERE ";
		$num=1;
		$c=count($_POST['category']);
		foreach($_POST['category'] as $sel){
		if($num<$c){
			$SQL_query.="category='".$sel."' OR ";
		}
		else{
			$SQL_query.="category='".$sel."'";
		}
		$num++;
	}
	}
	if(isset($_POST['grade'])){
		if(isset($_POST['category'])){
			$SQL_query .= " AND ";
		}
		else{
			$SQL_query .= " WHERE ";
		}
		$SQL_query .= "grade>=".$_POST['grade'];
	
}
	$query_rezult = $connection->query($SQL_query);
	$count_rezult=$query_rezult->num_rows;
	if($count_rezult==0){
		$_SESSION['errorNoQuiz']="Nie istnieje zaden quiz spelniajacy wymagania";
		echo $_SESSION['errorNoQuiz'];
	}
	for($i=0;$i<$count_rezult;$i++){
		$record=$query_rezult->fetch_assoc();	
		echo"<section class='quiz-descr'><a href='quiz.php?id=".$record['quizID']."'>";
			echo"<h4>".$record['title']."</h4>";
			echo "<div>Ocena quizu ";
			echo $record['grade'];
			echo "</div><div>Kategoria: ";
			echo $record['category']."</div><p>";
			echo $record['description']."</p>";
		echo"</a></section>";
	}

?>
</div>
</main>
<?php require_once "footer.php"?>
</body>
</html>