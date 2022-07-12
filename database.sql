SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Baza danych: `mateusz.stepien`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `question`
--

CREATE TABLE `question` (
  `questionID` int(100) NOT NULL,
  `answerA` varchar(255) NOT NULL,
  `answerB` varchar(255) NOT NULL,
  `answerC` varchar(255) NOT NULL,
  `answerD` varchar(255) NOT NULL,
  `correctAnswer` varchar(10) NOT NULL,
  `question` varchar(255) NOT NULL,
  `quizID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `question`
--

INSERT INTO `question` (`questionID`, `answerA`, `answerB`, `answerC`, `answerD`, `correctAnswer`, `question`, `quizID`) VALUES
(5, 'A Expeliarmus', 'B Avada Cadavra', 'C Abracadabra', 'D Wingardium Leviosa', 'A', '1. Jakie zaklęcie urotowało Harrego Pottera w 4 części sagi?', 1),
(6, 'A Profesor Snape', 'B Profesor Lochart', 'C Profesor Dumbledor', 'D Profesor Voldemort', 'B', '2. Kto był profesorem od obrony przed czarną magią w 2 częsci sagi', 1),
(7, 'A Bazyliszek', 'B Liszy', 'C Sfinks', 'D Hipogryf', 'D', '3. Jaki potwór zranił Dracona Malfoya w książce \"Harry Potter i Więzień Azkabanu\"', 1),
(8, 'A Półgłówkiem', 'B Półolbrzymem', 'C Śmierciożercą', 'D Czarodziejem czystej krwi', 'B', '4. Kim był Hagrid', 1),
(9, 'A Kamień filozoficzny', 'B Krew jednorożca', 'C Horkruksy', 'D Miłość matki', 'C', '5. Co zapewniło Voldemortowi nieśmiertelność', 1),
(10, 'A Jakiegokolwiek wroga', 'B Harrego Pottera', 'C Albusa Dumbledora', 'D Wiernego sługi', 'A', '6. Jaka krew była potrzena Voldemortowi aby mógł się odrodzić?', 1),
(11, 'A Albus Dumbledore', 'B Hagrid', 'C Syriusz Black', 'D Severus Snape', 'C', '7. Kto był ojcem chrzestnym Harrego?', 1),
(12, 'A Sandacza', 'B Szprotki', 'C Kotleta', 'D Nic', 'A', 'Co Wokulski jadł nożem i widelcem?', 6),
(13, 'A Paweł', 'B Karol', 'C Ignacy', 'D Tomasz', 'D', 'Jak miał na imię ojciec Izabeli?', 6),
(14, 'A Barok', 'B Pozytywizm', 'C Średniowiecze', 'D Antyk', 'B', 'Motywy jakiego okresu historycznego przeplatają się przez strony powieści?', 6),
(15, 'A 1865', 'B 1860', 'C 1893', 'D 1410', 'B', 'W którym roku Wokulski pracował jako subiekt u Hopfera?', 6),
(16, 'A jeden dzień', 'B nie uczył się', 'C niecały rok', 'D pięć lat', 'C', ' Jak długo Wokulski uczył się w Szkole Głównej?', 6),
(17, 'A większy od zera', 'B mniejszy od zera', 'C mniejszy lub równy 0', 'D równy zero', 'B', 'Równanie kwadratowe nie ma rozwiązania jeśli wyróżnik trójmianu kwadratowego jest', 5),
(18, 'A mniejszy od zera', 'B równy zero lub jest większy od zera', 'C mniejszy od zera lub równy zero', 'D żadna z pozostałych odpowiedzi nie jest poprawna', 'B', 'Równanie kwadratowe ma rozwiązanie jeśli wyróżnik trójmianu kwadratowego jest:', 5),
(19, 'A 6, -5', 'B 6, 5', 'C -6, 5', 'D -6, -5', 'A', 'Dane jest równanie:(x-6)(x+5)=0 Rozwiązaniem tego równania są liczby', 5),
(20, 'A 14', 'B 8', 'C 1', 'D 2', 'D', 'Ile maksymalnie może mieć rozwiązań równanie kwadratowe?', 5),
(21, 'A. symetryczny do wykresu funkcji f względem osi Ox.', 'B. symetryczny do wykresu funkcji f względem osi Oy.', 'C. symetryczny do wykresu funkcji f względem początku układu współrzędnych.', 'D. przesunięty względem wykresu funkcji f o 10 jednostek w kierunku przeciwnym do\r\nzwrotu osi Ox.', 'B', 'Funkcja kwadratowa g jest określona wzorem g(x) = 2x 2 − 5x. Wykres funkcji g jest', 5),
(22, 'A. jedno rozwiązanie rzeczywiste.', 'B. dwa rozwiązania rzeczywiste.', 'C. trzy rozwiązania rzeczywiste.', 'D. cztery rozwiązania rzeczywiste.', 'B', 'Równanie (x^2-27)(x^2+16)=0 ma dokładnie', 5),
(23, 'A. do 1 włącznie', 'B. od -2 włącznie', 'C. do 3 włącznie', 'D. od 1 włącznie', 'A', 'Funkcja kwadratowa f określona wzorem f(x) = −2(x − 1)^2 + 3 jest rosnąca\r\nw przedziale', 5),
(24, 'A. W parku', 'B. W winiarni u Hopfera', 'C. W swoim sklepie', 'D. W teatrze', 'D', 'Gdzie Stanisław Wokulski pierwszy raz zobaczył Izabelę Łęcką?', 6),
(25, 'A. Inteligencja', 'B. Mieszczanie', 'C. Arystokracja', 'D. Robotnicy', 'C', 'Z jakiej grupy społecznej wywodzi się rodzina Łęckich?', 6),
(26, 'A. Samolotu dwupłatowego', 'B. Szklanych domów', 'C. Telefonu', 'D. Metalu lżejszego od powietrza', 'D', 'O sfinansowanie jakiego projektu prosi prof. Geist Wokulskiego?', 6),
(27, 'A. Baronowa Krzeszowska', 'B. Baron Krzeszowski', 'C. Panna Florentyna', 'D. Izabela Łęcka', 'A', 'Kto oskarża Helenę Stawską o kradzież Lalki?', 6),
(28, 'A. Cintry ', 'B. Rivii', 'C. Skellige', 'D. Blaviken', 'D', 'Geralt był zwany Rzeźnikiem z', 7),
(29, 'A. księżniczką', 'B. bruxą', 'C. czarodziejką', 'D. strzygą ', 'A', 'Renfri z opowiadania \"Mniejsze zło\" była', 7),
(31, 'A. Kara', 'B. Płotka', 'C. Kasztanka', 'D. Szprotka ', 'B', 'Jak nazywała się klacz Geralta?', 7),
(33, 'A. sum', 'B. łosoś', 'C. pstrąg', 'D. szczupak ', 'A', 'Na jaką rybę polowali Geralt i Jaskier?', 7),
(34, 'A. Kwakkwakak', 'B. Kudkudak', 'C. Kokodak', 'D. Krakrak ', 'B', ' Jak nazywał się szlachcic z opowiadania \"Kwestia Ceny\", który na przyjęciu w Cintrze naśladował głosy zwierząt? ', 7),
(39, 'A. Białego', 'B. Czerwonego', 'C. Złotego', 'D. Szkarłatnego', 'C', 'Na jakiego smoka polowano w opowiadaniu \"Granice możliwości\"', 7),
(40, 'A. Kupcem', 'B. Vexlingiem', 'C. Wiedźminem', 'D. Szlachcice', 'B', 'Kim był Tellico Lunngrevink Letorte?', 7),
(41, 'A. Nietoperz', 'B. Sowa', 'C. Sójka', 'D. Kruk', 'D', 'Jaki ptak przebywał w siedzibie Yennefer i Geralta w Aedd Gynvael w opowiadaniu \"Okruch lodu\"?', 7),
(42, 'A. Robak', 'B. Protazy', 'C. Gerwazy', 'D. Wojski', 'C', 'Klucznikiem Horeszków był:', 9),
(43, 'A. Zasad polowania', 'B. Zachowania przy stole', 'C. Histori Polski', 'D. Grzeczności i wychowania młodzierzy', 'D', 'Czego dotyczyła nauka Sędziego wygłoszona podczas uczty w zamku', 9),
(44, 'A. Robak', 'B. Protazy', 'C. Gerwazy', 'D. Wojski', 'C', 'Klucznikiem Horeszków był:', 9),
(46, 'A. Tadeuszowi', 'B. Wojskiemu', 'C. Gerwazemu', 'D. Hrabiemu', 'C', 'Komu ksiądz Robak wyznał swoje prawdziwe imię', 9),
(47, 'A. Żurek śląski', 'B. Chłodnik litewski', 'C. Ogon bobrowy', 'D. Czarną polewkę', 'D', 'Stolnik Horeszko odmówił Jackowi Soplicy ręki Ewy podając mu', 9),
(50, 'A. Zamku', 'B. Kobiety', 'C. Psów', 'D. Pieniędzy', 'C', 'Spór Asesora i Rejenta dotyczył', 9),
(51, 'A. Hrabiego', 'B. Wojskiego', 'C. Rejenta', 'D. Tadeusza', 'C', 'Telimena wychodzi za mąż za', 9),
(54, 'A. Karczmę przydrożną', 'B. Zamek Horeszków', 'C. Oblężenie', 'D. Przejęcie posiadłości, jako egzekucja wyroku sądowego', 'D', 'Co w lekturze oznacza zajazd', 9),
(55, 'A. 72%', 'B. 28%', 'C. 18%', 'D. 30%', 'B', 'Cenę drukarki obniżono o 20%, a następnie nową cenę obniżono o 10%. W wyniku obu tych\r\nzmian cena drukarki zmniejszyła się w stosunku do ceny sprzed obu obniżek o', 10),
(56, 'A. 2x-3', 'B. 2x^2-6x-3', 'C. (2x-3)^2', 'D. 9', 'A', 'Dla każdej liczby rzeczywistej x wyrażenie (x-1)^2-2(2-x)^2 jest równe', 10),
(57, 'A. 4 i 6', 'B. 4 i 3', 'C. 10 i 10', 'D 5 i 5', 'C', 'Jeden z boków równoległoboku ma długość równą 5. Przekątne tego równoległoboku mogą\r\nmieć długości', 10),
(58, 'A. -x + 2y + 3 = 0', 'B. -x + 2y - 3 = 0', 'C. x + 2y - 3 = 0', 'D. x + 2y + 3 = 0', 'C', 'Obrazem prostej o równaniu x - 2y + 3 = 0 w symetrii osiowej względem osi Oy jest prosta o równaniu', 10),
(59, 'A. 176', 'B. 192 ', 'C. 224', 'D. 288', 'B', 'Graniastosłup prawidłowy ma 46 krawędzi. Długość każdej z tych krawędzi jest równa 4. Pole powierzchni bocznej tego graniastosłupa jest równe', 10);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `quiz`
--

CREATE TABLE `quiz` (
  `quizID` int(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `grade` double NOT NULL,
  `description` varchar(500) NOT NULL,
  `numVote` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `quiz`
--

INSERT INTO `quiz` (`quizID`, `title`, `category`, `grade`, `description`, `numVote`) VALUES
(1, 'Harry Potter ogólny', 'fantazy', 3.5, 'Test ogólny z wiedzy o Harrym Poterze poruszający ogólne zagadnienia fabularne nie skupia się na szczegółach poszczególnych postaci kategoryzowany jako łatwy.', 22),
(5, 'Równianie kwadratowe', 'matematyka', 3.67, 'Test sprawdzający wiedzę z matematyki na poziomie maturalnym. Sprawdzane są zagadnienia z działu równania kwadratowe', 6),
(6, 'Lalka - Bolesław Prus', 'literatura', 4, 'Quiz sprawdzający wiedzę z cudownej kochanej przez wszystkich powieści Bolesława Prusa pod tytułem \"Lalka\". Test szczegółowo sprawdza wiedzę ucznia aby upewnić się, że nie przeczytał on streszczenia zamiast lektury.', 3),
(7, 'Wiedźmin - test wiedzy', 'fantazy', 4.5, 'Test sprawdzający znajomość opowiadań o wiedźminie zawartych w książkach \"Wiedźmin Ostatnie Życzenie\" oraz \"Wiedźmin miecz przeznaczenia\". Pytania dotyczą fabuły, związków przyczynowo skutkowych oraz detalicznych ciekawostek o bohaterach.', 2),
(9, 'Pan Tadeusz - Test wiedzy ogólnej', 'literatura', 2.67, 'Test sprawdzający wiedzę ogólną z lektury książki Adama Mickiewicza pod tytułem \"Pan Tadeusz\". Ma na celu upewnić się, że uczeń posiada wiedzę o wydarzeniach i szczegółach zawartych w książce przewyższającą wiedzę ze streszczenia.', 3),
(10, 'Matematyka - test ogólny', 'matematyka', 1.33, 'Test ogólny sprawdzający wiedzę matematyczną na poziomie liceum. Pytania ułożone na podstawie pytań z egzaminów maturalnych z matury podstawowej z poprzednich lat.', 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `Id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`Id`, `login`, `password`, `email`, `name`) VALUES
(17, 'mmm', 'hasloqwer', 'mattt@gom.com', 'Mateusz'),
(20, 'mafix32', 'haslo12!', 'gooowy323@wp.com', 'Mateusz'),
(21, 'mafix3', 'haslo123!', 'ssf@fd.pl', 'Mateusz'),
(22, 'mafix32333', 'haslo123!', 'truler@gmail.com', 'Mateusz'),
(23, 'wojcicki32', 'hahahaha13!', 'takitammail@gmail.com', 'Miroslaw'),
(24, 'mffder', 'haslo123!', 'mattt@gom.comaass', 'Michał'),
(25, 'gizmo', 'haslo123!', 'gizmo@gmail.pl', 'Marcin'),
(26, 'wera24', 'MyPassword1234!', 'myMail@gmail.com', 'Weronika'),
(27, 'mfdlkjasmd', 'haslo123!', 'dsaomfasmfmdsafmjm@jfskal.pl', 'Marcin');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wynik`
--

CREATE TABLE `wynik` (
  `wynikID` int(200) NOT NULL,
  `userID` int(100) NOT NULL,
  `quizID` int(100) NOT NULL,
  `wynik` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `wynik`
--

INSERT INTO `wynik` (`wynikID`, `userID`, `quizID`, `wynik`) VALUES
(4, 17, 1, 85.71),
(6, 17, 5, 50),
(7, 17, 6, 40),
(8, 26, 1, 71.43),
(9, 26, 5, 14.29),
(10, 26, 6, 0),
(11, 17, 7, 0),
(12, 17, 9, 0),
(13, 17, 10, 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`questionID`),
  ADD KEY `quizID` (`quizID`);

--
-- Indeksy dla tabeli `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`quizID`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Indeksy dla tabeli `wynik`
--
ALTER TABLE `wynik`
  ADD PRIMARY KEY (`wynikID`),
  ADD KEY `userID` (`userID`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `question`
--
ALTER TABLE `question`
  MODIFY `questionID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT dla tabeli `quiz`
--
ALTER TABLE `quiz`
  MODIFY `quizID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT dla tabeli `wynik`
--
ALTER TABLE `wynik`
  MODIFY `wynikID` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;
