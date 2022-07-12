<?php
  require_once "headerHTML.php";
?>

<main>
<h1 class="h1">Szkolnie</h1>
<div id="slider">
    <img id='slider_image' src="images_slider/img8.jpg" class='img-fluid' alt='zdjecia szczęśliwych dzieci uczących się oraz ich nauczycieli'>
  </div>
       <script>
      var i = 0;
      var image = [];
      var time = 3500;
      var opacity = 100;
      var firstLoad=1;
      console.log(opacity);1
      image[0]="images_slider/img1.jpg";
      image[1]="images_slider/img2.jpg";
      image[2]="images_slider/img3.jpg";
      image[3]="images_slider/img4.jpg";
      image[4]="images_slider/img5.jpg";
      image[5]="images_slider/img6.jpg";
      image[6]="images_slider/img7.jpg";
      image[7]="images_slider/img8.jpg";
      var interval =setInterval(change_slide, time);

  

async function change_slide(a=1){
  i=parseInt(i+a);
    if(i<0){
      i=image.length-1;
    }
    else if(i>=image.length){
      i=0;
     }
  if(firstLoad==0){
  while(opacity>0){
    opacity-=1;
    slider_image = document.getElementById("slider_image");
    slider_image.style.opacity=opacity/100;
    await sleep(10);
  }
}
slider_image = document.getElementById("slider_image");
slider_image.src = image[i];
await sleep(600);
  while(opacity<100){
    opacity+=1;
        slider_image = document.getElementById("slider_image");

    document.getElementById("slider_image").style.opacity=opacity/100;
    await sleep(10);
  }
firstLoad=0;

}
 function sleep(time){
  return new Promise((accept)=>{
    setTimeout(function (){
      accept();
    },time);
  })
}
      window.onload = change_slide();
    </script>
	<article>
	<h2>Poznaj nas</h2>
    <section>
		
		<h2 class="h2">O nas</h2>
		<p class="text-center">Jesteśmy firmą zajmującą się weryfikacją wiedzy młodych uczniów w wielu dziedzinach. Opracowywujemy materiały z wielu przedmiotów starannie selekcjonujemy ich koncepty i tworzymy pytania na ich temat. Często uczniowie próbujący się nauczyć na istotny sprawdzian wciąż nie są w stanie określić czy umią już wystrczająco dużo a jedyny sposób weryfikacji ich wiedzy skutkuje oceną która może być istotna dla ich przyszłości. Mówimy temu stanowcze nie.</p>
  </section>
  <section>
		<h2 class="h2">Nasza misja</h2>
		<p class="text-center">Koniec z wałkowaniem tych samych rozdziałów podręcznika po nocy. Dzięki nam uczniowie dostają szanse szybkiego zweryfikowania siebie jeszcze przed sprawdzianem. Znając swój poziom wiedzy będą mogli sami zdecydować czy wciąż potrzebują poświęcić swój cenny czas na powtórki</p>
		</section>
    <section>
    <h2>Zalety quizów</h2>
		<ul class='quiz-adv'>
			<li>Quizy wymagają minimalnego wysiłku dzięki czemu żaden uczeń nie będzie odczuwał chęci prokrastynacji.</li>
			<li>Odpowiedź zwrotna jest natychmiastowa dzięki czemu szybko można sprawdzić co wymaga powtórki</li>
			<li>Można je zrobić wszędzie w domu na komputerze, w szkole, a nawet w autobusie</li>
			<li>Są w pełni darmowe</li>
			<li>Są anonimowe nikt nie będzie się śmiał ze słabego wyniku</li>
			<li>Zdając dobrze quiz zyskuje się pewność siebie która ułatwi skupienie się na sprawdzianie</li>
		</ul>
  </section>
	</article>
</main>
<?php require_once "footer.php"?>

</body>
</html>