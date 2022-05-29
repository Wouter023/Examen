<?php
/** Opdracht 1*/
echo 'Opdracht 1<br>';
$a = 9;
if ($a > 0) {
    echo "Dit getal is groter dan 0.<br>";
}

/** Opdracht 2 */
echo '<br>Opdracht 2<br>';
$b = 6;
if ($b > 0 and $b < 10) {
    echo "Dit getal ligt tussen de 0 en 10.<br>";
}

/** Opdracht 3 */
echo '<br>Opdracht 3<br>';
$c = 5.5;
if ($c > 0 and $c < 10) {
    if ($c >= 5.5) {
        echo "Voldoende<br>";
    } else {
        echo "Onvoldoende<br>";
    }
}

/** Opdracht 4 */
echo '<br>Opdracht 4<br>';
for ($i = 1; $i <= 10; ($i = $i + 2)) {
    echo $i . " ";
}
echo "<br>";

/** Opdracht 5 */
echo '<br>Opdracht 5<br>';
$j = 4;
for ($k = 1; $k <= 10;) {
    echo $k * $j . " ";
    $k++;
}
echo "<br>";

/** Opdracht 6 */
echo '<br>Opdracht 6<br>';
$num1 = 0;
$num2 = 1;
while ($num1 <= 1000) {
    echo ' ' . $num1;
    $num3 = $num2 + $num1;
    $num1 = $num2;
    $num2 = $num3;
}
echo "<br>";

/** Opdracht 7 */
echo '<br>Opdracht 7<br>';
$color = "ffffff";
if (isset($_GET['kleurcode'])) {
    $color = $_GET['kleurcode'];
}
?>
<body style="background-color:<?php echo $color; ?>">
<form method="get" action="opdrachten.php">
    Voer een kleurcode in: <input type="text" name="kleurcode" id="kleurcode"><br>
    <input type="submit" value="verzenden">
</form>
</body>
<?php

/** Opdracht 8 */
echo '<br>Opdracht 8<br>';
?>
<form method="get" action="opdrachten.php">
    Naam: <input type="text" name="naam" title="naam"><br>
    Leeftijd: <input type="text" name="leeftijd" title="leeftijd"><br>
    <input type="submit" value="Verzenden">
</form>
<?php
if (isset($_GET['naam'])) {
    $a = $_GET['leeftijd'];
    for ($b = 1; $b <= $a; $b++) {
        echo " " . $_GET['naam'];
    }
}

/** Opdracht 9 */
echo '<br>Opdracht 9<br>';
?>
<form>
    Voer een getal in: <input type="text" name="getal" title="getal"><br>
    <input type="submit" value="Verzenden">
</form>
<?php
if (isset($_GET['getal'])) {
    $getal = $_GET['getal'];
    for ($tel = 1; $tel <= 10; $tel++) {
        echo $getal * $tel . " ";
    }
}

/** Opdracht 10 */
echo '<br>Opdracht 10<br>';
?>

<a href="img/back/back_blue.png">Back Blue</a><br>
<a href="img/back/back_gray.png">Back Gray</a><br>
<a href="img/back/back_green.png">Back Green</a><br>
<a href="img/back/back_purple.png">Back Purple</a><br>

<?php
/** Opdracht 11 */
echo '<br>Opdracht 11<br>';
?>
<a href="opdrachten.php?backblue11">Back Blue</a><br>
<a href="opdrachten.php?backgray11">Back Gray</a><br>
<a href="opdrachten.php?backgreen11">Back Green</a><br>
<a href="opdrachten.php?backpurple11">Back Purple</a><br>
<?php
if (isset($_GET['backblue11'])) {
    echo '<img src="img/back/back_blue.png" width: 20% height=20%>';
} elseif (isset($_GET['backgray11'])) {
    echo '<img src="img/back/back_gray.png" width: 20% height=20%>';
} elseif (isset($_GET['backgreen11'])) {
    echo '<img src="img/back/back_green.png" width: 20% height=20%>';
} elseif (isset($_GET['backpurple11'])) {
    echo '<img src="img/back/back_purple.png" width: 20% height=20%>';
}

echo '<br>Opdracht 12<br>';
?>
<a href="opdrachten.php?backblue12">Back Blue</a><br>
<a href="opdrachten.php?backgray12">Back Gray</a><br>
<a href="opdrachten.php?backgreen12">Back Green</a><br>
<a href="opdrachten.php?backpurple12">Back Purple</a><br>
<?php
if (isset($_GET['backblue12'])) {
    $img = '<img src="img/back/blue" width: 20% height=20%>';
    $search = "blue";
    $replace = "back_blue.png";
    $new = str_replace($search, $replace, $img);
    print_r($new);
} elseif (isset($_GET['backgray12'])) {
    $img = '<img src="img/back/gray" width: 20% height=20%>';
    $search = "gray";
    $replace = "back_gray.png";
    $new = str_replace($search, $replace, $img);
    echo $new;
} elseif (isset($_GET['backgreen12'])) {
    $img = '<img src="img/back/green" width: 20% height=20%>';
    $search = "green";
    $replace = "back_green.png";
    $new = str_replace($search, $replace, $img);
    echo $new;
} elseif (isset($_GET['backpurple12'])) {
    $img = '<img src="img/back/purple" width: 20% height=20%>';
    $search = "purple";
    $replace = "back_purple.png";
    $new = str_replace($search, $replace, $img);
    echo $new;
}

/** Opdracht 13 */
echo '<br>Opdracht 13<br>';
$inhoud13 = file_get_contents("img/content.txt");
echo $inhoud13;

/** Opdracht 14 */
echo '<br><br>Opdracht 14<br>';
?>
<textarea id="opd14" name="opd14" rows="10" cols="50">
    <?php echo $inhoud13 ?>
</textarea>
<?php

/** Opdracht 15 */
echo '<br>Opdracht 15<br>';
$myfile = fopen("indexvalue.txt", "w") or die("Unable to open file!");
$txt = file_get_contents("opdrachten.php");
fwrite($myfile, $txt);
fclose($myfile);
$inhoud15 = file_get_contents("indexvalue.txt");
?>
<textarea id="opd15" name="opd15" rows="10" cols="50">
    <?php echo htmlspecialchars($inhoud15)?>
</textarea>

<?php
/** Opdracht 16 */
echo '<br>Opdracht 16<br>';
file_put_contents("kopie.txt", $inhoud13);

/** Opdracht 17 */
echo '<br>Opdracht 17<br>';
$tekst= file_get_contents("opdracht17.txt");
if (isset($_GET['userinput'])) {
    $tekst = $_GET ['userinput'];
    file_put_contents("opdracht17.txt", $tekst);
}

?>

<form method="get" action="opdrachten.php">
    <textarea id="userinput" name="userinput" rows="10" cols="50">
    </textarea>
    <br><input type="submit"
               value="Verzenden">
</form>

<?php
/** Opdracht 18 */
echo '<br>Opdracht 18<br>';
?>

<form method="get" action="opdrachten.php">
    <textarea id="userinput" name="userinput" rows="10" cols="50">
        <?php echo $tekst?>
    </textarea>
    <br><input type="submit"
               value="Verzenden">
</form>